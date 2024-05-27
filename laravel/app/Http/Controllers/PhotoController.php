<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;

class PhotoController extends Controller
{
   
    public function store(Request $request)
    {
       // dd($request);
        if ($request->hasFile('file')) {         
            $image = $request->file('file');
            $roomId = $request->input('roomId');
            $foto= new Photo();
            $foto->roomId=$roomId;
            $foto->imgRute = ImageController::storeImage(request(), "coursesImg", "file", $image->getClientOriginalName());
            $foto->save();
            return response()->json(['message' => 'Las imágenes se han subido correctamente']);
        }else{
            // Si no se enviaron archivos, devolver error
            return back()->with('error', 'No habia imagenes que subir');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
    public function carousel($roomId){
        $roomImg = Photo::roomPhotosCarousel($roomId);
        return view('main.imageCarousel', compact('roomImg', 'roomId'));
    }
}
