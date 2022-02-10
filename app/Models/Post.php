<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;

class Post extends Model
{
    use HasFactory, Searchable;

    #[SearchUsingFullText(['body'])]
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }

    protected $appends = ['path'];

//    laravel 8
//    public function getPathAttribute()
//    {
//        return route('post.show', $this);
//    }

    public function path(): Attribute
    {
//        return Attribute::get(fn() => route('post.show', $this));
        return new Attribute(fn() => route('post.show', $this));
    }


    //    laravel 8 get and set
    public function getTitleAttribute()
    {
        return ucwords($this->title);
    }

    public function setTitleAttribute()
    {
        return strtolower($this->title);
    }

    //    laravel 9 get and set
    public function title(): Attribute
    {
        return new Attribute(
            fn($value) =>  ucwords($value),
            fn($value) =>  strtolower($value)
    );
    }
}
