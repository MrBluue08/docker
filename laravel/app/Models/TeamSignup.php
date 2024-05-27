<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamSignup extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomId',
        'teamId'
    ];

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
    public function rooms()
    {
        return $this->hasMany(User::class);
    }

    public static function getParticipants($roomID){
        $signUps = self::where('roomId', '=', $roomID)
        ->orderBy('created_at')
        ->get();

        $teams = [];
        foreach($signUps as $signUp){
            $signedUp = Team::where('id', '=', $signUp->teamId)
            ->first();
            $teams[$signUp->dorsal] = $signedUp;
        }
        return $teams;
    }
    public static function getResults($roomId){
        return self::where('roomId', $roomId)
        ->where('status', 1)
        ->orderBy('tiempo', 'asc')
        ->pluck('teamId');
    }
}
