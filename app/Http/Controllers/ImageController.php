<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UserProfile;
use Storage;

class ImageController extends Controller
{

    public function profilePicture($img_name){

        $path = 'uploads/profile-picture/' . $img_name;

        if( ! Storage::exists($path) ) return;

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        $response = response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }

    public function staffPicture($img_name){

        $path = 'uploads/staff-picture/' . $img_name;

        if( ! Storage::exists($path) ) return;

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        $response = response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }

}
