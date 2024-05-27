<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Room;
use App\Models\SponsorCompanie;
use App\Models\InsuranceCompanie;
use App\Models\InsuredRoom;
use App\Models\Admin;
use App\Models\Sponsor;
use App\Models\TeamSignup;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFcontroller extends Controller
{
    public function generatePDF($roomID){
        $teams = TeamSignup::getParticipants($roomID);
        $room = Room::where('id', '=', $roomID)->first();

        $data = [
            'teams' => $teams,
            'room' => $room,
            'buttons' => false,
        ];

        $pdf = PDF::loadView('PDF.teamsPDF', $data);

        return $pdf->download('teams.pdf');
    }

    public function generateSponsorBill($sponsor){
        $sponsors = Sponsor::where('sponsorId', $sponsor)->get('roomId');
        $sponsorObj = SponsorCompanie::where('CIF', $sponsor)->get()->first();
        $sponsoredRooms = Room::whereIn('id', $sponsors)->get();
        if($sponsorObj->mainPage == 1){
            $mainPagePrice = Admin::get('mainPageSponsorPrice')->first();
        }else{
            $mainPagePrice = false;
        }
        $data = [
            'rooms' => $sponsoredRooms,
            'price' => $mainPagePrice,
            'sponsor' => $sponsorObj,
        ];

        $pdf = PDF::loadView('PDF.sponsorBill', $data);

        return $pdf->download('bill.pdf');
    }

    public function generateInsuranceBill($insurance){
        $insurances = InsuredRoom::where('insuranceCompanieCIF', $insurance)->get('roomId');
        $insuranceObj = InsuranceCompanie::where('CIF', $insurance)->get()->first();
        $insuredRooms = Room::whereIn('id', $insurances)->get();
        $data = [
            'rooms' => $insuredRooms,
            'insurance' => $insuranceObj,
        ];

        $pdf = PDF::loadView('PDF.insuranceBill', $data);

        return $pdf->download('bill.pdf');
    }
}
