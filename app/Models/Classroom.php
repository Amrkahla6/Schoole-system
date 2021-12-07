<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];


    /**
     * Undocumented function
     * Relationship between Grades & classes
     * One Grade Has Many classes
     * @return void
     */
    public function grade(){
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
