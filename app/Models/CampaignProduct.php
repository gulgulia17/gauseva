<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignProduct extends Model
{
    use HasFactory;

    public $fillable = [
        'campaign_id', 'product_id',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

}
