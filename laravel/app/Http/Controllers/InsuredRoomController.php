<?php

namespace App\Http\Controllers;

use App\Models\InsuredRoom;
use App\Http\Requests\StoreInsuredRoomRequest;
use App\Http\Requests\UpdateInsuredRoomRequest;

class InsuredRoomController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInsuredRoomRequest $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'CIF' => 'required',
            'salas' => 'required|array',
        ]);

        $insuredCompanieCIF = $request->CIF;
        $roomIds = $request->salas;
        // Verificar si hay habitaciones seleccionadas
        if ( isset($roomIds) && $roomIds != null && count($roomIds) > 0) {
            $dataArray = [];
            foreach ($roomIds as $roomId) {
                $dataArray[] = [
                    'roomId' => $roomId,
                    'insuranceCompanieCIF' => $insuredCompanieCIF,
                ];
            }
            // Insertar los datos en la base de datos
            InsuredRoom::insert($dataArray);

            return back()->with('success', 'Las habitaciones han sido aseguradas exitosamente.');
        } else {
            // Manejar el caso en el que no se hayan seleccionado habitaciones
            return back()->with('error', 'Debe seleccionar al menos una habitación para asegurar.');
        }
    }

    public function delete(StoreInsuredRoomRequest $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'CIF' => 'required',
            'salas' => 'required|array',
        ]);

        $insuredCompanieCIF = $request->CIF;
        $roomIds = $request->salas;
        // Verificar si hay habitaciones seleccionadas
        if (isset($roomIds) && $roomIds != null && count($roomIds) > 0) {
            // Eliminar los datos de las habitaciones aseguradas en la base de datos
            InsuredRoom::whereIn('roomId', $roomIds)
                    ->where('insuranceCompanieCIF', $insuredCompanieCIF)
                    ->delete();

            return back()->with('success', 'Las habitaciones han sido desaseguradas exitosamente.');
        } else {
            // Manejar el caso en el que no se hayan seleccionado habitaciones
            return back()->with('error', 'Debe seleccionar al menos una habitación para desasegurar.');
        }
    }

  
}
