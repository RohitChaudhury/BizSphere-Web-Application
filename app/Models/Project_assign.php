<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_assign extends Model
{
    use HasFactory;

    protected $table = "project_assigns";
    protected $primaryKey = "id";

    protected $fillable = [
        "project_id",
        "user_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
?>