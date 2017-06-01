<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Upload;
use Image;

class UploadController extends Controller
{
    private $destinationPath = 'uploads/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = config('uploadable.'.$request->model);
        $model = $model::find($request->id);

        $file = $request->file('file');
        
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        
        $tempName = md5($fileName.time());
        $newFileName = $tempName.'.'.$extension;

        if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {

            // File System stuff
            $img = Image::make($file->getRealPath());
            $img->widen(1200, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($this->destinationPath.'images/'.$newFileName);
            $img->fit(600, 400);
            $img->save($this->destinationPath.'thumbnails/'.$newFileName);

            // DB stuff
            $upload = new Upload;
            $upload->type = 'img';
            $upload->name = $fileName;
            $upload->category = $request->category;
            $upload->path = $this->destinationPath.'images/'.$newFileName;
            $upload->thumbnail = $this->destinationPath.'thumbnails/'.$newFileName;

            $model->images()->save($upload);

            return view('upload._image', compact('upload'));

        } else {

            $file->move($this->destinationPath.'documents/', $newFileName);

            $upload = new Upload;
            $upload->type = 'doc';
            $upload->name = $file->getClientOriginalName();     
            $upload->category = $request->category;
            $upload->path = $this->destinationPath.'documents/'.$newFileName;

            $model->documents()->save($upload);

            return view('upload._document', compact('upload'));
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        $upload->delete();
    }
}
