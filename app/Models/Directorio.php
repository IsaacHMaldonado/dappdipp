<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =['ramo_general','unidad', 'titulo_grado','nombre', 'cargo', 'email', 'direccion','tema_general', 'tema_especifico','phone_local','movile_phone'];


    protected static function boot()
    {
        parent::boot();
        self::creating(function ($table) {
            if ( ! app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $query, array $filters) {
        
        if (!request('page')) {
            session()->put('search', $filters['search'] ?? null);
        }

        $query->when(session('search'), function ($query, $search){
            $query->where('cat_ramos.ramo_general','LIKE','%'.$search.'%')
                    ->orWhere('cat_ramos.descripcion','LIKE','%'.$search.'%')
                    ->orWhere('cat_unidades.unidad','LIKE','%'.$search.'%')
                    ->orWhere('cat_unidades.descripcion','LIKE','%'.$search.'%')
                    ->orWhere('directorios.titulo_grado','LIKE','%'.$search.'%')
                    ->orWhere('directorios.nombre','LIKE','%'.$search.'%')
                    ->orWhere('directorios.cargo','LIKE','%'.$search.'%')
                    ->orWhere('directorios.email','LIKE','%'.$search.'%')
                    ->orWhere('cat_temas.desc_tema','LIKE','%'.$search.'%')
                    ->orWhere('directorios.phone_local','LIKE','%'.$search.'%')
                    ->orWhere('directorios.movile_phone','LIKE','%'.$search.'%');

        });
    }
}
