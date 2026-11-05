<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'photo',
        'price',
        'description',
        'origin_country',
        'release_year',
        'model',
        'category',
        'quantity_in_stock',
    ];

    public $timestamps = false;
}
