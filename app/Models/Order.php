<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'worker_id',
        'status',
        'payment_method',
        'amount',
        'order_amount',
        'balance',
        'date',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function worker(){
        return $this->belongsTo(User::class);
    }
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
