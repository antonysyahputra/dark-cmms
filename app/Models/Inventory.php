<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_inventory',
        'serial_number',
        'product_id',
        'purchased_in',
        'room_id',
    ];

    public function scopeFilter($query, array $filters) {
        
        if($filters['category'] ?? false) {
            $query->whereHas('product', function(Builder $query) {
                $query->where('category_id', request('category'));
            })->whereHas('room', function (Builder $query) {
                $query->where('department_id', request('department'));
            });
        }
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }
}
