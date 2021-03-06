<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id','shipping_id','status','order_code','created_at', 'order_date', 'total_price'
    ];
    protected $primarykey = 'id';
    protected $table = 'orders';
    public function order_detail(){
        return $this->belongsTo('App\Models\order_detail', 'order_code');
    }
}