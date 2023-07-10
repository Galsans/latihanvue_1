<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class murid extends Model
{
    use HasFactory;
    protected $fillable =  [
        'nama', 'grade_id'
    ];

    /**
     * Get the grade that owns the murid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(grade::class);
    }
}
