<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'staff_number', 'email', 'college', 'department', 'position', 'role'];

    // A single academician can lead multiple research grants
    public function leadingProjects()
    {
        return $this->hasMany(ResearchGrant::class, 'project_leader_id');
    }

    // A single academician can be a member of many research grants
    public function memberProjects()
    {
        return $this->belongsToMany(ResearchGrant::class, 'project_members');
    }
    public function user()
{
    return $this->hasOne(User::class, 'staff_id', 'staff_number');
}

}
