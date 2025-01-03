<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model {
    use HasFactory;

    protected $table    = 'password_resets';
    protected $fillable = ['email', 'otp', 'created_at'];
    public $timestamps  = false;

    public function user() {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
