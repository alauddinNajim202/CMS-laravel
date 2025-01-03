<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_id',
        'name',
    ];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
}
