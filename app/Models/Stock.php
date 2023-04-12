<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name',
        'item_amount',
        'item_full_quantity',
        'item_empty_quantity',
        'item_date',
    ];
}
