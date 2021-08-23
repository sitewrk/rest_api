<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Articles;

class Tags extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'tag',
    ];

    protected $visible = [
        'tag',
    ];

    public function articles_tags()
    {
        return $this->hasMany(Articles_tags::class);
    }
}
