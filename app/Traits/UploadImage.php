<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImage{

    public function verifyAndStoreImage(Request $request, $inputname , $foldername , $disk) {

        $data = $request->except($inputname);
            // Check img
            if (!$request->file($inputname)->isValid()) {
                //flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            } else {
                $photo = $request->file($inputname);
                //name this is classroom name
                $name = Str::slug($request->input('name'));
                $filename = $name . '.' . $photo->getClientOriginalExtension();
                $data[$inputname] = $request->file($inputname)->storeAs($foldername, $filename, $disk);
                return $data[$inputname];
            }
        return null;

    }


    public function deleteImage( $disk, $path, $filename, $id) {
        // Storage::disk($disk)->delete($path);
        // Image::where('id',$id)->where('filename',$filename)->delete();
    }

}
