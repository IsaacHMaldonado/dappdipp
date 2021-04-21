<?php

namespace App\Http\Controllers;

use App\Models\cat_ramos;
use App\Models\Directorio;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
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
        return Inertia::render('Directorio/Create',[
            "selectRamo"=> cat_ramos::all(),
            "mechanics"=> cat_ramos::select()->when(request('term'), function ( $query, $term) {
                $query->where('descripcion','like',"%$term%");
            })->get(),
        ]);
    }
    public function store(){
        Directorio::create(
            $this->validate(request(),[
                "name"=>"required|unique:projects",
                "excerpt"=>"required|min:10|max:200",
                "content"=>"required|min:10|max:1000",
            ])
        );
        return redirect()->route('directorio.index')->with('success','¡Proyecto Creado!');
    }
}
