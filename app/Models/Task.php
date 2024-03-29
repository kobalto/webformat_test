<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'status',
        'deadline',
        'project_id'
    ];

    public function getId(): int
    {
        return $this->id;
    }
    

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function developers(): BelongsToMany 
    {
        return $this->belongsToMany(Employee::class);
    }

}
