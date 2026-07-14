<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['slug', 'name', 'icon', 'logo_url', 'type', 'year', 'featured', 'summary', 'description', 'stack', 'color_palette', 'images', 'link', 'github_link', 'order'])]
class Project extends Model
{
    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'featured' => 'boolean',
            'stack' => 'array',
            'color_palette' => 'array',
            'images' => 'array',
            'order' => 'integer',
        ];
    }
}
