<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'assignable'];

    public function getId()
    {
        return $this->id;
    }

    public function developers(): HasMany
    {
        return $this->hasMany(DevEmployee::class);
    }

}
