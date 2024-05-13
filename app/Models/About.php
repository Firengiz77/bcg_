<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;


class About extends Model
{
    use HasFactory,HasSEO,HasTranslations;

    protected $table = 'about';

    protected $fillable = [
    'image',
'title',
'desc',

    ];

    public $translatable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'title',
        'desc',

    ];

}
