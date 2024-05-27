<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'teamName',
        'leagueParticipant',
        'roomsDone',
        'points',
        'teamLeadMail',
        'active'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function teamInvitations(): hasMany
    {
        return $this->hasMany(TeamInvitations::class, 'teamID', 'id');
    }
    public function teamSignups() :hasMany
    {
        return $this->hasMany(TeamSignup::class, 'teamId', 'id');
    }
    public static function topFive(){
        return self::orderBy('points', 'desc') // Ordena por puntos de forma descendente
                    ->select('teamName', 'roomsDone', 'teamLeadMail', 'id') // Selecciona las columnas deseadas
                    ->take(5) // Limita los resultados a los primeros 5
                    ->get(); // Obtiene los resultados
    }
    public static function allTeams(){
        return self::select('id', 'teamName', 'leagueParticipant', 'roomsDone', 'points', 'teamLeadMail', 'active') // Selecciona las columnas deseadas
                    ->get(); // Obtiene los resultados
    }
    public static function teamInfo($teamId){
        return self::where('id', $teamId)->where('active', 1)->first();
    }
    public static function ranking($teamId){
        $team = self::where('id', $teamId)->first();
        // Consulta para obtener la posición del equipo en la liga
        $position = Team::where('leagueParticipant', 1)
                        ->orderBy('points', 'desc')
                        ->pluck('id')
                        ->search($teamId);
        // Incrementar la posición por 1 para obtener la posición real (ya que el índice comienza desde 0)
        $position += 1;
        // Asignar la posición al objeto de equipo
        return $position;
    }
    public static function teamInvitationsInfo($teamIds)
    {
        return self::whereIn('id', $teamIds)
        ->where('active', 1)
        ->select('id','teamName', 'teamLeadMail', 'points', 'roomsDone')
        ->get();
    }
    public static function deactivateTeamAndRemoveInvitations($teamId)
    {
        self::where('id', $teamId)->update(['active' => 0]);
        $invitedEmails = TeamInvitation::where('teamID', $teamId)->pluck('invitedUserMail');
        if (!in_array(session('userMail'), $invitedEmails)) {
            // Si no está presente, agregarlo al array
            $invitedEmails[] = session('userMail');
        }
        TeamInvitation::where('teamID', $teamId)->delete();
        User::whereIn('userMail', $invitedEmails)->update(['teamId' => 0]);
    }
    public static function top3Global()
    {
        return self::orderBy('points', 'desc')->take(3)->get();

    }
    public static function globalRanking()
    {
        return self::orderBy('points', 'desc')->offset(3)
        ->limit(PHP_INT_MAX)->get();
    }

    public static function top3League()
    {
        return self::where('leagueParticipant', 1)->orderBy('points', 'desc')->take(3)->get();

    }
    public static function leagueRanking()
    {
        return self::where('leagueParticipant', 1)->orderBy('points', 'desc')->offset(3)
        ->limit(PHP_INT_MAX)->get();
    }
    public static function getTeamsResultInfo($teamIds)
    {
        return self::whereIn('id', $teamIds)
        ->pluck('teamName');
    }

}
