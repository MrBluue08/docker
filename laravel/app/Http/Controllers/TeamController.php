<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Room;
use App\Models\TeamInvitation;
use App\Models\TeamSignup;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PHPUnit\Framework\MockObject\ReturnValueGenerator;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::allTeams();
        return view('admin.listaEquipos', compact("teams"));
    }

   

    public function saveTime($dorsal,$roomId){
        $room = Room::where('id', $roomId)->get()->first();
        $roomDate = Carbon::parse($room->roomDate);
        $now = Carbon::now()->format('Y-m-d H:i:s');

        $diff = $roomDate->diff($now)->format('%H:%I:%S');;
        $signUp = TeamSignup::where('roomId', $roomId)->where('dorsal', $dorsal)->get()->first();
        if($signUp->tiempo == null){
            $signUp->tiempo = $diff;
            $signUp->save();
        }

        $team = Team::where('id', $signUp->teamId)->get()->first();


        return view('main.myTime', compact('signUp', 'room', 'team'));
    }

    public function store(StoreTeamRequest $request)
    {

        $request->validate([
            'teamName' => 'required|string|max:255',
        ]);
        if($request->leagueParticipantCheck == "on" ){
            $leagueParticipant = 1;
        }else{
            $leagueParticipant = 0;
        }
        $newTeam = new Team();
        $newTeam->teamName=$request->teamName;
        $newTeam->leagueParticipant=$leagueParticipant;
        $newTeam->teamLeadMail=session('userMail');
        $newTeam->save();

        return redirect()->route('userProfile', ['mail' => session('userMail')])->with('success', 'Se ha creado el equipo exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Team::deactivateTeamAndRemoveInvitations(session('dorsal'));
        return redirect()->route('userProfile', ['mail' => session('userMail')])->with('success', 'Se ha eliminado el equipo exitosamente');

    }
    public function obtenerUsuariosPorCorreoInvitacion($id) {
        // Supongamos que el parámetro pasado es el ID del equipo
        // Usamos Eloquent para realizar la consulta
        $usuarios = User::join('team_invitations', 'users.userMail', '=', 'team_invitations.invitedUserMail')
                        ->where('team_invitations.dorsal', $id)
                        ->get();
        return $usuarios;
    }
    public function openGlobalRanking(){
        $top3=Team::top3Global();
        $top=Team::globalRanking();
        return view('main.globalRanking', compact('top3', 'top'));
    }
    public function openLeagueRanking(){
        $top3=Team::top3League();
        $top=Team::leagueRanking();
        return view('main.leagueRanking', compact('top3', 'top'));
    }
    public function search(Request $request){
        $output = '';
        if($request->ajax()){
            $items = Team::where('teamName', 'LIKE', $request->searchBar.'%')
            ->get();
            if($items){
                foreach($items as $item){
                    $output .= "
                    <tr>
                        <th scope='row'>$item->teamName</th>
                        <td>$item->roomsDone</td>
                        <td>$item->points</td>
                        <td>$item->teamLeadMail</td>";
                        if($item->leagueParticipant == 1){
                            $output .= "
                            <td class='text-warning'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star-fill' viewBox='0 0 16 16'>
                                <path d='M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z'/>
                            </svg></td>";
                        }elseif($item->leagueParticipant == 0){
                            $output .= "
                            <td class='text-danger'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star' viewBox='0 0 16 16'>
                                    <path d='M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z'/>
                                </svg>
                            </td>";
                        }
                        if($item->active == 0){
                            $output .="
                            <td class='text-danger'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>
                                    <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/>
                                </svg>
                                Inactivo
                            </td>";
                        }else{
                            $output .= "
                            <td class='text-success'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>
                                    <path d='m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05'/>
                                </svg>
                                Activo
                            </td>";
                        }
                   $output .= 
                   "</tr>";
                }
                return response()->json($output);
            }
        }
    
     }

}
