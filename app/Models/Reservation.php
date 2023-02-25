<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable  = [
        'status',
        'source',
        'segment',
        'start',
        'end',
        'cancelled_at',
        'created_at_in_pms',
        'user_id', // User Foreign key
        'room_id', // Room Foreign key
        'requested_category_id',
        'rate_id'
    ];

    // Tell Laravel that these fields are dates
    protected array $dates = [
        'start',
        'end',
        'cancelled_at',
        'created_at_in_pms',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
