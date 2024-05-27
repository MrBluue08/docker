<?php

namespace App\Http\Controllers;

use App\Models\TeamInvitation;
use App\Http\Requests\StoreTeamInvitationRequest;
use App\Http\Requests\UpdateTeamInvitationRequest;

class TeamInvitationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamInvitationRequest $request)
    {
        $request->validate([
            'invitaciones' => 'required|array|between:1,5'
        ]);
        $correos = $request->invitaciones;
        foreach ($correos as $correo) {
            TeamInvitation::create([
                'teamID' => session('teamId'),
                'invitedUserMail' => $correo,
            ]);
        }
        return redirect()->route('userProfile', ['mail' => session('userMail')])->with('success', 'Las invitaciones se han enviado correctamente');
    }

  
}
