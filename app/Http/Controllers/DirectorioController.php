<?php

namespace App\Http\Controllers;

use App\Models\cat_ramos;
use App\Models\cat_temas;
use App\Models\cat_unidades;
use App\Models\Directorio;

use Inertia\Inertia;

class DirectorioController extends Controller
{
    public function index() {
        if ( ! session()->has("search")) {
            session()->put("search", null);
        }
        return Inertia::render("Directorio/Index", [
            "filters" => session()->only(["search"]),
            "directorio" => Directorio::with("user")
                ->orderByDesc("id")
                ->filter(request()->only("search"))
                ->paginate(5),
        ]);
    }
    public function create(){
        if ( ! session()->has("selectedRamo")) {
            session()->put("selectedRamo", null);
        }
        return Inertia::render('Directorio/Create',[
            "selectRamo"=> cat_ramos::select()->when(request('term'), function ( $query, $term) {
                $query->where('id','=',$term);
            })->get(),
            "selectUnidad" => cat_unidades::when(request('search'), function ( $query, $search) {
                $query->where('ramo_general','=',base64_decode ($search));
            })->get(),
            "selectTemaGeneral" => cat_temas::all(),
        ]);
    }

    public function store(){
        Directorio::create(
            $this->validate(request(),[
                "ramo_general"=>"required",
                "unidad"=>"required",
                "titulo_grado"=>"required",
                "nombre"=>"required|unique:directorios",
                "cargo"=>"required|min:10",
                "email"=>"required|unique:directorios",
                "direccion"=>"required|min:10|max:200",
                "tema_general"=>"required",
                "tema_especifico"=>"required",
                "phone_local"=>"required",
                "movile_phone"=>"required",
            ])
        );
        return redirect()->route('directorio.index')->with('success','¡Enlace Estrategico Creado!');
    }

    public function edit(Directorio $directorio){
        return Inertia::render('Directorio/Edit',[
            'directorio' => [
                'id' =>  $directorio->id,
                'ramo_general' => $directorio->ramo_general,
                'unidad' => $directorio->unidad,
                'titulo_grado' => $directorio->titulo_grado,
                'nombre' => $directorio->nombre,
                'cargo' => $directorio->cargo,
                'email' => $directorio->email,
                'direccion' => $directorio->direccion,
                'tema_general' => $directorio->tema_general,
                'tema_especifico' => $directorio->tema_especifico,
                'phone_local' => $directorio->phone_local,
                'movile_phone' => $directorio->movile_phone,
            ],
            "selectRamo"=> cat_ramos::select()->when(request('term'), function ( $query, $term) {
                $query->where('id','=',$term);
            })->get(),
            "selectUnidad" => cat_unidades::select()->when(request('search'), function ( $query, $search) {
                $query->where('ramo_general','=',base64_decode ($search));
            })->get(),
            "selectTemaGeneral" => cat_temas::all(),

        ]);

    }
    public function update(Directorio $directorio){
        $directorio->update(
            $this->validate(request(),[
                'name'=>'required|unique:projects,name,' . $directorio->id,
                'excerpt'=>'required|min:10|max:200',
                'content'=>'required|min:10|max:1000',
            ])
        );
        return redirect()->route('projects.index')->with('success', '¡Proyecto Actualizado!');
    }

}
