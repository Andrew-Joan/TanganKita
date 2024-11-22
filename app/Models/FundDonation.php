<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundDonation extends Model
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

    public function fundTransaction()
    {
        return $this->hasMany(FundTransaction::class);
    }
}
