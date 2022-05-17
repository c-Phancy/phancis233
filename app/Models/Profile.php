<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function handles() {
        return $this->hasMany(Handle::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }
}
