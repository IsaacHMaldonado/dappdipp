<?php

namespace App\Http\Controllers;

use App\Models\Directorio;
use Illuminate\Http\Request;
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
                ->paginate(10),
        ]);
    }
}
