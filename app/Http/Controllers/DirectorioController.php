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
        if (session()->has("search")) {

            return Inertia::render("Directorio/Index", [
                "filters" => session()->only(["search"]),
                "directorio" => Directorio::with("user")
                    ->leftJoin('cat_ramos', 'directorios.ramo_general', '=', 'cat_ramos.id')
                    ->leftJoin('cat_unidades','directorios.unidad','=','cat_unidades.id')
                    ->leftJoin('cat_temas','directorios.tema_general','=','cat_temas.id')
                    ->select('directorios.id','cat_ramos.ramo_general AS ramo', 'cat_ramos.descripcion AS ramoDes', 'cat_unidades.unidad as cveUnidad', 'cat_unidades.descripcion AS unidadDes','directorios.titulo_grado','directorios.nombre','directorios.cargo','directorios.email','directorios.direccion' ,'cat_temas.desc_tema AS temaDes','directorios.tema_especifico','directorios.phone_local','directorios.movile_phone')
                    ->orderByDesc("directorios.id")
                    ->paginate(5),
            ]);

        }elseif (!session()->has("search")){

            session()->put("search", null);

            return Inertia::render("Directorio/Index", [
                "filters" => session()->only(["search"]),
                "directorio" => Directorio::with("user")
                    ->leftJoin('cat_ramos', 'directorios.ramo_general', '=', 'cat_ramos.id')
                    ->leftJoin('cat_unidades','directorios.unidad','=','cat_unidades.id')
                    ->leftJoin('cat_temas','directorios.tema_general','=','cat_temas.id')
                    ->select('directorios.id','cat_ramos.ramo_general AS ramo', 'cat_ramos.descripcion AS ramoDes', 'cat_unidades.unidad as cveUnidad', 'cat_unidades.descripcion AS unidadDes','directorios.titulo_grado','directorios.nombre','directorios.cargo','directorios.email','directorios.direccion' ,'cat_temas.desc_tema AS temaDes','directorios.tema_especifico','directorios.phone_local','directorios.movile_phone')
                    ->orderByDesc("directorios.id")
                    ->filter(request()->only("search"))
                    ->paginate(5),
            ]);
        }

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
                'id'=>'required|unique:directorios,id,' . $directorio->id.'',
                'ramo_general'=>'required',
                'unidad'=>'required',
                'titulo_grado'=>'required',
                'nombre'=>'required|unique:directorios,nombre,' . $directorio->id.'',
                'cargo'=>'required|min:10',
                'email'=>'required|unique:directorios,email,' . $directorio->id.'',
                'direccion'=>'required|min:10|max:200',
                'tema_general'=>'required',
                'tema_especifico'=>'required',
                'phone_local'=>'required',
                'movile_phone'=>'required',
            ])
        );
        return redirect()->route('directorio.index')->with('success', '¡Enlace Actualizado!');
    }

    public function destroy(Directorio $enlace){
        $enlace->delete();
        return redirect()->route('directorio.index')->with('success', '¡Enlace Eliminado!');
    }

}
