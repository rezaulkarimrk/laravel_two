<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $filable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
    ];
}
