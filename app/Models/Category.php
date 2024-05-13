<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasTranslatableSlug;



class Category extends Model
{
    use HasFactory,HasSEO,HasTranslations,HasTranslatableSlug;

    protected $table = 'category';

    protected $fillable = [
    'name',
'slug',

    ];

    public $translatable = [

            'name',
'slug',

    ];


        
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }




}
