<?php

namespace App\Models\Catalog;

use App\Models\Dictionary\Color;
use App\Models\Dictionary\Size;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property mixed $colors
 * @property mixed $sizes
 */
class Offer extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'color_id',
        'size_id',
        'active',
        'quantity',
        'price',
        'price_discount',
        'image_path',
    ];

    public function color(): HasOne
    {
        return $this->colors->one();
    }

    public function colors(): HasMany
    {
        return $this->hasMany(Color::class);
    }

    public function size(): HasOne
    {
        return $this->sizes->one();
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }
}
