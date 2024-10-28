<x-mail::message>
# Introduction

Ваш пароль: {{ $password }}

<x-mail::button :url="'http://www.lvc_step2_blog.lv/admin'">
Сайт 'lvc_step2_blog.lv'
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
