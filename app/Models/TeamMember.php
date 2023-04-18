<?php

namespace App\Models;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'name', 'email', 'phone', 'company', 'designation', 'image'];
    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
