<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\User;
use App\Models\Item;
use App\Models\Department;

use Illuminate\Support\Facades\URL;



class AdminController extends Controller
{
    

    // upload images of sliders 
    public function uploadImagesSlider(Request $request)
    {
    
            if(!$request->hasFile('image')) 
            {
                return response()->json(['upload_file_not_found'], 400);
            }
            else
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
    
                $path = $file->store('public');
                $truepath = substr($path, 7);
                $slider = new Slider();
                $slider->path = URL::to('/') . '/storage/' . $truepath;
                $slider->save();
    
                return response()->json(['images uploaded successfully'], 422);
            }            
        
    }



    // add user 
    public function register(Request $request)
    {

        User::create([
            'name' => $request->name ,
            'password' => bcrypt($request->password),
            'email' => $request->email , 
        ]);
        return response()->json(['user register successfully'], 422);

    }


     // add department 
     public function addDept(Request $request)
     {
 
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();

        $path = $file->store('public');
        $truepath = substr($path, 7);

         Department::create([
             'name' => $request->name ,
             'description' => $request->description,
             'img' => URL::to('/') . '/storage/' . $truepath 
         ]);
         return response()->json(['department added successfully'], 422);
 
 
     }



      // add item 
    public function addItem(Request $request)
    {
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();

        $path = $file->store('public');
        $truepath = substr($path, 7);

        Item::create([
            'name' => $request->name ,
            'description' => $request->description , 
            'price' => $request->price ,
            'img' =>  URL::to('/') . '/storage/' . $truepath ,
            'user_id' => $request->user_id , 
            'department_id' => $request->department_id , 
        ]);
        return response()->json(['user register successfully'], 422);

    }


    public function showDepartment()
    {
        $departments = Department::all();
        return view('departments')->with('departments',$departments);
    }
    

    public function showItems($departmentId)
    {
        $items = Item::find(1);
        return view('items')->with('items',$items);
    }


    public function search()
    {
        return view('search');
    }
 

}
