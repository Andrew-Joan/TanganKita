<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDonation extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    protected $attributes = [
        'status_id' => 1
    ];

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

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
