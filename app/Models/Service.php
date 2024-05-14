<?php

namespace App\Models;


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


    public function attribute()
    {
        return $this->hasMany('App\Models\ServiceAttribute', 'service_id', 'id');
    }


    public function getProductAttribute(){
        return $this->hasMany(ServiceAttribute::class,'service_id','id');
    }
}
