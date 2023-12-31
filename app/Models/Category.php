<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    
    public function products(): HasMany
    {
        return $this->hasOne(Product::class);
    }// end method


    public function users(): BelongsTo
    {
        return $this->belonhagsTo(User::class);
    }// end method

    
}
