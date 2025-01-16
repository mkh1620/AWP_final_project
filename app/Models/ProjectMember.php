<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectMember extends Pivot
{
    protected $fillable = ['academician_id', 'research_grant_id'];
}
