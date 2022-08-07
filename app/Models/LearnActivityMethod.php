<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnActivityMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    public function learnActivities()
    {
        return $this->hasMany(LearnActivity::class, 'method_id');
    }

}
