<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Articles_tags extends Model
{
    protected $table = 'articles_tags';
    /**
     * HK
     * Чтобы не было шибки из-за отсутствия поля $timestamps
     */
    public $timestamps=false;

    protected $fillable = [
        'article_id',
        'tag_id',
    ];

    protected $visible = [
        'article_id',
        'tag_id',
    ];

    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }

    public function tags()
    {
        return $this->belongsTo(Tags::class);
    }
}
