<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];

    protected $table = 'grades';
    public $timestamps = true;

}
