<?php

namespace App\Models;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Uuids;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;

    protected $table = 'sec_user';

    protected $primaryKey = 'sec_user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_status_id',
        'password_salt'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token){

        $url = env('RESET_LINK') . $token . '&email=' . request()->email ;

        $this->notify(new ResetPasswordNotification($url));

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function secRoleUser()
    {
        return $this->hasMany('App\Models\SecRoleUser', "user_id", "sec_user_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function secRole()
    {
        return $this->hasManyThrough('App\Models\SecRole', 'App\Models\SecRoleUser', 'role_id', 'role_id', "sec_user_id", 'user_id' );
    }

    /**
     * @return $this
     */
    public function lastLogin()
    {
        return $this->hasMany('App\Models\Event', "sec_user_id", "sec_user_id")
            ->where('event_type_id', 1)
            ->orderBy('created_at', 'DESC')
            ->take(5);
    }

    /**
     * @return $this
     */
    public function lastResetPassword()
    {
        return $this->hasMany('App\Models\SecLogUser', "user_id", "sec_user_id")
            ->where('user_status_id', 5)
            ->orderBy('modified_dt', 'DESC')
            ->take(5);
    }

}
