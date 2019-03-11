<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UserProfile;
use Storage;

class PDFController extends Controller
{

    public function download($pdf_filename){

        $path = 'uploads/abstact-pdf/' . $pdf_filename;

        if( ! Storage::exists($path) ) return;

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        $response = response()->make($file, 200);
        $response->header("Content-Type", $type);

        return $response;

    }

}
