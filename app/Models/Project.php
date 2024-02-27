<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_avatar_url',
        'html_url',
        'description',
        'image',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
