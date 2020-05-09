@component('mail::message')
# Verification Code

The requested verification code is:

{{ $code }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
