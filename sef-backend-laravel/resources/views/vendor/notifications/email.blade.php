<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <div class="mb-4 text-sm text-gray-600">

            @if($actionText == 'Verify Email Address')
                <p>Below is a link that you need to click in order for you to verify your email.</p>
            @else
                <p>Please click on link below to reset your password.</p>
            @endif

            <p>Thank you.</p>

        </div>

        <div class="mt-4 flex items-center justify-between">
            @component('mail::button', ['url' => $actionUrl])
                {{ $actionText }}
            @endcomponent
        </div>
    </x-auth-card>
</x-guest-layout>
