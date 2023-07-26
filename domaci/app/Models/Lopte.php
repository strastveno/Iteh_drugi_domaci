<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lopte extends Model
{
    use HasFactory;

    protected $fillable=['name','price','description','type_id', 'user_id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
