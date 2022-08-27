<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_id','products_id','price','transaction_status','resi','code','shipping_status'
    ];

    protected $hidden =[

    ];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }
}
