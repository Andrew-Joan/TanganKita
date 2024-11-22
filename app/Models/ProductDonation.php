<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDonation extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productTransaction()
    {
        return $this->hasMany(ProductTransaction::class);
    }
}
