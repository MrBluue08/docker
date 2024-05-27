<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompanie extends Model
{
    use HasFactory;
    protected $fillable = [
        'CIF',
        'insuranceName',
        'insuranceAdress',
        'active'
    ];

    public static function allInsuranceCompanies(){
        return self::select('CIF', 'insuranceName', 'insuranceAdress', 'active') // Selecciona las columnas deseadas
                    ->get(); // Obtiene los resultados
    }
    public static function insuranceCompanieInfo($cif){
        return self::select('CIF', 'insuranceName', 'insuranceAdress', 'active')
                    ->where('CIF', $cif)
                    ->get();
    }
}
