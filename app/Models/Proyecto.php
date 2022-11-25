<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function donacions(){
        return $this->hasMany(Donacion::class);
    }
    
    public $timestamps =false;
    protected $fillable = ['user_id','titulo','categoria','descripcion','portada','abstracto','fecha'];

}
