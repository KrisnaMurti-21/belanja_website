<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ];

    protected $casts = [
        'price' => 'integer',
    ];

    // Relationships
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function hasImage()
    {
        return !empty($this->image) && Storage::exists('public/' . $this->image);
    }

    /**
     * Get image URL accessor
     */
    public function getImageUrlAttribute()
    {
        if ($this->hasImage()) {
            return Storage::url($this->image);
        }
    }
}
