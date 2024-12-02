<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // Cara Pertama Mass Assignment
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // Cara Kedua
    // User dapat memasukkan data apa saja yang membahayakan sistem
    protected $guarded = [
        'id',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
