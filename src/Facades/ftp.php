<?php
namespace Facades;
use Illuminate\Support\Facades\Facade;
class Ftp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ftp';
    }
}
