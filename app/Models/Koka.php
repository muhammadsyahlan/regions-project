<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koka extends Model
{
    use HasFactory;
    protected $table="kotkab";
    protected $fillable=["id","prov_id","nama_kotkab","desk_kk","created_at","updated_at"];

    public function prov() 
    { 
        return $this->belongsTo(Prov::class,'prov_id','id');   
    }
    public function person()
    {
        return $this->hasMany(Person::class);
    }
}
