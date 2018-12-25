<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'image_url'];

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($city) {
           $city->categories()->delete();
        });
    }
}
