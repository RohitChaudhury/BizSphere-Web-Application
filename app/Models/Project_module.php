<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_module extends Model
{
    use HasFactory;
    protected $table = 'project_modules';
    protected $primarykey = "id";
    protected $fillable = [

        'module_name',

        'module_weightage',
        'completion_percentage',

    ];
    //Creating a realtion Project with project_id


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}