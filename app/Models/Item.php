<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'commercial_name', 'category_id', 'qty', 'price', 'code'
    ];

    protected $with = ['in_transaction', 'out_transaction', 'warehouse'];

    public function category()
    {
        return $this->belongsTo(ItemCategroy::class, 'category_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function in_transaction()
    {
        return $this->hasMany(InTransaction::class, 'item_id');
    }
    public function out_transaction()
    {
        return $this->hasMany(OutTransaction::class, 'item_id');
    }
}
