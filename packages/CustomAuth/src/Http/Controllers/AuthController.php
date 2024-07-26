<?php
namespace Hip\CustomAuth\Http\Controllers;

use App\Events\EventHistory;
use App\Helpers\ExternalHelper;
use App\Http\Controllers\Controller;
use App\Models\AppDashboard;
use App\Models\EventType;
use App\Models\SecCache;
use App\Models\SecLogUser;
use App\Models\SecRoleUser;
use App\Rules\EmailValidation;
use App\Traits\PermissionSec;
use Carbon\Carbon;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Validator;
use App\Models\User;
use App\Models\MasterList\Facility;
use App\Models\MasterList\Address;
use Enforcer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;
//use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    use PermissionSec;

    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255', 'unique:sec_user'],
                'password' => 'required|string|min:8',
            ]);

            if ($validator->fails()) {
                ExternalHelper::failedValidation($validator);
            }

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => strtolower($request->email),
                'password' => Hash::make($request->password),
                'user_status_id' => '3'
            ]);

            event(new Registered($user));

            //$token = $user->createToken('auth_token')->plainTextToken;

            return response()
                ->json(['success' => true, 'data' => $user]);

        } catch (Exception $e) {

            return response()
                ->json(['success' => false, 'error' => $e->getMessage()]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function resendEmailConfirmation(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {

            ExternalHelper::failedValidation($validator);

        }

        $user = User::where('email', $request->email)->first();
        $user->sendEmailVerificationNotification();

        return response([
            'success' => true,
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'Password' => ['required'],
            ]);

            if ($validator->fails()) {

                ExternalHelper::failedValidation($validator);

            }

            $user = User::find(auth()->user()->sec_user_id);
            $user->password = Hash::make($request->Password);
            $user->save();

            //  LOG TO DB, PASSWORD RESET
            //  ------- SEC LOG USER
            SecLogUser::create([
                'sec_user_log_id' => Str::uuid()->toString(),
                'user_id' => auth()->user()->sec_user_id,
                'user_status_id' => 5,
                'modified_dt' => Carbon::now(),
                'review_user_id' => null,
                'comment' => null
            ]);

            return response([
                'success' => true,
                'message' => 'Password changed.'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(
                new EventHistory(
                    array(
                        'email' => null,
                        'url ' => $request->fullUrl(),
                        'error' => $e->getMessage()
                    ),
                    'API_ENDPOINT_ERROR'
                )
            );

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event(
                new EventHistory(
                    array(
                        'email' => null,
                        'url ' => $request->fullUrl(),
                        'error' => $e->getMessage()
                    ),
                    'API_ENDPOINT_ERROR'
                )
            );

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function reset(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'token' => 'required',
                'email' => 'required|email',
                'password' => ['required', 'confirmed', RulesPassword::defaults()],
            ]);

            if ($validator->fails()) {

                ExternalHelper::failedValidation($validator);

            }

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    $user->tokens()->delete();

                    event(new PasswordReset($user));
                }
            );

            if ($status == Password::PASSWORD_RESET) {

                //  ------  GET USER THAT HAS BEEN RESET
                $getUser = User::where('email', $request->email)->first();

                //  LOG TO DB, PASSWORD RESET
                //  ------- SEC LOG USER
                SecLogUser::create([
                    'sec_user_log_id' => Str::uuid()->toString(),
                    'user_id' => $getUser->sec_user_id,
                    'user_status_id' => 5,
                    'modified_dt' => Carbon::now(),
                    'review_user_id' => null,
                    'comment' => null
                ]);

                return response([
                    'success' => true,
                    'message' => 'Password reset successfully'
                ]);
            } else {
                return response([
                    'success' => false,
                    'error' => 'Something went wrong with the password rest.'
                ]);
            }

        } catch (\Illuminate\Database\QueryException $e) {

            //  LOG TO DB
            event(
                new EventHistory(
                    array(
                        'email' => null,
                        'url ' => $request->fullUrl(),
                        'error' => $e->getMessage()
                    ),
                    'API_ENDPOINT_ERROR'
                )
            );

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (\Exception $e) {

            //  LOG TO DB
            event(
                new EventHistory(
                    array(
                        'email' => null,
                        'url ' => $request->fullUrl(),
                        'error' => $e->getMessage()
                    ),
                    'API_ENDPOINT_ERROR'
                )
            );

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }

    }

    /**
     * @param Request $request
     * @return array
     */
    public function forgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return [
                'success' => true,
                'status' => __($status)
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Can not reset your email.'
            ];
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function decrypt(Request $request)
    {

        $private = RSA::loadPrivateKey(env('PRIVATE_KEY'));

        $ciphertext = $request->cipher;

        $private = openssl_get_privatekey($private);

        openssl_private_decrypt(base64_decode($ciphertext), $plaintext, $private, OPENSSL_PKCS1_PADDING);

        //  ----------  DECRYPTED DATA
        return json_decode($plaintext);

    }

    /**
     * @param $token
     * @return mixed
     */
    public static function decryptToken($token)
    {

        $private = RSA::loadPrivateKey(env('PRIVATE_KEY'));

        $ciphertext = $token;

        $private = openssl_get_privatekey($private);

        openssl_private_decrypt(base64_decode($ciphertext), $plaintext, $private, OPENSSL_PKCS1_PADDING);

        //  ----------  DECRYPTED DATA
        return json_decode($plaintext);

    }

    /**
     * @param $data
     * @return string
     */
    public static function encryptWithData(array $data)
    {

        $key = PublicKeyLoader::load(env('PUBLIC_KEY'));

        $key = $key->withPadding(RSA::ENCRYPTION_PKCS1);

        return base64_encode($key->encrypt(json_encode($data)));

    }

    /**
     * @param $user
     * @return string
     */
    public function encrypt($user)
    {

        $key = PublicKeyLoader::load(env('PUBLIC_KEY'));

        $key = $key->withPadding(RSA::ENCRYPTION_PKCS1);

        $package = array(
            'userid' => '{' . $user->sec_user_id . '}',
            'expiry' => Carbon::now('UTC')->addMinutes(240)->format('Y-m-d H:i:s')
        );

        return base64_encode($key->encrypt(json_encode($package)));

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPublicPrivateKeys(Request $request)
    {

        $private = RSA::createKey();
        $private = $private->withPadding(RSA::SIGNATURE_PSS)->withHash('sha256');
        $public = $private->getPublicKey();

        return response()->json([
            'success' => true,
            'private' => $private->toString('PKCS1'),
            'public' => $public->toString('PKCS1')
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        //  ---------------   PLACE VALIDATION ON REQUEST
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        //  ---------------     CHECK IF USER IS REGISTERED
        $user = User::where('email', strtolower($request['email']))->first();

        if (!$user) {

            //  --------------- LOG EVENT FAILED
            event(new EventHistory(array('email' => $request['email']), 'LOGIN_NOT_REGISTERED'));

            return response()
                ->json([
                    'success' => false,
                    'message' => 'NOT_REGISTERED'
                ], 200);

        }

        //  --------------- CHECK IF USER IS ADMIN
        $checkAdminRoleUser = SecRoleUser::where([
            ['user_id', $user->sec_user_id],
            ['role_id', env('ROLE_APP_ADMIN')]
        ])->first();

        //  --------------- IF ACCOUNT INACTIVE DONT ALLOW LOGIN
        if ($user->user_status_id === 1 && !$checkAdminRoleUser) {
            return response()
                ->json(['success' => false, 'message' => 'NOT_AUTHORIZED'], 200);
        }

        //  --------------- RATE LIMITER
        $this->ensureIsNotRateLimited($request);

        //$hash = ExternalHelper::computeHash( $request['password'], $user->password_salt, env("PEPPER") );

        //  --------------- AUTHENTICATION DECLINED
        if (!ExternalHelper::checkHash($request['password'], $user->password_hash, $user->password_salt, env("PEPPER"), 5)) {
            RateLimiter::hit($this->throttleKey($request));
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        //  --------------  LOGIN USER
        Auth::login($user);

        $token = $user->createToken('auth_token')->plainTextToken;

        $components = ($this->getMenuComponents(auth()->user(), $request) == false) ? [] : $this->getMenuComponents(auth()->user(), $request);

        $getWebMapToken = self::encrypt(auth()->user());

        //  --------------- LOG EVENT SUCCESS
        event(new EventHistory($user, 'LOGIN_SUCCESS'));

        //  --------------- GET USER ROLES
        //  $userRoles = User::with('secRoleUser.secRole' )->find( auth()->user()->sec_user_id );

        return response()->json([
            'success' => true,
            'components' => $components,
            'user' => auth()->user()->load(['lastLogin', 'lastResetPassword']),
            'roles' => auth()->user()->load(['secRoleUser.secRole']),
            'access_token' => $token,
            'HIPS_token' => $getWebMapToken,
            'token_type' => 'Bearer',
        ]);

    }

    /**
     * @return array
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticatedTreeComponents(Request $request)
    {

        //  BUILD AUTHENTICATED MENU
        $permissionMenu = $this->getMenuComponents(auth()->user(), $request);

        if ($permissionMenu)
            return response()
                ->json(['success' => true, 'data' => $permissionMenu], 200);

        return response()
            ->json(['success' => false, 'error' => 'permission menu not found.'], 200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticatedComponentInstance(Request $request)
    {

        //  BUILD AUTHENTICATED MENU
        $dashboards = $this->getComponentInstance(auth()->user(), $request);

        if ($dashboards)
            return response()
                ->json(['success' => true, 'data' => $dashboards], 200);

        return response()
            ->json(['success' => false, 'error' => 'You dont seem to have permissions to dashboards.'], 200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {

        $getWebMapToken = self::encrypt(auth()->user());

        //  --------------- GET USER ROLES
        //$userRoles = User::with('secRoleUser.secRole' )->find( auth()->user()->sec_user_id );

        return response()
            ->json([
                'success' => true,
                'user' => auth()->user()->load(['lastLogin', 'lastResetPassword']),
                'roles' => auth()->user()->load(['secRoleUser.secRole']),
                'HIPS_token' => $getWebMapToken
            ], 200);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function testConnection(Request $request)
    {

        // to check if a user has permission
        if (Enforcer::enforce("Amajuba DM", "map_view", "view")) {
            return response()
                ->json(['success' => true]);
        } else {
            return response()
                ->json(['success' => false]);
        }

        return response()
            ->json(['success' => 200]);

    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function ensureIsNotRateLimited($request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        //  --------------- LOG EVENT FAILED
        event(new EventHistory(array('email' => $request['email']), 'TO_MANY_LOGIN_ATTEMPTS'));

        return response()
            ->json([
                'success' => false,
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ])
            ]);

    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey($request)
    {
        return Str::lower($request['email']) . '|' . $request->ip();
    }


    
}