<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Exception;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // single image upload
    public function singleImagePage()
    {
        return view('Image.singleImageAdd');
    }
    public function singleImageStore(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required'
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = 'photo-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('image/image'), $fileName);
            }
            Image::create([
                "image" => $fileName
            ]);
            return response()->json([
                'status' => 'Success',
                'message' => 'Image Upload Successfully',
            ]);
        } catch (Exception $exception) {

            return response()->json([
                'status' => 'Fail',
                'message' => 'Image Upload Successfully',
            ]);
        }
    }
    //multiple image upload
    public function multipleImagePage()
    {
        return view('Image.multipleImageAdd');
    }
    public function multipleImageStore(Request $request)
    {
        try {
            $request->validate([
                'images' => 'required',
                'images.*' => 'image|max:2048'
            ]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach($images as $image){
                    $fileName = 'multiple-photo-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('image/image'), $fileName);
                    Image::create([
                        "image" => $fileName
                    ]);
                }
            }

            return response()->json([
                'status' => 'Success',
                'message' => 'Image Upload Successfully',
            ]);
        } catch (Exception $exception) {

            return response()->json([
                'status' => 'Fail',
                'message' => 'Image Upload Successfully',
            ]);
        }
    }
}
