<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'number_seats', 'number_rooms', 'price_day', 'more_info'];

    public function contracts() {
        return $this->hasMany(Contract::class);
    }

    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
