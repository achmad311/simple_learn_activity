<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $cast = [
        'start_date' => 'date:d/m/Y',
        'end_date' => 'date:d/m/Y',
    ];

    protected $fillable = [
        'name',
        'method_id',
        'start_date',
        'end_date',
    ];

    public function method()
    {
        return $this->belongsTo(LearnActivityMethod::class, 'method_id');
    }

    protected function getStartDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    protected function getEndDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
}
