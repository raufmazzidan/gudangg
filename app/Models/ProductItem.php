<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'serial_number',
        'production_date',
        'warranty_start',
        'warranty_duration',
        'status',
    ];
}