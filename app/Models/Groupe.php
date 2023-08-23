<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class, 'groupe_id');
    }
    public function shipment()
    {
        return $this->hasMany(Shipment::class, 'groupe_id');
    }
    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'groupe_shop');
    }
}
