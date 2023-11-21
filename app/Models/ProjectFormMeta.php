<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectFormMeta extends Model
{
    use HasFactory;
    protected $table = 'project_form_meta';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function projectform(): HasMany
    {
        return $this->hasMany(ProjectForm::class, 'form_meta_id');
    }
    public function sharedform(): HasMany
    {
        return $this->hasMany(Share::class, 'form_meta_id');
    }
}
