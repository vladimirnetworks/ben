<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catrelish extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'cat_id',
        'post_id'
    ];


}
