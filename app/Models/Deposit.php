<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'cashback',
        'status',
        'reference'
    ];

    protected $casts = [
        'amount' => 'integer',
        'cashback' => 'integer',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
