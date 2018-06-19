<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    public function setCoverAttribute($cover)
    {
        if (is_array($cover)) {
            $this->attributes['cover'] = json_encode($cover);
        }
    }

    public function getCoverAttribute($cover)
    {
        return json_decode($cover, true);
    }
}
