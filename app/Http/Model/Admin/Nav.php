<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //
    protected $guarded = [];

    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }
}
