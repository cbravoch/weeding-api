<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableGuestController extends Controller
{
    public function index()
    {
        $tableGuests = TableGuest::all();
        return response()->json([
            'message' => 'Mesas obtenidas exitosamente',
            'tableGuests' => $tableGuests,
        ], 200);
    }

    public function store(Request $request)
    {
        $validateTableGuest = $request->validate([
            'name' => 'required',
        ]);

        if ($validateTableGuest) {
            $tableGuest = TableGuest::create($validateTableGuest);
            return response()->json([
                'message' => 'Mesa creada exitosamente',
                'tableGuest' => $tableGuest,
            ], 200);
        }

        return response()->json([
            'message' => 'No se pudo crear la mesa',
            'errors' => $validateTableGuest,
        ], 400);
    }
}
