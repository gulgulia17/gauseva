<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;


    public $fillable = [
        'title', 'category_id', 'price', 'created_by', 'start_at', 'end_at', 'project_description', 'images', 'documents', 'is_featured', 'status'
    ];

    public $load = ['image'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'documents' => 'array',
        'start_at' => 'datetime',
        'end_at' => 'datetime'
    ];

    /**
     * Retrieve the first image associated with the campaign.
     *
     * @return string|null
     */
    public function getImageAttribute()
    {
        $images = $this->images; // Assuming 'images' is the JSON field in the Campaign model

        if (is_array($images) && count($images) > 0) {
            return $images[0];
        }

        return null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function campaignProducts()
    {
        return $this->hasMany(CampaignProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
