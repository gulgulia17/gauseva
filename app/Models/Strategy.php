<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Strategy extends Model
{
    use HasFactory;
    const ACTIVE =1;
    const HIDDEN =0;

    public $fillable = [
        'title', 'description', 'image', 'file', 'video', 'status'
    ];
}
