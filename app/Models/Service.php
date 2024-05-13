<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasTranslatableSlug;

class Service extends Model
{
    use HasFactory,HasSEO,HasTranslations,HasTranslatableSlug;

    protected $table = 'service';

    protected $fillable = [
    'name',
'desc',
'image',
'category_id',
'slug',

    ];

    public $translatable = [

            'name',
'desc',
'slug',

    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    

}
