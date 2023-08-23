<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public function shipment()
    {
        return $this->hasMany(Shipment::class, 'groupe_id');
    }
}
