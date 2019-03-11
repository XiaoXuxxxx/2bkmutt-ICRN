<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StaffProfile;

class StaffProfileController extends ApiController
{

    public function uploadPicture(Request $request, $number){
        $file = $request->file("webcam");
        $name = $number . "_profile_" . time() . ".jpeg";
        $file = $file->move(storage_path('app/uploads/staff-picture'), $name);
        $user = StaffProfile::where("id", "=", $number)->first();
        $user->image_filename = $name;
        $user->save();
    }

    // public function getUserCardHTMLbyId(Request $request, $camp_id){
    //     $search = UserProfile::where("camp_id", "=", $camp_id)->get();
    //     if( $search->count() == 1 ){
    //         return view('components.usercard', ['p' => $search->first()]);
    //     }
    // }

    // public function find(Request $request, $searchStr){
    //     $searchArray = explode(" ", trim($searchStr));

    //     $search = UserProfile::where("camp_id", "=", $searchArray[0])->get();
    //     if( $search->count() == 1 ){
    //         return response()->json(
    //             array(
    //                 "info" => array("found" => 1),
    //                 "content" => $search
    //             )
    //         );
    //     }

    //     if(count($searchArray) > 1){
    //         $search = UserProfile::where([
    //                 ["first_name-en", "=", $searchArray[0]],
    //                 ["last_name-en", "=", $searchArray[1]]
    //             ])->orWhere([
    //                 ["first_name-th", "=", $searchArray[0]],
    //                 ["last_name-th", "=", $searchArray[1]]
    //             ])->get();
    //         return response()->json(
    //             array(
    //                 "info" => array("found" => $search->count()),
    //                 "content" => $search
    //             )
    //         );
    //     }

    //     $search = UserProfile::where(
    //                 "first_name-en", "=", $searchArray[0]
    //             )->orWhere(
    //                 "first_name-th", "=", $searchArray[0]
    //             )->get();

    //     if( $search->count() > 0 ){
    //         return response()->json(
    //             array(
    //                 "info" => array("found" => $search->count()),
    //                 "content" => $search
    //             )
    //         );
    //     }else{
    //         return response()->json(array(
    //             "info" => array("found" => 0),
    //             "content" => []
    //         ));
    //     }
    // }

}
