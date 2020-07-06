<?php


namespace Codestacx\Uploaders\Traits;


use Codestacx\Uploaders\Exceptions\InvalidImageTypeException;
use Codestacx\Uploaders\Interfaces\UploaderInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Uploader {
    public function __construct() { }

    public function getImageMetaData($image)
    {

        $rules = array(

            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        );



        $validator = Validator::make(array('image'=>$image),$rules);

        if($validator->fails()){
            throw new InvalidImageTypeException("Invalid Image File Type : Supported types are ( jpeg|jpg|png|gif )");
        }

        $obj = new \stdClass();

        //return $image;
        $obj->orginal_name = $image->getClientOriginalName();
        $obj->extension = $image->getClientOriginalExtension();
        $obj->size = $image->getSize().' bytes';

        $e = getimagesize($image);
        $obj->width = $e[0];
        $obj->height = $e[1];

        return $obj;


        // TODO: Implement getImageMetaData() method.
    }


    private function upload($image,$path){
        $name = $image->getClientOriginalName();
        $newName = date('ymdgis').$name;
        if($path[0] == '/'){
            $path = substr($path,1,strlen($path));
        }
        $image->move(public_path().'/'.$path,$newName);


        $data = new \stdClass();
        $data->path = public_path().'/'.$path;
        $data->name = $newName;
        return $data;
    }

    public function Image($image,$path){
        $rules = array(

            'image' => 'mimes:jpeg,jpg,png,gif|required|max:100000' // max 10000kb
        );


        $validator = Validator::make(array('image'=>$image),$rules);
        if($validator->fails())
        if($validator->fails()){
            throw new InvalidImageTypeException("Invalid Image File Type : Supported types are ( jpeg|jpg|png|gif )");
        }

        $uploaded = $this->upload($image,$path);
        $obj = new \stdClass();
        $obj->message = "Image Uploaded Successfully";
        $obj->image_new_name = $uploaded->name;
        $obj->image_old_name = $image->getClientOriginalName();
        $obj->path = $uploaded->path;
       // $obj->image_old_name =
        return $obj;
    }
}

