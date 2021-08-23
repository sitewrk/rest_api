<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'name',
        'message',
        'tags',
    ];

    protected $visible = [
        'id',
        'name',
        'message',
        'tags',
    ];


  /**
     * HK
     * можно было сделать связь многие-ко-многим...

     public function tags() {
        return $this->belongsToMany(Tags::class, 'articles_tags');
    }*/

    public function articles_tags()
    {
        return $this->hasMany(Articles_tags::class);
    }
}
