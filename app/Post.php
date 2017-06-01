<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use \App\Traits\Uploadable;

	protected $fillable = ['title', 'summary','date', 'image'];


    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y.');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d.m.Y.', $value);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
