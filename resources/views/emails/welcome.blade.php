@component('mail::message')
    # Welcome, {{ $name }}!

    We are happy to have you

    Thanks,
    {{ config('app.name') }}
@endcomponent
