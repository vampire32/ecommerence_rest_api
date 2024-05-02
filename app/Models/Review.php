<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table='reviews';
    protected $guarded=[];
    public function product(){
        return $this->hasMany(Product::class,$foreignKey='id');
}
public function users()
{
    return $this->hasOne(User::class,$foreignKey='id');

}

}


