<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'svg', 'level', 'home', 'order'])]
class Skill extends Model
{
    public const LEVELS = [
        'Très bonne maîtrise',
        'Bonne maîtrise',
        'Intermédiaire',
        'Débutant',
    ];

    protected function casts(): array
    {
        return [
            'home' => 'boolean',
            'order' => 'integer',
        ];
    }
}
