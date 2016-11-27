<?php

namespace App\Http\Controllers\Team;

use App\Team;
use App\TeamAthlete;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    // GET

    public function manage() {
        $teams = Team::where('user_id', auth()->user()->id)->get();
        return view('team/list-team', ['teams' => $teams]);
    }

    public function manageAthlete($id) {
        $athletes = TeamAthlete::where('team_id', $id)->get();
        return view('team/player-manage', ['athletes' => $athletes]);
    }

    public function indexAddTeam() {
        return view('team/add-team');
    }

    public function indexEditTeam($id) {
        $team = Team::find($id);
        $athletes = User::where('type_id', 3)->get();
        return view('team/edit-team', ['team' => $team, 'athletes' => $athletes]);
    }

    // POST

    public function addTeam(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $new_team = Team::create([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('team_add_team')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Add team success'
        ]);
    }

    public function editTeam(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        Team::find($request->team_id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('team_edit_team', [$request->team_id])->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Edit team success'
        ]);
    }

    public function addPlayer(Request $request) {
        if ($request->input('athlete') == -1)
            return redirect()->route('team_edit_team', [$request->team_id])->with([
                'status'=>'danger',
                'title'=> 'Error!!!',
                'message'=>'Fail add player to team'
            ]);

        $new_player = TeamAthlete::create([
            'team_id' => $request->input('team_id'),
            'user_id' => $request->input('athlete')
        ]);

        return redirect()->route('team_edit_team', [$request->team_id])->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Add player to team success'
        ]);
    }

    public function deletePlayer($id) {
        TeamAthlete::destroy($id);

        return redirect()->route('team_manage_athlete')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Delete athlete success'
        ]);;
    }

    public function deleteTeam($id) {
        Team::destroy($id);

        return redirect()->route('team_manage_team')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Delete event success'
        ]);;
    }
}
