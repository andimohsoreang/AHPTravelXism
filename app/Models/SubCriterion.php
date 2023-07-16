<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriterion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'weight', 'criterion_id'];

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
