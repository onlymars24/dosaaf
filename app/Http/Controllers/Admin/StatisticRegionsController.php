<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticRegionsController extends Controller
{
    public function show(){
        $users = User::all();
        $usersCount = $users->count();
        $regions = [];
        foreach($users as $user){
            $region = $user->region;
            $regions[$region]['name'] = $region;
            if(isset($regions[$region]['amount'])){
                $regions[$region]['amount']++;
            }
            else{
                $regions[$region]['amount'] = 1;
            }
            $regions[$region]['percent'] = round($regions[$region]['amount'] / $usersCount * 100);
        }
        return view('admin.statistic-regions', ['regions' => $regions]);
    }
}