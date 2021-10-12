<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table="personal";
    protected $fillable=["id","prov_id","kotkab_id","nama","gender","goldar","hobby","alamat","keterangan","created_at","updated_at"];
    
    public function prov()
    {
        return $this->belongsTo(Prov::class,'prov_id','id');
    }

    public function kotkab()
    {
        return $this->belongsTo(Koka::class,'kotkab_id','id');
    }
}
