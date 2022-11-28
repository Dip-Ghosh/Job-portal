<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = ['organizations_id', 'industry_type', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrders($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function organization(): belongsTo
    {
        return $this->belongsTo(Organization::class, 'organizations_id', 'id');
    }

    public function company(): hasOne
    {
        return $this->hasOne(Company::class, 'industries_id');
    }
}
