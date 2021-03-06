<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Media Library
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Profile extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['user_id', 'name'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->sharpen(10);

        $this->addMediaConversion('full-size')
            ->greyscale()
            ->withResponsiveImages();
    }
}
