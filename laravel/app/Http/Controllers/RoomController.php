<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Sponsor;
use App\Models\TeamSignup;
use App\Models\Team;
use App\Http\Requests\StoreRoomRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sponsor = null)
    {
        if(!$sponsor){
            $rooms = Room::paginate(4);
        }else{
            $listSponsored = Sponsor::where('sponsorId', $sponsor)->get('roomId');
            $rooms = Room::whereNotIn('id', $listSponsored)
            ->where('roomDate', '>', now()->toDateString())
            ->paginate(4);
        }

        return view('admin.listaSalas', compact('rooms', 'sponsor'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.nuevaSala');
    }

    public function incomingRooms(){
        $incoming = Room::incoming();
        return view('main.incomingRooms', compact('incoming'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'roomName' => 'required|string|max:255',
            'roomDescription' => 'required|string|max:255', 
            'roomDate' => 'required|date',
            'roomMaxCapacity' => 'required|numeric',
            'roomMaxTime' => 'required|numeric',
            'roomPromoCost' => 'required|numeric',
            'roomBaseCost' => 'required|numeric',
            'roomInsuranceCost' => 'required|numeric',
            'roomTotalCost' => 'required|numeric',
            'roomPromotionalImage' => 'required|image',
            'roomEstructureImage' => 'required|image',
        ]);
    
        $nuevaSala= new Room();
        $nuevaSala->roomName=$request->roomName;
        $nuevaSala->roomDescription=$request->roomDescription;
        $nuevaSala->roomMaxTeams=$request->roomMaxCapacity;
        $nuevaSala->roomMaxTime=$request->roomMaxTime;
        $nuevaSala->roomDate=$request->roomDate;
        $nuevaSala->roomTotalTeams= 0;
        $nuevaSala->roomStructueImg=$request->roomEstructureImage;
        $estructureImagePath=ImageController::storeImage(request(), "roomImg","roomEstructureImage", request()->input('roomName')."Estructure");
        $nuevaSala->roomStructueImg=$estructureImagePath;
        $nuevaSala->roomPromotionImg=$request->roomPromotionalImage;
        $promotionImagePath=ImageController::storeImage(request(), "roomImg","roomPromotionalImage", request()->input('roomName')."Promotion");
        $nuevaSala->roomPromotionImg=$promotionImagePath;
        $nuevaSala->roomPromotionCost=$request->roomPromoCost;
        $nuevaSala->roomInscriptionPrice=$request->roomTotalCost;
        $nuevaSala->roomInsuranceCost=$request->roomInsuranceCost;
        $costoBase = $request->roomBaseCost;
        $descuentoPromo = $request->roomPromoCost;
        $nuevaSala->roomInscriptionPriceMembers= $costoBase - $descuentoPromo;
        $nuevaSala->save();
    
        return redirect()->route('listRoom')
                        ->with('success', 'Sala creada correctamente');  
    }

    public function uploadRoomImages(Request $request){
        $request->validate([
            'roomId' => 'required|numeric',
            'roomImages.*' => 'required|image',
        ]);
        if ($request->hasFile('roomImages')) {
            
            $images = $request->file('roomImages');

            foreach ($images as $image) {
                
            }
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $request->validate([
            'roomName' => 'required|string|max:255',
            'roomDescription' => 'required|string|max:255', 
            'roomDate' => 'required|date',
            'roomMaxCapacity' => 'required|numeric',
            'roomMaxTime' => 'required|numeric',
            'roomPromoCost' => 'required|numeric',
            'roomBaseCost' => 'required|numeric',
            'roomInsuranceCost' => 'required|numeric',
            'roomTotalCost' => 'required|numeric',
        ]);
    
        $sala= Room::where('id', $request->roomId)->first();
        $sala->roomName=$request->roomName;
        $sala->roomDescription=$request->roomDescription;
        $sala->roomMaxTeams=$request->roomMaxCapacity;
        $sala->roomMaxTime=$request->roomMaxTime;
        $sala->roomDate=$request->roomDate;
        $sala->roomTotalTeams= 0;
        if($request->roomEstructureImage != null){
            $estructureImagePath=ImageController::storeImage(request(), "roomImg","roomEstructureImage", request()->input('roomName')."Estructure");
            $sala->roomStructueImg=$estructureImagePath;
        }
        if($request->roomPromotionalImage != null){
            $promotionImagePath=ImageController::storeImage(request(), "roomImg","roomPromotionalImage", request()->input('roomName')."Promotion");
            $sala->roomPromotionImg=$promotionImagePath;
        }
        $sala->roomPromotionCost=$request->roomPromoCost;
        $sala->roomInscriptionPrice=$request->roomTotalCost;
        $sala->roomInsuranceCost=$request->roomInsuranceCost;
        $sala->roomTotalTeams =$request->roomTotalTeams;
        $costoBase = $request->roomBaseCost;
        $descuentoPromo = $request->roomPromoCost;
        $sala->roomInscriptionPriceMembers= $costoBase - $descuentoPromo;
        if(request()->input('active')){
            $sala->active = 1;
        }else{
            $sala->active = 0;
        }
        $sala->save();
    
        return redirect()->route('listRoom')
                        ->with('success', 'Sala editada correctamente'); 
    }

 
    public function infoRoom($roomId){
        $room = Room::where('id', $roomId)->first();
        if(!$room){
            abort(404);
        }
        return view('admin.editRoomForm', compact('room'));
    }
    public function roomDetailsUser($roomId){
        $room = Room::where('id', $roomId)->first();
        if(!$room){
            abort(404);
        }
        return view('main.roomDetailsUser', compact('room'));
    }

    public function search(Request $request){
        $output = '';
        if($request->ajax()){
            $items = Room::where('roomName', 'LIKE', $request->searchBar.'%')
            ->get();
            if($items){
                foreach($items as $item){
                    $fecha = date('d-m-Y', strtotime($item->roomDate));
                    $hora = date('H:i', strtotime($item->roomDate));
                    $valueNow = ($item->roomTotalTeams * 100)/($item->roomMaxTeams);
                    $output .= "
                    <div class='col'>
                            <div class='card bg-dark h-100' style='width: 25rem'>
                                <img src='".asset('/images/'.$item->roomPromotionImg)."' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title text-white'> $item->roomName</h5>
                                    <p class='text-white'>Tiempo límite: $item->roomMaxTime min</p>
                                    <p class='text-white'>Fecha: $fecha $hora </p>
                                    <p class='text-white'>Participacion: </p>
                                    <div class='progress'>
                                        <div class='progress-bar progress-bar-striped ";
                                        if($valueNow < 33){
                                            $output .= "bg-success'";
                                        }elseif($valueNow >= 33 && $valueNow <= 66){
                                            $output .= "bg-warning'";
                                        }elseif($valueNow > 66){
                                            $output .= "bg-danger
                                            progress-bar-animated' role='progressbar' aria-valuenow='".intval($valueNow)."' aria-valuemin='0' aria-valuemax='100' style='width:".intval($valueNow)."%'>".intval($valueNow)."%</div>";
                                        }
                                    $output .= "</div>
                                    <a href='#' class='btn btn-primary mt-3'>Detalles</a>
                                </div>
                            </div>
                        </div>";
                }
                return response()->json($output);
            }
        }
    }

    public function listParties($roomID){
        $teams = TeamSignup::getParticipants($roomID);
        $room = Room::where('id', '=', $roomID)->first();
        $buttons = true;
        return view('PDF.teamsPDF', compact('teams', 'room', 'buttons'));
    }
    public function massImageUpload($roomId){
        return view('admin.dragableImageUpload', compact('roomId'));
    }
    public function roomResults($roomId)
    {
        $room=Room::roomInfo($roomId);
        $resutId=TeamSignup::getResults($roomId);
        $teamsInfo=Team::getTeamsResultInfo($resutId);
        return view('main.roomResults', compact('room','teamsInfo'));
    }
}
