<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function alternativeCriteria()
    {
        return $this->hasMany(AlternativeCriteria::class);
    }

    public function criteria()
    {
        return $this->hasManyThrough(Criterion::class, AlternativeCriteria::class, 'alternative_id', 'id', 'id', 'criterion_id')->distinct();
    }

    public function subCriteria()
    {
        return $this->hasManyThrough(SubCriterion::class, AlternativeCriteria::class, 'alternative_id', 'id', 'id', 'sub_criterion_id')->distinct();
    }
}

