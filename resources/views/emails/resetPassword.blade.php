<h1>Hi, thank you and reset your password by clicking the link below:</h1>

@component('mail::button', ['url' => $actionUrl])
    {{ $actionText }}
@endcomponent