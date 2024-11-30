<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'dob' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function fundDonation()
    {
        return $this->hasMany(FundDonation::class);
    }

    public function fundTransaction()
    {
        return $this->hasMany(FundTransaction::class);
    }

    public function productDonation()
    {
        return $this->hasMany(ProductDonation::class);
    }

    public function productTransaction()
    {
        return $this->hasMany(ProductTransaction::class);
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
