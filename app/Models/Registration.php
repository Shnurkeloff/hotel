<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use SoftDeletes;

    protected $fillable = ['date_settlement', 'date_eviction', 'contract_id', 'bill_id'];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function bill() {
        return $this->belongsTo(Bill::class);
    }
}
