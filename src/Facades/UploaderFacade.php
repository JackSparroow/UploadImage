<?php


namespace Codestacx\Uploaders\Facades;


use Illuminate\Support\Facades\Facade;

class UploaderFacade extends Facade {
    protected static function getFacadeAccessor()
    {
       return 'fileuploader';
    }
}
