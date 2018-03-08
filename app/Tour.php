<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Date;

class Tour extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function dates()
    {
        return $this->hasMany(Date::class);   
    }

    /* slug belirleme */
    public function setSlug($slug)
    {
        if (!empty($slug)) {
            $this->slug = str_slug($slug);
            return;
        }

        if (isset($this->name)) {
            $this->slug = str_slug($this->name);
        }
    }
    //
}
