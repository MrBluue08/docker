<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'teamID',
        'invitedUserMail',
    ];

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
    public function users()
    {
        return $this->hasMany(Users::class);
    }
    public static function totalPendingInvitations($userMail)
    {
        return self::where('invitedUserMail', $userMail)
        ->where('status', 0)
        ->count();
    }
    public static function teamsInvitationsID($userMail)
    {
        return self::where('invitedUserMail', $userMail)
        ->where('status', 0)
        ->pluck('teamID');
    }
    public static function setInvitatonStatusTo1($teamId, $invitedUserMail)
    {
        return self::where('teamID', $teamId)
        ->where('invitedUserMail', $invitedUserMail)
        //->update(['status' => 1]);
        ->delete();
    }
}
