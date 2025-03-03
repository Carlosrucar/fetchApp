<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = ['name', 'price', 'platform'];

    function store() {
        try {
            $result = $this->save();
        } catch(\Exception $e) {
            $result = false;
        }
        return $result;
    }

    function modify($request) {
        $result = false;
        try {
            $result = $this->update($request->all());
        } catch(\Exception $e) {
        }
        return $result;
    }

    static function change($request){
        $game = new Game($request->all());
        return $game->store();
    }
}