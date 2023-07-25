<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeCriteria extends Model
{
    use HasFactory;

    protected $table = 'alternative_criteria';

    protected $fillable = [
        'alternative_id',
        'criterion_id',
        'sub_criterion_id',
        'value',
    ];

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }

    public function subCriterion()
    {
        return $this->belongsTo(SubCriterion::class);
    }
}

