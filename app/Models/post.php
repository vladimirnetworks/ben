<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'url',
        'title',
        'text'
    ];

    public static function create2($inp) {

        //$xx = domain::whereDomain(hname())->first();
        $inp["domain_id"] = domain_id();
        return post::create($inp);

    }

}
