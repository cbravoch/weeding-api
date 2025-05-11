<?php

namespace App\Models;

use App\Models\GuestState;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'guest_state_id',
        'email',
        'telephone_number'
    ];

    public function guestState()
    {
        return $this->belongsTo(GuestState::class, 'guest_state_id', 'id');
    }
}
