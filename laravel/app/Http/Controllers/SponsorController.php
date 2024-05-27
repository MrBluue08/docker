<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
  

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sponsor = new Sponsor;

        $sponsorCompanie = $request->query('sponsor');
        $room = $request->query('room');

        $sponsor->sponsorId = $sponsorCompanie;
        $sponsor->roomId = $room;

        $sponsor->save();

    }

}
