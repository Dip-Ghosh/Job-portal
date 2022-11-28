<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function company(): hasOne
    {
        return $this->hasOne(Company::class, 'organizations_id');
    }


}
