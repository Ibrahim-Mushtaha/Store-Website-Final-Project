<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class store extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected static function booted()
    {
        static::deleted(function($category) {
            $category->items()->delete();
        });
    }


    public function items()
    {
        return $this->hasMany('App\ServiceItem');
    }

}
