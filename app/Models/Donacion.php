<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    
    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public $timestamps =false;
    protected $fillable = ['nombre','proyecto_id','cantidad','fecha'];

}
