<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'user_id',
        'category',
    ];
    public function user(){        //the classes which has to be connected(the id has to match with the other table )
        return $this->hasOne(User::class,'id','user_id');
    }


}
