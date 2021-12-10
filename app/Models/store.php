<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name"];

    public function rating()
    {
        return $this->hasMany(rating::class)
         ->selectRaw('count(store_id) as s, store_id, sum(rate)/count(store_id) as rate') ->groupBy('store_id');
    }


    public function ratings()
    {
        return $this->hasMany(rating::class);
    }

}
