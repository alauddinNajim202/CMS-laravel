<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_id',
        'title',
        'company_name',
        'image_url',
        'year_range',
    ];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
}
