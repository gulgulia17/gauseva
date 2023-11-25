<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id', 'title', 'description', 'image', 'price', 'time_duration', 'owner_of_campaign','is_featured', 'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
