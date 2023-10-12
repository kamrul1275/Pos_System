<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);

    }//end customers method


    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employees::class);
    }//end employees method

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }//end product method




}
