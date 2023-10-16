<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];




    public function users(): BelongsTo
    {
        return $this->belonhagsTo(User::class);
    }// end method



    public function categorys(): BelongsTo
    {
        return $this->belonhagsTo(Category::class);
    }// end method

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }// end method


}
