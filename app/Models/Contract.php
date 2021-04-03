<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['date_conclusion', 'date_completion', 'category_id', 'description'];

    public function clients() {
        return $this->hasMany(Client::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function registrations() {
        return $this->hasMany(Registration::class);
    }
}
