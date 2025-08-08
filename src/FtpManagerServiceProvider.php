<?php

namespace ServiceProvider;

use FtpManager\FtpManager;
use Illuminate\Support\ServiceProvider;

class FtpManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('ftp', function () {
            $ftp = new FtpManager();
            $ftp->connect([
                'host' => env('FTP_HOST'),
                'port' => env('FTP_PORT', 21),
                'username' => env('FTP_USERNAME'),
                'password' => env('FTP_PASSWORD'),
            ]);
            return $ftp;
        });
    }
}
