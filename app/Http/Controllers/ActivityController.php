<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function read(){
        $data = Activity::orderBy("id")->get();
        return view("dashboard", [
            "data"=> $data
        ]);
        // return view("dashboard",compact("data"));
    }
    public function getCreate(){
        return view("create");
    }
    public function create(Request $request){
        $rules = ['activity' => 'required',
        'description' => 'required',
        'repetition' => 'required|numeric'] ;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Activity::create([
            'activity' => $request->activity,
            'description'=> $request->description,
            'repetition' => $request->repetition,
            'is_done' => 0
        ]);
        return view("create");
    }
    public function update(string $id){
        $data = Activity::find($id);
        if(empty($data)){
            return redirect()->back()->with("error","Data Not Found");
        }
        if($data->is_done == 0){
            $data->is_done = 1;
        } else{
            $data->is_done = 0;
        }
        $data->save();
        return redirect()->back()->with('success', 'Data Updated successfully');
    }
    public function delete(string $id){
        $data = Activity::find($id);
        if(empty($data)){
            return redirect()->back()->withErrors('Data Not Found')->withInput();
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
