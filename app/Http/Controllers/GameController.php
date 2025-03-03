<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class GameController extends Controller {

    function main() {
        return view('main');
    }

    public function index() {
        return response()->json([
            'games' => Game::orderBy('name')->paginate(10),
            'user' => Auth::user()
        ]);
    }

    public function store(Request $request) {
        $games = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:games|max:100|min:2',
            'price' => 'required|numeric|gte:0|lte:1000',
            'platform' => 'required|string|max:50'
        ]);
    
        if ($validator->passes()) {
            $message = '';
            $result = Game::change($request);
            if ($result) {
                $games = Game::orderBy('name')->paginate(10)->setPath(url('game')); // Cambiado de 'games' a 'game'
            } else {
                $message = 'Error saving the game';
            }
        } else {
            $result = false;
            $message = $validator->getMessageBag();
        }
        return response()->json(['result' => $result, 'message' => $message, 'games' => $games]);
    }
    public function show($id) {
        return response()->json([
            'game' => Game::find($id)  // Changed from 'product' to 'game'
        ]);
    }
    
    public function update(Request $request, $id) {
        $games = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100|min:2',
            'price' => 'required|numeric|gte:0|lte:1000',
            'platform' => 'required|string|max:50'
        ]);
    
        if ($validator->passes()) {
            $message = '';
            $game = Game::find($id);
            $result = $game->modify($request);
            if ($result) {
                $games = Game::orderBy('name')->paginate(10)->setPath(url('game'));
            } else {
                $message = 'Error updating the game';
            }
        } else {
            $result = false;
            $message = $validator->getMessageBag();
        }
        return response()->json(['result' => $result, 'message' => $message, 'games' => $games]);
    }
    
    public function destroy($id) {
        $result = Game::destroy($id);
        return response()->json([
            'result' => $result,
            'games' => Game::orderBy('name')->paginate(10)->setPath(url('game'))  // Added setPath
        ]);
    }
}
