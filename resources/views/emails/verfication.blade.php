@component('mail::message')
# Welcome to the first Newletter
Dear {{$email}},
We have Recieve you Application and Your verification code is.
@component('mail::button', ['url' => 'https://laraveltuts.com'])
{{$code}}
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent