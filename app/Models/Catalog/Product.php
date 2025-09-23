<?php

namespace App\Models\Catalog;

use App\Models\Dictionary\Color;
use App\Models\Dictionary\Size;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property float priceMin
 * @property float priceDiscountMin
 */

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'active',
        'code',
        'sort',
        'image',
        'description',
    ];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'offers', 'product_id', 'color_id')->distinct();
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'offers', 'product_id', 'size_id')->distinct();
    }

    public function offerWithMinimalPrice(): ?HasOne
    {
        return $this->hasOne(Offer::class)->orderBy('price');
    }
}
