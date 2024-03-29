<?php

namespace App\Models\Traits;

use Carbon\Carbon;

trait Common
{
    public function getName()
    {
        return $this->name;
    }

    public function scopeIsActive($query)
    {
        $query->where($this->getTable() . '.is_active', 'true');
    }

    public function getImagesFolderAttribute()
    {
        return $this->imagesFolder;
    }

    public function getImagesNameAttribute()
    {
        $format = '%s.%d.%s';

        return sprintf($format, $this->slug, $this->id, settings('shop', 'images_format'));
    }

//    public function getCreatedAtAttribute($date)
//    {
//        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i d.m.Y');
//    }
//
//    public function getUpdatedAtAttribute($date)
//    {
//        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i d.m.Y');
//    }
}
