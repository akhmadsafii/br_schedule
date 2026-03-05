<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'month',
        'status',
        'finalized_at',
    ];

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
        'finalized_at' => 'datetime',
    ];

    public $timestamps = false;

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
