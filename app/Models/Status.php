<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
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

    public function volunteerTransaction()
    {
        return $this->hasMany(VolunteerTransaction::class);
    }
}
