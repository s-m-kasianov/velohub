<?php

namespace App\Models;

use App\Models\Casts\JsonObject;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use Traits\Images;
    use Traits\Relations\BelongsTo\Product;
    use Traits\Relations\BelongsTo\Category;

    protected string $modelName = 'variant';
    protected string $imagesFolder = '/images/variant';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'category_id',
        'is_active',
        'is_sale',
        'price',
        'surcharge',
        'stock',
        'weight',
        'code',
        'barcode',
        'parameters',
        'images'

    ];
    protected $casts = [
        'images' => 'array',
        'parameters' => JsonObject::class,
        'stocks' => JsonObject::class
    ];

}
