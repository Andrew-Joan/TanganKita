<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerTransaction extends Model
{
    protected $guarded = ['id'];
    protected $attributes = ['status_id' => 1];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
