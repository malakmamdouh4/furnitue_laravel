<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    use HasFactory;

    protected $fillable = [
        'name' , 'description' ,'price' , 'img' ,'user_id' , 'department_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id');
    }



}
