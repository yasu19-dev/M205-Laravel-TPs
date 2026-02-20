<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::query();

        // Bonus : Implémentez une recherche par type de chambre
        if ($request->has('type')) {
            $query->where('type', $request->query('type'));
        }

        // Bonus : Ajoutez la pagination à la liste des chambres
        $rooms = $query->paginate(10);

        return RoomResource::collection($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Bonus : Ajoutez une validation aux requêtes API
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:disponible,occupé',
        ]);

        $room = Room::create($validated);

        return new RoomResource($room);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        // Validation pour la mise à jour (les champs sont optionnels)
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:disponible,occupé',
        ]);

        $room->update($validated);

        return new RoomResource($room);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Chambre supprimée avec succès']);
    }
}
