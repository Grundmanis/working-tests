<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'registration_start',
        'registration_end',
        'start_date',
        'end_date',
        'location_id',
        'user_id',
        'secretary', // just a fillable string, e.g. Armands +37120055123 test@test.com
        'organization_id'
    ];

    protected $casts = [
        'registration_start' => 'datetime',
        'registration_end' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    protected $appends = ['registration_status'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization() 
    {
        return $this->belongsTo(Organization::class);
    }

    public function judges()
    {
        return $this->belongsToMany(Judge::class);
    }

    public function disciplines()
    {
        return 
        $this->belongsToMany(Discipline::class, 'discipline_event')
                ->using(DisciplineEvent::class)
                ->withPivot('id','day','max_participants');
    }

    public function eventParticipants() {
        return $this->hasMany(EventParticipant::class);
    }

    public function participants() {
        return $this->hasManyThrough(User::class, EventParticipant::class, 'event_id', 'id', 'id', 'user_id');
    }

    protected function registrationStatus(): Attribute
    {
        $now = now();
        $isOpen = $now->between($this->registration_start, $this->registration_end);
        $isClosed = $now->greaterThan($this->registration_end);
        $status = 'New';
        if ($isOpen) {
            $status = 'Open';
        }

        if ($isClosed) {
            $status = 'Closed';
        }
        
        return new Attribute(
            get: fn () => $status
        );
    }

    protected function totalDisciplineParticipants(): Attribute
    {
        return new Attribute(
            get: fn () => $this->disciplines->sum(fn ($d) => $d->pivot?->max_participants ?? 0)
        );
    }

    protected function daysLeftToRegistrationStart(): Attribute
    {
        $days = 0;
        $now = now();

        if ($now < $this->registration_start) {
            $days = $now->diffInDays($this->registration_start);
        }

        if ($now > $this->registration_start && $now < $this->registration_end) {
            $days = $now->diffInDays($this->registration_end);
        }
    
        return new Attribute(
            get: fn () => round($days)
        );
    }
}



// 1.12 - 2.12 (two events)
// 1.12 - working test
// 2.12 - training


// 1.12 - 2.12 (two events)
// 1.12 - working test
// 2.12 - working test


// 1.12 - 2.12 (two/three events)
// 1.12 - working test
// 2.12 - dummy trial
// 2.12 - working tests (beginners only)

// 1.12 (1 event)
// working test 

// discipline