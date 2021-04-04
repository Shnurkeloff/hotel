<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'category_id', 'status'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function registrations() {
        return $this->hasMany(Registration::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
