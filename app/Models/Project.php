<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $primarykey = "id";
    protected $fillable = [

        'project_name',
        'project_manager_id',
        'estimated_end_date',
        'status'
    ];
    public function project_module()
    {
        return $this->hasmany(Project_module::class, 'project_id');
    }
    public function project_manager()
    {
        return $this->belongsto(User::class);
    }

    public function project_assign()
    {
        return $this->hasone(Project_assign::class, 'project_id');
    }



}