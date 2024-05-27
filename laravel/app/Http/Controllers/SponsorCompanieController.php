<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\SponsorCompanie;
use App\Http\Requests\StoreSponsorCompanieRequest;
use App\Http\Requests\UpdateSponsorCompanieRequest;
use Illuminate\Http\Request;


class SponsorCompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorList = SponsorCompanie::allSponsorComp();
        return view('admin.listaSponsor', compact('sponsorList'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsorForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSponsorCompanieRequest $request)
    {
        request()->validate([
            'sponsorCIF' => 'required',
            'sponsorName' => 'required|string|max:255',
            'sponsorAdress' => 'required|string',
            'logo' => 'required',
        ]);
        $sponsor = new SponsorCompanie;       
        $sponsor->CIF = request()->input('sponsorCIF');
        $sponsor->sponsorName = request()->input('sponsorName');
        $sponsor->sponsorAdress = request()->input('sponsorAdress');
        $sponsor->sponsorLogo = request()->input('logo');
        $logopath = ImageController::storeImage(request(), "sponsorLogo", "logo", request()->input('sponsorCIF')."Logo");
        $sponsor->sponsorLogo = $logopath;
        if(request()->input('mainPage')){
            $sponsor->mainPage = 1;
        }else{
            $sponsor->mainPage = 0;
        }
        $sponsor->save();
        return redirect()->route('listSponsor');
    }

    public function edit()
    {
        request()->validate([
            'sponsorCIF' => 'required',
            'sponsorName' => 'required|string|max:255',
            'sponsorAdress' => 'required|string'
        ]);

        $sponsor = SponsorCompanie::where('CIF', request()->input('sponsorCIF'))
        ->get()
        ->first();
        //dd(request()->input('logo'));
        $sponsor->sponsorName = request()->input('sponsorName');
        $sponsor->sponsorAdress = request()->input('sponsorAdress');
        if(request()->file() != null){
            $logopath = ImageController::storeImage(request(), "sponsorLogo", "logo", request()->input('sponsorCIF')."Logo");
            $sponsor->sponsorLogo = $logopath;
        }
        if(request()->input('active')){
            $sponsor->active = 1;
        }else{
            $sponsor->active = 0;
        }
        if(request()->input('mainPage')){
            $sponsor->mainPage = 1;
        }else{
            $sponsor->mainPage = 0;
        }
        $sponsor->save();
        return redirect()->route('listSponsor');        
    }

    public function editForm($cif)
    {
        $sponsor = SponsorCompanie::getWithCIF($cif); 
        return view('admin.editSponsorForm', compact('sponsor'));
    }

  

    public function search(Request $request){
       $output = '';
       if($request->ajax()){
           $items = SponsorCompanie::where('sponsorName', 'LIKE', $request->searchBar.'%')
           ->orWhere('CIF', 'LIKE', $request->searchBar.'%')
           ->get();
           if($items){
               foreach($items as $item){
                   $output .= "
                   <tr> 
                       <th scope='row'>".$item->CIF."</th>
                       <td><a href='/admin/editSponsor/{$item->CIF}'>$item->sponsorName</a></td>
                       <td> $item->sponsorAdress </td>";
                   if($item->active == 0){
                       $output .="
                       <td class='text-danger'>
                           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle' viewBox='0 0 16 16'>
                               <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>
                               <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/>
                           </svg>
                           Inactivo
                       </td>";
                   }else{
                       $output .= "
                       <td class='text-success'>
                           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                               <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>
                               <path d='m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05'/>
                           </svg>
                           Activo
                       </td>";
                   }
                  $output .= 
                  "</tr>";
               }
               return response()->json($output);
           }
       }
   
    }
}
