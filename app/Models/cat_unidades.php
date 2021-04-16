<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class cat_unidades extends Model
{
    use HasFactory;

    protected $fillable =['ramo_general','unidad','Descripcion'];

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
            session()->put('ramo', $filters['ramo'] ?? null);
        }
        $query->when(session('ramo'), function ($query, $ramo){
            $query->where('ramo_general','=',$ramo);
        });
    }

}
