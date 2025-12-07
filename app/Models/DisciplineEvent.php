<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DisciplineEvent extends Pivot
{
    protected $table = 'discipline_event';

    public $timestamps = true; 

    protected $fillable = [
        'event_id',
        'discipline_id',
        'day',
        'max_participants'
    ];

    protected $dates = ['day'];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function discipline() {
        return $this->belongsTo(Discipline::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'discipline_event_category', 'discipline_event_id', 'category_id');
    }
}
