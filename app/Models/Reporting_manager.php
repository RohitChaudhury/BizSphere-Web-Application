<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporting_manager extends Model
{
    use HasFactory;
    protected $table = 'reporting_managers';
    protected $primaryKey = 'id';


    public function user()
    {
        $this->belongsTo(User::class);
    }


}