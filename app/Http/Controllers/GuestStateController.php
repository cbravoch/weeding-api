<?php

namespace App\Http\Controllers;

use App\Models\GuestState;
use Illuminate\Http\Request;

class GuestStateController extends Controller
{
    public function index()
    {
        $guestStates = GuestState::all();
        return response()->json($guestStates);
    }
}
