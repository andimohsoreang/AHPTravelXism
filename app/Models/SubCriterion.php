<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriterion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'criterion_id'];

    public function subCriterion()
    {
        return $this->belongsTo(SubCriterion::class);
    }

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
