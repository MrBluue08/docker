<?php

namespace App\Http\Controllers;

use App\Models\InsuranceCompanie;
use App\Models\Room;
use App\Models\InsuredRoom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreInsuranceCompanieRequest;
use App\Http\Requests\UpdateInsuranceCompanieRequest;

class InsuranceCompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insuranceList = InsuranceCompanie::allInsuranceCompanies() ;
        return view('admin.listaAseguradoras', compact("insuranceList"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nuevaAseguradora');
    }

    public function roomNewInsureList($cif)
    {
        $insurance = InsuranceCompanie::where('CIF', $cif)->first();
        $roomIdAsegurados = InsuredRoom::pluck('roomId')->all();
        $rooms = Room::notInsuredRooms($roomIdAsegurados);
        return view('admin.insuranceInsuredRooms', compact('insurance', 'rooms'));
    }
    public function roomInsuredList($cif){
        $insurance = InsuranceCompanie::where('CIF', $cif)->first();
        $roomIdAsegurados = InsuredRoom::pluck('roomId')->all();
        $rooms = Room::insuredRooms($roomIdAsegurados);
        return view('admin.insuranceInsuredRoomsList', compact('insurance', 'rooms'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'insuranceName' => 'required|string|max:255',
            'insuranceAdress' => 'required|string|max:255', 
            'CIF' => [
                'required', 
                'string', 
                'max:9', 
                Rule::unique('insurance_companies')->where(function ($query) use ($request) { // Pass $request into the closure
                    return $query->where('CIF', $request->CIF);
                }),
                function ($attribute, $value, $fail) use ($request) { // Pass $request into the closure
                    if ($this->validarCIF($value)==true) {
                        $fail('El CIF no es válido.');
                    }
                }
            ],
        ]);
    
        $nuevaAseguradora= new InsuranceCompanie();
        $nuevaAseguradora->insuranceName=$request->insuranceName;
        $nuevaAseguradora->insuranceAdress=$request->insuranceAdress;
        $nuevaAseguradora->CIF=$request->CIF;
        $nuevaAseguradora->save();
    
        return redirect()->route('listInsurance')
                        ->with('success', 'Aseguradora creada correctamente');  
    }
    

    public function search(Request $request){
        $output = '';
        if($request->ajax()){
            $items = InsuranceCompanie::where('insuranceName', 'LIKE', $request->searchBar.'%')
            ->orWhere('CIF', 'LIKE', $request->searchBar.'%')
            ->get();
            if($items){
                foreach($items as $item){
                    $output .= "
                    <tr> 
                        <th scope='row'>".$item->CIF."</th>
                        <td><a href='/admin/insuranceInfo/{$item->CIF}'>$item->insuranceName</a></td>
                        <td> $item->insuranceAdress </td>";
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

    private function validarCIF($cif) {
        $return = true;
        // Eliminate any white spaces and convert to uppercase
        $cif = strtoupper(str_replace(' ', '', $cif));   
        // Length of the CIF must be 9 characters
        if (strlen($cif) !== 9) {
            $return = false; 
        }
        // First character must be a letter
        if (!preg_match('/^[A-Z]$/', $cif[0])) {
            $return = false; 
        }
        // Rest of the characters must be digits
        if (!preg_match('/^\d{7}[A-J0-9]$/', substr($cif, 1))) {
            $return = false;     
        }
        // Calculate control digit
        $digitos = str_split($cif);
        $suma = 0;
        $control = intval($digitos[8]);
        // Perform control digit calculation
        for ($i = 2; $i <= 7; $i++) {
            $valor = intval($digitos[$i - 1]);
            if ($i % 2 !== 0) {
                $valor *= 2;
                if ($valor > 9) {
                    $valor = $valor - 9;
                }
            }
            $suma += $valor;
        }
        // Check if control digit matches calculated value
        $suma %= 10;
        $suma = $suma === 0 ? 0 : 10 - $suma;
        if ($control !== $suma) {
            $return = false;
        }
        return $return;
    }

    public function infoCompanie($cif){
        // Retrieve the insurance company based on the CIF value
        $insurance = InsuranceCompanie::where('CIF', $cif)->first();
        // Handle scenarios where the insurance company with the given CIF is not found
        if (!$insurance) {
            abort(404); // Or any other action as per your application logic
        }
        // Pass the retrieved insurance company to the view
        return view('admin.aseguradoraInfoEditar', compact('insurance'));
    }


}
