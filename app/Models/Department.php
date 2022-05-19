<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'description' ,'img'
    ];



    public function items()
    {
        return $this->hasMany('App\Models\Item','department_id');
    }


}
