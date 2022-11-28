<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['organization_type', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrders($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function industry(): hasMany
    {
        return $this->hasMany(Industry::class, ['id' => 'organizations_id']);
    }

    public function company(): HasMany
    {
        return $this->HasMany(Company::class, ['id' => 'organizations_id']);
    }


}
