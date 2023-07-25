<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define a method to get the dynamically added criteria fields
    public function getCriteriaFields()
    {
        $criteriaFields = [];
        $criteriaList = Criterion::all(); // Assuming Criterion is the model for storing criteria

        foreach ($criteriaList as $criterion) {
            $criteriaFields[] = 'criteria_id_' . $criterion->id;
        }

        return $criteriaFields;
    }
    public function subCriterion()
    {
        return $this->belongsTo(SubCriterion::class, 'sub_criterion_id');
    }
    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}

