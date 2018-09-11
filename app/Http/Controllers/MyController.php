<?php

namespace App\Http\Controllers;


use Request;
use App\MyModel;

class MyController extends Controller
{
    public function myFunc(){
      $latitude = (float)(Request::input('latitude'));
      $longitude = (float)(Request::input('longitude'));
      $radius=100;
      $data = MyModel::all();
      $result = array();
      foreach ( $data as $value) {
          $x=(float)($value['longitude']);
          $y=(float)($value['latitude']);
          $a=$x-$longitude;
          $b=$y-$latitude;
          $curRadius=sqrt(pow($a,2)+pow($b,2));
          if($curRadius<100000)
          {
            //dd($data);
            $newArr=array(MyModel::where('id',$value['id'])->get());
            array_push($result,$newArr);
          }
          //array_push($result,$curRadius);
      }
      return $result;
    }


    public function myInsert(){
      $name = Request::get('name');
      $des = Request::get('desc');
      $add = Request::get('addr');
      $img = Request::get('img');
      $long = Request::get('longitude');
      $lati = Request::get('latitude');
      if($name && $des && $add && $img){
        return MyModel::create([
          'name'=>$name,
          'description'=>$des,
          'address'=>$add,
          'image'=>$img,
          'longitude'=>$long,
          'latitude'=>$lati,
        ]);
      }
      else {
        return '404';
      }
    }


    public function myUpdate()
    {
      $id=Request::input('id');
      if($name = Request::get('name'))
      {
        MyModel::where('id',$id)->update([
          'name'=>$name
        ]);
      }
      if($des = Request::get('desc'))
      {
        MyModel::where('id',$id)->update([
          'description'=>$des
        ]);
      }
      if(  $add = Request::get('addr'))
      {
        MyModel::where('id',$id)->update([
          'address'=>$add
        ]);
      }
      if($img = Request::get('img'))
      {
        MyModel::where('id',$id)->update([
          'image'=>$img
        ]);
      }
      return "Updated";

    }


    public function myDelete()
    {
      $name = Request::get('name');
      MyModel::where('name',$name)->delete();
      return "deleted ->".$name;
    }
}
