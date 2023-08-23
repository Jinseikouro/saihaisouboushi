<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    public function Driver()
    {
        return $this->belongsTo(Driver::class,'driver_id');
    }
    public function Groupe()
    {
        return $this->belongsTo(Groupe::class,'groupe_id');
    }
    
}
