<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'price', 'status'];

    // Mutator : enregistre toujours le nom en majuscules
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value),
        );
    }

    // Accessor : formate le prix en devise locale (ex: MAD ou €) 
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => number_format($attributes['price'], 2) . ' MAD',
        );
    }
}
