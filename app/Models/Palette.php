<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Palette extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'colors',
    ];

    protected $casts = [
        'colors' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
