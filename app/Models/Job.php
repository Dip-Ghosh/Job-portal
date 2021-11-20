<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'job_types_id', 'thumbnail'];

    public function jobTypes()
    {
        return $this->hasOne(JobType::class,'job_types_id');
    }
}
