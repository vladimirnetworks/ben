<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domain extends Model
{
    use HasFactory;


    protected $fillable = [
        'domain',
        'title',
        'cats',

    ];


    public function getCatsDecodedAttribute()
    {

       
     return json_decode($this->cats,true);
    }

    protected $appends = ['cats_decoded'];


}
