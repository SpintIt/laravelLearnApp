<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $image
 * @property mixed $price_discount
 * @property mixed $price
 * @property mixed $quantity
 * @property mixed $active
 * @property mixed $size_id
 * @property mixed $color_id
 * @property mixed $product_id
 * @property mixed $code
 * @property mixed $id
 */
class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'product_id' => $this->product_id,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
            'active' => $this->active,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'price_discount' => $this->price_discount,
            'image' => $this->image,
        ];
    }
}
