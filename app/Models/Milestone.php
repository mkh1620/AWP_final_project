<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'target_date', 'status', 'deliverable', 'research_grant_id'];

    // A single milestone belongs to one research grant
    public function grant()
{
    return $this->belongsTo(\App\Models\ResearchGrant::class, 'research_grant_id');
}

}
