<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        'userMail',
        'userName',
        'userSurname',
        'userAdress',
        'userBirthDay',
        'userGender',
        'member',
        'userPassword',
        'active',
        'remember_token'
    ];

    public function teams()
    {
        return $this->hasOne(Team::class);
    }
    public function teamInvitations()
    {
        return $this->hasOne(TeamInvitation::class, 'invitedUserMail', 'userMail');
    }

    public function registerNew(){
        
    }
    public static function userInfo($mail){
        $team = Team::where('teamLeadMail', $mail)->where('active', 1)->first();
        $teamMem = TeamInvitation::where('invitedUserMail', $mail) ->where('status', 1)->first();
        if($team){
            User::where('userMail', $mail)->update(['teamId' => $team->id]);
        }elseif($teamMem){
            User::where('userMail', $mail)->update(['teamId' => $teamMem->teamID]);
        }
        return self::where('userMail', $mail)->first();
    }
    public static function teamMembers($teamId){
        return self::where('teamId', $teamId)->get();
    }
    public static function leaveTeam($mail){
        return self::where('userMail', $mail)->update(['teamId' => 0]);
    }
    public static function joinTeam($teamId){
        return self::where('userMail', session('userMail'))->update(['teamId' => $teamId]);
    }
    public static function noTeamUsers(){
        $invitedEmails = TeamInvitation::where('teamID', session('teamId'))->pluck('invitedUserMail')->toArray();
        return self::where('teamId', 0)
                ->whereNotIn('userMail', $invitedEmails)
                ->get();
    }

    public static function getUserWithMail($mail){
        return User::where('userMail', $mail)->first();
    }
}
