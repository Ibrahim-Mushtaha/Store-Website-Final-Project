<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name"];

    protected static function booted()
    {
        static::deleted(function($category) {
            $category->stores()->delete();
        });
    }

    public function stores()
    {
        return $this->hasMany(store::class);
    }

}
