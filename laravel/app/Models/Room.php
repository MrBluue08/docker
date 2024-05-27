<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'roomName',
        'roomDescription',
        'roomMaxTeams',
        'roomMaxTime',
        'roomDate',
        'roomTotalTeams',
        'roomStructueImg',
        'roomPromotionImg',
        'roomPromotionCost',
        'roomInsuranceCost',
        'roomInscriptionPrice',
        'roomInscriptionPriceMembers',
        'active'
    ];

    public function sponsorCompanie(): BelongsToMany
    {
        return $this->belongsToMany(SponsorCompanie::class, 'sponsors', 'sponsorId', 'roomId');
    }
    public function teamSignups(): HasMany
    {
        return $this->hasMany(TeamSignup::class, 'RoomId', 'id');
    }
    public static function incomingRooms(){
        return self::orderBy('roomDate', 'desc') // Ordena por puntos de forma descendente
                    ->select('roomName', 'roomDescription', 'roomPromotionImg', 'id', 'roomMaxTeams', 'roomTotalTeams') // Selecciona las columnas deseadas
                    ->take(3) // Limita los resultados a los primeros 3
                    ->get(); // Obtiene los resultados
    }
    public static function allRooms(){
        return self::all();
    }
    public static function notInsuredRooms($insuredRooms){
        $todayDate = now()->toDateString();
        return self::whereNotIn('id', $insuredRooms)
                    ->whereDate('roomDate', '>', $todayDate)
                    ->get();
    }
    public static function insuredRooms($insuredRooms){
        $todayDate = now()->toDateString();
        return self::whereIn('id', $insuredRooms)
                    ->whereDate('roomDate', '>', $todayDate)
                    ->get();
    }

    public static function incoming(){
        return self::orderBy('roomDate')->paginate(12);
    }
    public static function roomInfo($roomId)
    {
        return self::where('id', $roomId)->first();
    }
   
}
