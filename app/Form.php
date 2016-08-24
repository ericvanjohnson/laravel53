<?php

namespace App;

//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //use Searchable;

    protected $fillable = ['name', 'layout'];
}
