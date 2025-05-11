<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shoe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'price',
        'stock',
        'is_popular',
        'category_id', // foreign key
        'brand_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value; //air jordan flying
        $this->attributes['slug'] = Str::slug($value); //air-jordan-flying
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

        public function photos(): HasMany
    {
        return $this->hasMany(ShoePhoto::class);
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(ShoeSize::class);
    }

}

