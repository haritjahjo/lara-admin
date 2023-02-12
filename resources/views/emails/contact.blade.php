<x-mail::message>
# Introduction contact from {{ $first_name}}

The body of your message.
{{ $message }}

<x-mail::button :url="'http://localhost:8000'">
Visit Us
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
