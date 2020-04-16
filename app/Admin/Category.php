<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='category';
    public $timestamps=false;
    protected $fillable=['cate_name'];
}
