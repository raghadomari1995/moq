<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\GameObjective;
use App\GroupGame;
use App\Http\Controllers\Controller;
use App\LevelQuestion;
use App\ObjectiveLevel;
use App\PlayerMinute;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{

    public function index()
    {
        $games = Game::orderBy('id','desc')->get();
        return view('admin.games.index',['games'=>$games]);
    }


    public function create()
    {
        return view('admin.games.create');
    }


    public function store(Request $request)
    {
        $locales = config('translatable.locales');
        $game = new Game($request->except('name'));
        $game->save();
        foreach ($locales as $locale) {
            $game->translateOrNew($locale)->name = $request->name[$locale];
        }
        $game->save();

        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.games.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit',['game'=>$game]);
    }


    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $locales = config('translatable.locales');
        $game->update($request->except('name'));
        foreach ($locales as $locale) {
            $game->translateOrNew($locale)->name = $request->name[$locale];
        }
        $game->save();
        //add players score
        for ($x=0;$x<count($game->group->players);$x++){
            $play_minutes = PlayerMinute::where([
                ['game_id',$game->id],['player_id',$game->group->players[$x]->id]
            ])->first();
            if (!$play_minutes){
                $play_minutes = new PlayerMinute();
            }
            $play_minutes->game_id = $game->id;
            $play_minutes->player_id = $game->group->players[$x]->id;
            $play_minutes->in_minute = $request->in_minute[$x];
            $play_minutes->in_second = $request->in_second[$x];
            $play_minutes->out_minute = $request->out_minute[$x];
            $play_minutes->out_second = $request->out_second[$x];
            $play_minutes->goals = $request->goals[$x];
            $play_minutes->save();
        }//end for

        Session::flash('message','Your work has been saved');
        return redirect()->back();

    }


    public function destroy($id)
    {
        //
    }
}
