<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorCompanie extends Model
{
    use HasFactory;

    protected $fillable = [
        'CIF',
        'mainPage',
        'sponsorName',
        'sponsorAdress',
        'sponsorLogo',
        'active'
    ];

    public function room(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'sponsors', 'roomId', 'sponsorId');
    }

    public static function allSponsorComp(){
        return self::select()->get();
    }

    public static function getWithCIF($CIF){
        return self::select()
        ->where('CIF', $CIF)
        ->get()
        ->first();
    }

    public static function mainPageSponsors()
    {
        return self::select()
        ->where('mainPage', 1)
        ->get();
    }

   
}
