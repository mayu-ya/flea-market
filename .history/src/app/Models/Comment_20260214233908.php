<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'merchanise_id',
        'contact'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function merchanise()
    {
        return $this->belongsTo(Merchanise::class);
    }
}
