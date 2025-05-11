<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        $countGuests = $guests->count();
        $pendingGuests = $guests->where('guest_state_id', config('guest.states.NOT_CONFIRMED'))->count();
        $confirmedGuests = $guests->where('guest_state_id', config('guest.states.CONFIRMED'))->count();
        $rejectedGuests = $guests->where('guest_state_id', config('guest.states.REJECTED'))->count();
       
        return response()->json([
            'message' => 'Invitados obtenidos exitosamente',
            'guests' => $guests,
            'countGuests' => $countGuests,
            'pendingGuests' => $pendingGuests,
            'confirmedGuests' => $confirmedGuests,
            'rejectedGuests' => $rejectedGuests,
        ], 200);
    }

    public function store(Request $request)
    {
        $validateGuest = $request->validate([
            'name' => 'required',
            'surname' => 'required',
        ]);

        if ($validateGuest) {
            if(!isset($validateGuest['guest_state_id'])){
                $validateGuest['guest_state_id'] = config('guest.states.NOT_CONFIRMED');     
            }

            $guest = Guest::create($validateGuest);
            return response()->json([
                'message' => 'Invitado creado exitosamente',
                'guest' => $guest,
            ], 200);
        }

        return response()->json([
            'message' => 'No se pudo crear el invitado',
            'errors' => $validateGuest,
        ], 400);
    }

    public function update(Request $request, $id)
    {
        $validateGuest = $request->validate([
            'guest_state_id' => 'required',
        ]);
        if ($validateGuest) {
            $guest = Guest::find($id);
            if($guest){
                $guest->update($validateGuest);
                return response()->json([
                    'message' => 'Invitado actualizado exitosamente',
                    'guest' => $guest,
                ], 200);
            }else{
                return response()->json([
                    'message' => 'No se encontro el invitado',
                    'errors' => $validateGuest,
                ], 400);
            }
        }

        return response()->json([
            'message' => 'No se pudo actualizar el invitado ',
            'errors' => $validateGuest,
        ], 400);
    }
}
