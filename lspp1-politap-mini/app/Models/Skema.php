<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_skema',
        'skema',
        'prodi_id',
        'asesor_id',
        'tuk_id',
        'status_id'
    ];



    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }

    public function asesor(){
        return $this->belongsTo(Asesor::class);
    }


    public function tuk(){
        return $this->belongsTo(Tuk::class);
    }


    public function status(){
        return $this->belongsTo(Status::class);
    }


    public function unikoms(){
        return $this->hasMany(Unikom::class);
    }


    public function asesmens()
    {
        return $this->hasManyThrough(
            Asesmen::class,
            Unikom::class,
            'skema_id',
            'unikom_id'
        );
    }
}
