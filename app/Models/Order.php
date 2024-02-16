<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $primaryKey = "id";
    protected $fillable = [
        'order_id','order_date','order_quantity','sales','ship_method','profit',
        'unit_price','customer_name','customer_segment','customer_catagory'
    ];
}
