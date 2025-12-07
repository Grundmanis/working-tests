<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function members() 
    {
        return $this->belongsToMany(User::class, 'organization_members');
    }
}
