<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'is_active',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function courses()
    {
        return $this->HasMany(User::class);
    }
}
