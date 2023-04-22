<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'phone',
        'password',
        'status',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function members()
    {
        return $this->hasone(Reporting_manager::class, 'user_id');
    }
    public function reporting_manager()
    {
        return $this->hasmany(Reporting_manager::class, 'reporting_user_id');

    }

    public function projects()
    {
        return $this->hasmany(Project::class, 'project_manager_id');
    }

    public function project_assign()
    {
        return $this->hasmany(Project_assign::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}