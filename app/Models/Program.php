<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'year_id',
        'title',
        'description',
        'start_month',
        'start_week',
        'end_month',
        'end_week',
        'status',
        'created_by',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getStartWeekIndexAttribute()
    {
        return ($this->start_month - 1) * 5 + $this->start_week;
    }

    public function getEndWeekIndexAttribute()
    {
        return ($this->end_month - 1) * 5 + $this->end_week;
    }

}
