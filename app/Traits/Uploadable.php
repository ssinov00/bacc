<?php

namespace App\Traits;

use Image;
use File;

trait Uploadable {

    public function images()
    {
        return $this->morphMany('App\Upload', 'uploadable')
        ->where('type', '=', 'img')
        ->orderBy('position');
    }

    public function documents()
    {
        return $this->morphMany('App\Upload', 'uploadable')
        ->where('type', '=', 'doc')
        ->orderBy('position');
    }
 
    public function setImageAttribute($value)
    {
    	$destinationPath = 'uploads/';
        
        if($value){

            if($this->image){
                File::delete($this->image);
                File::delete($this->thumbnail);
            }

            $valueName = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

            $newFileName = md5($valueName.time()).'.'.$extension;
            $img = Image::make($value->getRealPath());
            $img->widen(1200, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($destinationPath.'images/'.$newFileName);
            $img->fit(600, 400);
            $img->save($destinationPath.'thumbnails/'.$newFileName);

            $this->attributes['image'] = $destinationPath.'images/'.$newFileName;
            $this->attributes['thumbnail'] = $destinationPath.'thumbnails/'.$newFileName;

        }
    }
 
}