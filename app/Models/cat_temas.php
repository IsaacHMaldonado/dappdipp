<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_temas extends Model
{
    use HasFactory;
    protected $fillable =['id','desc_tema'];


    protected static function boot()
    {
        parent::boot();

        self::creating(function($table){
            if ( ! app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }
        });

    }




}
