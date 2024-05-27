<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuredRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomId',
        'insuranceCompanieCIF'
    ];

    public function insuranceCompanie(): BelongsToMany
    {
        return $this->belongsToMany(InsuranceCompanie::class);
    }
    public function room(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }
}
