<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'organizations_id', 'industries_id', 'address', 'mobile', 'email', 'business_info', 'logo',
        'web_url', 'status',
    ];

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
        return $this->belongsTo(Organization::class);
    }

    public function industry(): belongsTo
    {
        return $this->belongsTo(Organization::class);
    }


}
