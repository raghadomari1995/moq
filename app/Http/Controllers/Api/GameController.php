<?php

namespace App\Http\Controllers\Api;


use App\Game;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Http\Resources\GroupGameResource;

class GameController extends Controller
{
    public function getGames(){

        $games = Game::all();
        return response(['status' => config('global.success_code'), 'data' => GroupGameResource::collection($games)]);

    }
}
