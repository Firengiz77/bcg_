<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use App\Models\ProjectAttribute;

class Project extends Model
{
    use HasFactory, HasSEO, HasTranslations, HasTranslatableSlug;



    protected $table = 'project';

    protected $fillable = [
    'country',
'title',
'status',
'desc',
'slug',
'image',
'images',

    ];

    public $translatable = [

            'country',
'title',
'status',
'desc',
'slug',

    ];

       /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function attribute()
    {
        return $this->hasMany('App\Models\ProjectAttribute', 'project_id', 'id');
    }





    public function getProductAttribute(){
        return $this->hasMany(ProjectAttribute::class,'project_id','id');
    }



}
