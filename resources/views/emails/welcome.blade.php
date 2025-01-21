@component('mail::message')
    # Welcome, {{ $name }}!

    We are happy to have you

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
