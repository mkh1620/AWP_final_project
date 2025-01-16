<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Include HasFactory

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Method to check if the user is an admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Method to check if the user is a project leader
    public function isProjectLeader()
    {
        return $this->role === 'project_leader';
    }
    public function academician()
    {
        return $this->hasOne(Academician::class, 'email', 'email');
    }
    
    

public function researchGrants()
{
    return $this->hasMany(ResearchGrant::class, 'project_leader_id');
}

}
