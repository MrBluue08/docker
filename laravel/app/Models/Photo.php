<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'roomId',
        'imgRute'
    ];

    public function teamSignups(): HasMany
    {
        return $this->hasMany(Room::class, 'id', 'roomId');
    }
    public static function roomPhotosCarousel($roomId)
    {
        return self::select('imgRute')
                    ->where('roomId',$roomId)
                    ->get();
    }
}
