<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use \App\Traits\Uploadable;

	protected $fillable = ['image','name','type','vet_station','address','city','region','sex','age','description'];
}
