<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    public static $breeds = [
        'LR' => 'Labrador Retriever',
        'GR' => 'Golden Retriever',
        'FCR' => 'Flat-Coated Retriever',
        'CBR' => 'Chesapeake Bay Retriever',
        'NSDTR' => 'Nova Scotia Duck Tolling Retriever',
        'CCR' => 'Curly Coated Retriever',
    ];

    public static $genders = [
        'm' => 'Male',
        'f' => 'Female',
    ];

    protected $fillable = [
        'registeredName',
        'homeName',
        'registrationNumber',
        'microchip',
        'dob',
        'gender',
        'breed',
        'user_id'
    ];

    public function getBreedNameAttribute()
    {
        return self::$breeds[$this->breed] ?? $this->breed;
    }

    public function breeds()
    {
        return self::$breeds;
    }
}
