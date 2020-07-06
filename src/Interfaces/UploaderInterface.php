<?php


namespace Codestacx\Uploaders\Interfaces;


use Illuminate\Http\Request;


interface UploaderInterface  {

    public function getImageMetaData(Request $request, $image);

}
