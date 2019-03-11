<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Excel;
use Auth;
use Schema;
use DB;
use Storage;
use PDO;

class DataImporterController extends Controller
{

    public function show(){
        return view("dataimporter.step1");
    }

    public function upload(Request $request){

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt',
            'table_name' => 'required|in:' . $this->getTableList()
        ]);

        if ($validator->fails()) {
            return view('dataimporter.step1')->withErrors($validator);
        }

        $file = $request->file("file");
        $file = $file->move(storage_path('app/uploads/data-importer'), Auth::user()->name . '-rawdata.tmp.csv');
        $results = 	Excel::load($file, function($reader){})->toObject();
        $keys = array_keys($results->first()->toArray());
        return view("dataimporter.step2", array('table_name' => $request->input('table_name'), 'keys' => $keys, 'avai_col' => Schema::getColumnListing($request->input("table_name"))));

    }

    public function insert(Request $request){
        
        $validator = Validator::make($request->all(), [
            'table_name' => 'required|in:' . $this->getTableList()
        ]);

        if ($validator->fails()) {
            return view('dataimporter')->withErrors($validator);
        }

        $table_name = $request->input('table_name');
        $keys = $request->all();
        //var_dump($keys);

        $filePath = 'storage/app/uploads/data-importer/' . Auth::user()->name . '-rawdata.tmp.csv';
        $results = 	Excel::load($filePath, function($reader){})->toObject();
        $originalKeys = array_keys($results->first()->toArray());

        $insertKey = array();
        foreach( $originalKeys as $key ){
            if( ! empty($keys["csv_" . $key]) ){
                array_push($insertKey, array($key, $keys["csv_" . $key]));
            }
        }

        $avai_col = Schema::getColumnListing($request->input("table_name"));
        $filtered = array();

        foreach( $insertKey as $keyPair ){
            if( in_array($keyPair[1], $avai_col) ){
                array_push($filtered, $keyPair);
            }
        }

        $resultsArray = $results->toArray();
        $finalArray = array();

        for($i = 0; $i < count($resultsArray); $i++){
            for($j = 0; $j < count($filtered); $j++){
                $finalArray[$i][$filtered[$j][1]] = $resultsArray[$i][$filtered[$j][0]];
            }
            if( in_array("created_at", $avai_col) )
                $finalArray[$i]["created_at"] = date('Y-m-d G:i:s');
            if( in_array("updated_at", $avai_col) )
                $finalArray[$i]["updated_at"] = date('Y-m-d G:i:s');  
        }
        DB::table($table_name)->insert($finalArray);
        

        return redirect('/tools/data-importer/finish')->with('keys', $finalArray);

    }

    public function finish(){
        if(empty(session("keys"))) return redirect('/tools/data-importer');
        return view('dataimporter.step3', array('keys' => session("keys")));
    }

    private function getTableList(){
        $tables = DB::connection()
               ->table('INFORMATION_SCHEMA.TABLES')
               ->select('*')
               ->get();
        $table_list = "";
        foreach ($tables as $table) {
            foreach ($table as $key => $value)
                $table_list .= $value . ",";
        }
        $table_list = trim($table_list, ",");
        return $table_list;
    }
}
