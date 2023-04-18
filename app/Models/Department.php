<?php

namespace App\Models;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['department_name'];

    public function getTeamMembers()
    {
        return $this->hasMany(TeamMember::class, 'department_id', 'id');
    }
}