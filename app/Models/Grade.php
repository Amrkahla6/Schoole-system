<?php

namespace App\Models;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];

    public function classes(){
        return $this->hasMany(Classroom::class, 'grade_id');
    }

    protected $table = 'grades';
    public $timestamps = true;

}
