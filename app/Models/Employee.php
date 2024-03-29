<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Task;
use App\Enums\Role;
use App\Enums\TaskStatus;
use Illuminate\Support\Collection;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'role',
        'team_id',
        'pm_id'
    ];

    public function getId(): int
    {
        return $this->id;
    }
    
    public function scopeSeo(Builder $builder): Builder
    {
        return $builder->where('role', Role::CEO);
    }

    public function scopePm(Builder $builder): Builder
    {
        return $builder->where('role', Role::PM);
    }

    public function scopeDev(Builder $builder): Builder
    {
        return $builder->where('role', Role::DEV);
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function getProcessingTasks(): Collection
    {
        return $this->tasks()->where('status', TaskStatus::IN_PROGRESS)->get();
    } 

    public function isCeo(): bool
    {
        return $this->role === Role::CEO->value;
    }

    public function isPm(): bool
    {
        return $this->role === Role::PM->value;
    }

    public function isDev(): bool
    {
        return $this->role === Role::DEV->value;
    }

}
