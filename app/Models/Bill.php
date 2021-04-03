<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['name', 'category_id', 'status'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function registration() {
        return $this->belongsTo(Registration::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
