<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Employee;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'assignable'];

    public function getId(): int
    {
        return $this->id;
    }

    public function developers(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

}
