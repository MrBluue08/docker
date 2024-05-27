<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Models\Room;
use App\Models\TeamInvitation;
use App\Models\SponsorCompanie;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function login($fail = null){
        $error = $fail;
        return view("main.login", compact("error"));
    }

    public function auth(){
        request()->validate([
            'mail' => 'required',
            'passwd' => 'required',
        ]);
        $mail = request()->input('mail');
        $passwd = request()->input('passwd');
        $user = User::getUserWithMail($mail);
        if($user && Hash::check($passwd, $user->userPassword)) {
            Auth::guard('user')->login($user);
            session(['userMail' => $user->userMail]);
            session(['teamId' => $user->teamId]);
            return redirect()->route('user.main');
        }elseif(!$user){
            $error = "mail";
            return redirect()->route('user.login', compact("error"));
        }else{
            $error = "passwd";
            return redirect()->route('user.login', compact("error"));
        }
    }

    
    public function logout(Request $request){
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }

    public function main(){
        $rooms = Room::orderBy('roomDate')->paginate(4);
        $sponsors = SponsorCompanie::mainPageSponsors();
        return view("main.index", compact('rooms', 'sponsors'));
    }
    
    public function userProfile($mail){
        $teamInfo=0;
        $teamMembers=0;
        $position=0;
        $pendingInvites=-1;
        $userInfo=User::userInfo($mail);
        if($userInfo->teamId != 0 ){
            $teamInfo=Team::teamInfo($userInfo->teamId);
            $teamMembers=User::teamMembers($userInfo->teamId);
            $position=Team::ranking($userInfo->teamId);
        }else{
            $pendingInvites=TeamInvitation::totalPendingInvitations($mail);
        }
        return view("main.userProfile", compact('userInfo', 'teamInfo', 'teamMembers', 'position', 'pendingInvites'));
    }
    
    public function leaveTeam(Request $request){
        request()->validate([
            'userMail' => 'required'
        ]);
        User::leaveTeam($request->userMail);
        return redirect()->route('userProfile', ['mail' => request()->input('userMail')])->with('success', 'Ha abandonado el equipo exitosamente');
    }
    public function joinTeam(Request $request)
    {
        request()->validate([
            'teamId' => 'required|numeric'
        ]);
        User::joinTeam($request->teamId);
        $userMail=session('userMail');
        TeamInvitation::setInvitatonStatusTo1($request->teamId, $userMail);
        return redirect()->route('userProfile', ['mail' => session('userMail')])->with('success', 'Se ha unido el equipo exitosamente');

    }
    public function editTeam()
    {
        $userInfo=User::userInfo(session('userMail'));
        $freeUsers=User::noTeamUsers();
        $teamMembers=User::teamMembers($userInfo->teamId);
        return view("main.userTeamLeadEdit", compact('userInfo', 'freeUsers', 'teamMembers'));
    }
    public function pendingInvitesList($mail)
    {
        $teamIDs=TeamInvitation::teamsInvitationsID($mail);
        $teams= Team::teamInvitationsInfo($teamIDs);
        return view('main.userTeamInvitations', compact('teams'));
    }
    public function register(Request $request){
        request()->validate([
            'mail' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'adress' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'passwd' => 'required',
            'passwdAgain' => 'required'
        ]);

        $mail = request()->input('mail');
        $name = request()->input('name');
        $surname = request()->input('surname');
        $adress = request()->input('adress');
        $birthDate = request()->input('birthDate');
        $gender = request()->input('gender');
        $passwd = request()->input('passwd');
        $passwdAgain = request()->input('passwdAgain');

        $user = User::getUserWithMail($mail);
        
        if($passwd == $passwdAgain and !$user) {

            $registered = new User;
            $registered->userMail = $mail;
            $registered->userName = $name;
            $registered->userSurname = $surname;
            $registered->userAdress = $adress;
            $registered->userGender = $gender;
            $registered->userBirthDay = $birthDate;
            $registered->userPassword = Hash::make($passwd);
            $registered->save();

            Auth::guard('user')->login($registered);
            session(['userMail' => $registered->userMail]);

            return redirect()->route('user.main');
        }else{
            return redirect()->route('user.login');

        }
    }
    public function openEditUserInfo(){
        $userInfo=User::userInfo(session('userMail'));
        return view('main.userProfileEdit', compact('userInfo'));
    }
    public function openGlobalRanking(){
        
    }
    public function showInfo(){
        return view('main.info');
    }

    public function search(Request $request){
        $output = '';
       if($request->ajax()){
           $items = User::where('userName', 'LIKE', $request->searchBar.'%')
           ->orWhere('userMail', 'LIKE', $request->searchBar.'%')
           ->get();
           if($items){
               foreach($items as $item){
                   $output .= "
                   <tr>
                        <th scope='row'> {{$item->id}} </th>
                        <td>{{$item->userName}} {{$item->userSurname}}</td>
                        <td>{{$item->userMail}}</td>
                        <td><input type='checkbox' name='invitaciones[]' value='{{$item->userMail}}'></td>
                    </tr>";
               }
               return response()->json($output);
           }
       }
    }
    public function openRiddles()
    {
        return view('main.publicRiddles');
    }
}
