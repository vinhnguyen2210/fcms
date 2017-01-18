<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get all of the contacts that are assigned this tag.
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function contacts()
    {
        return $this->morphedByMany(Contact::class, 'taggable');
    }

    /**
     * Get all of the tasks that are assigned this tag.
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tasks()
    {
        return $this->morphedByMany(Task::class, 'taggable');
    }
}
