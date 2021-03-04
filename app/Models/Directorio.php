<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorio extends Model
{
    use HasFactory;

    protected $fillable =['ramo_general','unidad', 'titulo_grado',
                        'nombre', 'cargo', 'id_tema', 'phone_local',
                        'phone_ext', 'movile_phone'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($table){
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
            $query->where('ramo_general','LIKE','%'.$search.'%')
                  ->where('unidad','LIKE','%'.$search.'%')
                  ->where('titulo_grado','LIKE','%'.$search.'%')
                  ->where('nombre','LIKE','%'.$search.'%')
                  ->where('cargo','LIKE','%'.$search.'%')
                  ->where('id_tema','LIKE','%'.$search.'%')
                  ->where('phone_local','LIKE','%'.$search.'%')
                  ->where('phone_ext','LIKE','%'.$search.'%')
                  ->where('movile_phone','LIKE','%'.$search.'%');
        });
    }
}
