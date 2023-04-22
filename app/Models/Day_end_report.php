<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day_end_report extends Model
{
    use HasFactory;
    protected $table = 'day_end_report';
    protected $primaryKey = 'id';

    protected $fillable = [
        "user_id",
        "project_id",
        "module_id",
        "completion_weightage",
        "team_member_comment",
        "team_lead_comment",
        "manager_comment",
        "approval_status",
    ];
}
?>