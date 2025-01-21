<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('email:welcome-email', function () {
    dispatch(new \App\Jobs\SendEmailJob());
})->purpose('Send emails after every 10 seconds')
    ->everyTenSeconds();
