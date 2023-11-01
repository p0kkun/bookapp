<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded =[];
    
    public static $rules=array(
        'title' => 'required',
        'author' => 'required',
        'price' => 'required'
    );
    public function getData()
    {
        return $this->id . ':  ' . $this->title .'  ' . $this->author. '   ￥' . $this->price;
    }
}
