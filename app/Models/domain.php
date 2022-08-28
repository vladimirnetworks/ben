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
        'id',
        'tags'

    ];


  #  public $incrementing = false;





    public function getCatsDecodedAttribute()
    {
        $cats = [];

        if (isset($this->cats) && $this->cats != null) {

            $cats = json_decode($this->cats, true);
        }
        if ($cats === null && json_last_error() !== JSON_ERROR_NONE) {
            $cats = [];
        }

        \Config::set('domain.cats', $cats);
        return $cats;
    }

    public function getPostsAttribute()
    {
        return post::whereDomainId($this->id);
    }

    public function Posts()
    {
        return post::whereDomainId(domain_id());
    }

    public function Search($query)
    {

      
        return $this->posts->whereRaw(" MATCH(`title`,`tiny_text`,`text`,`tags`) AGAINST (? IN BOOLEAN MODE) ", $query);
    }


    public function catss()
    {
        return $this->hasMany('App\Models\cat');
    }

    public function postss()
    {
        return $this->hasMany('App\Models\post');
    }
    

    protected $appends = ['cats_decoded', 'posts'];
}
