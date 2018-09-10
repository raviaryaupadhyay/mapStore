<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MyModel extends Model
{
    protected $table='store';

    protected $fillable =[
      'name',
      'description',
      'address',
      'image',
      'longitude',
      'latitude'
    ];


    public static function getData($storeName){
      return $this->where('name',$storeName)-all();
    }
    public static function updateData($name,$desc,$addr,$img){

    }
}
