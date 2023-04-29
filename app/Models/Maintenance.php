<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'issue',
        'completion_date',
        'status',
        'user_id'
    ];

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }
    
    // public function room() {
    //     return $this->belongsTo(Room::class);
    // }
}
