<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function fundDonation()
    {
        return $this->hasMany(FundDonation::class);
    }

    public function productDonation()
    {
        return $this->hasMany(ProductDonation::class);
    }

    public function volunteer()
    {
        return $this->hasMany(Volunteer::class);
    }
}
