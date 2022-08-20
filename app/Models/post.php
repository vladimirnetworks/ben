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
        'text',
        'tiny_text',
        'thumb',
        'tags',
        'id',
        'created_at',
        'updated_at'

    ];

    public static function create2($inp) {

        //$xx = domain::whereDomain(hname())->first();
        $inp["domain_id"] = domain_id();
        return post::create($inp);

    }


    public function getCaptionAttribute()
    {
        $ret = "";
        if (isset($this->tiny_text) && $this->tiny_text != null) {
            $ret  = $this->tiny_text;
        } else {

            $ret = mb_substr(trim(strip_tags($this->text)),0,70,'UTF-8')." ...";
          
        }

        return $ret;
    }

    protected $appends = ['caption'];



    public function domain()
    {
        return $this->belongsTo(domain::class);
    }


}
