<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handle extends Model
{
    use HasFactory;

    protected $fillable = ['social_name', 'name'];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
