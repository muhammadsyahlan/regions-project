<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobb extends Model
{
    use HasFactory;

    protected $table="hobby";
    protected $fillable=["id","hobby_desk","created_at","updated_at"];

    public function person()
    {
        return $this->hasMany(Person::class);
    }
}
