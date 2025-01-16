<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchGrant extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'project_leader_id', 'amount', 'provider', 'start_date', 'duration_months'];

    // A single research grant has one leader
    public function leader()
{
    return $this->belongsTo(\App\Models\Academician::class, 'project_leader_id', 'staff_number');
}




public function milestones()
{
    return $this->hasMany(Milestone::class, 'research_grant_id');
}


    // A single research grant has many members
    public function members()
    {
        return $this->belongsToMany(Academician::class, 'project_members');
    }

    

}
