<?php

namespace App\Http\Controllers;

use App\Models\cat_ramos;
use App\Models\cat_temas;
use App\Models\cat_unidades;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatUnidadesController extends Controller
{
    public function index() {
        return Inertia::render('Directorio/Edit',[
            "selectUnidad" => cat_unidades::when(request('search'), function ( $query, $search) {
                $query->where('ramo_general','=',base64_decode ($search));
            })->get(),
            "selectTemaGeneral" => cat_temas::all(),
        ]);
    }
    public function create(){
        if ( ! session()->has("selectedRamo")) {
            session()->put("selectedRamo", null);
        }
        return Inertia::render('Directorio/Edit',[
            "selectRamo"=> cat_ramos::select()->when(request('term'), function ( $query, $term) {
                $query->where('id','=',$term);
            })->get(),
            "selectUnidad" => cat_unidades::when(request('search'), function ( $query, $search) {
                $query->where('ramo_general','=',base64_decode ($search));
            })->get(),
            "selectTemaGeneral" => cat_temas::all(),
        ]);
    }

}
