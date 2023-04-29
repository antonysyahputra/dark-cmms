<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'floor'
    ];

    // public function inventory() 
    // {
    //     return $this->hasMany(Inventory::class);
    // }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    
}
