<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Explicitly defining the table name if it's not the plural of the model name

    protected $primaryKey = 'id'; // Setting the primary key

    public $incrementing = true; // Ensure this is true if your primary key is auto-incrementing (default is true)

    protected $fillable = [
        'name',
        'quality',
        'qty',
        'price',
        'description'
    ];
}