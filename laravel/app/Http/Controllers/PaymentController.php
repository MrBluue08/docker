<?php
namespace App\Http\Controllers;


use App\Models\Room;
use App\Models\User;


class PaymentController extends Controller{
    public function loadPayment($roomId){
        $room = Room::roomInfo($roomId);
        $user = User::getUserWithMail(session('userMail'));
        return view('main.payment', compact('room', 'user'));
    }
}