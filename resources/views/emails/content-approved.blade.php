@component('mail::message')
# Introduction

The body of your message.
Hello Mr. {{$mail_data['username']}}
Your email is {{$mail_data['email']}}
and password is {{$mail_data['app_password']}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
