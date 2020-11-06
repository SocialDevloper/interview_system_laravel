@component('mail::message')
# Introduction

Thank You For new Register in Interview system laravel.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
