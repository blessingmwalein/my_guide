<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserWork;

class UserWorkController extends Controller
{
    public function store(Request $request){

        $work= UserWork::create([
            'profile_id'=> $request->profile_id,
            "work_id"=> $request->work_id,
            "what_you_do" => $request->what_you_do
        ]);
        return UserWork::find($work->id)->first();
    }
}
