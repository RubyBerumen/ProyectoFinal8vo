@extends('adminlte::auth.register')
<div class="flex items-center justify-end mt-4">
    {!! app('captcha')->display(['add-js' => false]) !!}
</div>
{!! app('captcha')->displayJs() !!}