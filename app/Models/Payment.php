<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $guarded=[];

    

    public function users(): BelongsTo
    {
        return $this->belonhagsTo(User::class);
    }// end method



    //many to many relation
    public function orders(): BelongsTo
    {
        return $this->belongsToMany(Order::class);
    }


}
