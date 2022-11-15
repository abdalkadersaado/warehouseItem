<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemCategroy extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}
