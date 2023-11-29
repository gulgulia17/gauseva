<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignProduct extends Model
{
    use HasFactory;

    protected $table = 'campaign_product';

    public $fillable = [
        'campaign_id', 'product_id',
    ];
}
