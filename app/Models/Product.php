<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id	',
        'name',
        	'price',
            	'sale_price',
                	'image',
                    	'category_id',
                        	'slug',
                            	'description',
                                'stock'
    ];

    /**
     * The category that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 1 sản phẩm có nhiều ảnh mô tả
    public function images(){
        return $this->hasMany(ImgProduct::class);
    }
}
