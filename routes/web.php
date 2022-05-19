<?php

use Illuminate\Support\Facades\Route;
use App\Models\Slider;
use App\Models\Department;
use App\Models\Item;
use App\Http\Controllers\AdminController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $slider1 = Slider::where('id',1)->first();
    $slider2 = Slider::where('id',2)->first();
    $slider3 = Slider::where('id',3)->first();

    $depts = Department::all();
    $items = Item::all();

    return view('welcome')->with('slider1',$slider1)->with('slider2',$slider2)->with('slider3',$slider3)
    ->with('depts',$depts)->with('items',$items);
})->name('welcome');


Route::get('/show-department',[AdminController::class,'showDepartment'] )->name('department');

Route::get('/show-items/{departmentId}',[AdminController::class,'showItems'] )->name('items');

Route::get('/search',[AdminController::class,'search'] )->name('search');
