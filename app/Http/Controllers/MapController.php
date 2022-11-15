<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Map;
use App\Models\User;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() {
        $com = Company::all();
        $users = User::all();

        // $map = Map::all();
        return view('Mapping.map',[
            'com' => $com,
            'users' => $users,
            // 'map' => $map
        ]);
    }
    public function store(Request $request) {

        $userIdArr = $request->userIdArr;
        
        foreach($userIdArr as $key => $value) {
            if($value !== null){
                
                foreach($value as $arr) {
                    $map = Map::firstOrNew(array('user_id' =>$key  ,'company_id' => $arr));
                    $map->user_id = $key;
                    $map->company_id = $arr;
                    $map->save();
                }
                
            }  
        }

        // return view('Mapping.map');

    }

}
