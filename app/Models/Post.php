<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setOriginalName($value)
    {
        $this->attributes['originalname'] = json_encode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
