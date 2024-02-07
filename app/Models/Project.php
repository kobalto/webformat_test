<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
