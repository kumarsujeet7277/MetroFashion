<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'phone_no',
        'address',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
