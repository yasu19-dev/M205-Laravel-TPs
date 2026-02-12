<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodosController extends Controller
{
    /**
     * Affiche tous les Todos
     */
    public function index(Request $request)
    {
        $todos = Todo::all();

        // Log : Avertissement qu'un utilisateur accède à tout [cite: 101]
        Log::channel('mon_fichier')->warning('User is accessing all the Todos', [
            'user' => Auth::id()
        ]);

        return view('dashboard')->with(['todos' => $todos]);
    }

    /**
     * Affiche les Todos de l'utilisateur connecté
     */
    public function byUserId(Request $request)
    {
        $todos = Todo::where('user_id', Auth::id())->get();

        // Log : Info que l'utilisateur accède à ses propres todos [cite: 107]
        Log::channel('mon_fichier')->info('User is accessing all his todos', [
            'user' => Auth::id()
        ]);

        return view('dashboard')->with(['todos' => $todos]);
    }

    /**
     * Affiche un Todo spécifique
     */
    public function show(Request $request, $id)
    {
        $todo = Todo::find($id);

        // Log : Info accès à un todo unique [cite: 113]
        Log::channel('mon_fichier')->info('User is accessing a single todo', [
            'user' => Auth::id(),
            'todo' => $todo->id
        ]);

        return view('show')->with(['todo' => $todo]);
    }

    /**
     * Crée un nouveau Todo
     */
    public function store(Request $request)
    {
        // Log : Tentative de création [cite: 137]
        Log::channel('mon_fichier')->warning('User is trying to create a single todo', [
            'user' => Auth::id(),
            'data' => $request->except('password')
        ]);

        // Validation et création
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->desc; // Note: Assurez-vous que votre migration a bien la colonne 'description' ou 'desc'
        $todo->user_id = Auth::id();

        if ($todo->save()) {
            // Log : Succès de création [cite: 144]
            Log::channel('mon_fichier')->info('User create a single todo successfully', [
                'user' => Auth::id(),
                'todo' => $todo->id
            ]);
            return view('show', ['todo' => $todo]);
        }

        // Log : Échec de création (données invalides) [cite: 147]
        Log::channel('mon_fichier')->warning('Todo could not be created caused by invalid todo data', [
            'user' => Auth::id(),
            'data' => $request->except('password')
        ]);

        return response()->json(['error' => 'Creation failed'], 422);
    }

    /**
     * Met à jour un Todo existant
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::where('user_id', Auth::id())->where('id', $id)->first();

        // Log : Todo trouvé pour mise à jour [cite: 120]
        Log::channel('mon_fichier')->warning('Todo found for updating by user', [
            'user' => Auth::id(),
            'todo' => $todo
        ]);

        if ($todo) {
            $todo->title = $request->title;
            $todo->description = $request->desc;
            $todo->is_completed = $request->status == 'on' ? 1 : 0; // Correction probable de 'status' vers 'is_completed' selon votre migration

            if ($todo->save()) {
                // Log : Mise à jour réussie [cite: 126]
                Log::channel('mon_fichier')->info('Todo updated by user successfully', [
                    'user' => Auth::id(),
                    'todo' => $todo->id
                ]);
                return view('show', ['todo' => $todo]);
            }

            // Log : Échec validation [cite: 129]
            Log::channel('mon_fichier')->warning('Todo could not be updated caused by invalid todo data', [
                'user' => Auth::id(),
                'todo' => $todo->id,
                'data' => $request->except('password')
            ]);
            return response()->json(['error' => 'Update failed'], 422);
        }

        // Log : Erreur Todo non trouvé [cite: 132]
        Log::channel('mon_fichier')->error('Todo not found by user', [
            'user' => Auth::id(),
            'todo' => $id
        ]);

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Supprime un Todo
     */
    public function delete(Request $request, $id)
    {
        // Log : Tentative de suppression [cite: 152]
        Log::channel('mon_fichier')->warning('User is trying to delete a single todo', [
            'user' => Auth::id(),
            'todo' => $id
        ]);

        $todo = Todo::where('user_id', Auth::id())->where('id', $id)->first();

        if ($todo) {
            // Log : Suppression réussie [cite: 155]
            Log::channel('mon_fichier')->info('User deleted a single todo successfully', [
                'user' => Auth::id(),
                'todo' => $id
            ]);

            $todo->delete();
            return view('index');
        }

        // Log : Erreur suppression (non trouvé) [cite: 159]
        Log::channel('mon_fichier')->error('Todo not found by user for deleting', [
            'user' => Auth::id(),
            'todo' => $id
        ]);

        return response()->json(['error' => 'Not found'], 404);
    }
}
