<?php


namespace Codestacx\Uploaders\Exceptions;


use Illuminate\Support\Facades\Log;

class InvalidImageTypeException extends \Exception {

    public function report(){

        Log::debug('Invalid Image Type passed');

    }

    public function render($request){

         parent::getTrace();


    }
}
