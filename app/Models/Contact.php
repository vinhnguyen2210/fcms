<?php

namespace App\Models;

use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use FilterPaginateOrder;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'contact_name',
        'email_address',
        'website',
        'job_title',
        'company',
        'description',
        'address',
        'mobile',
        'work_phone',
        'home_phone',
        'photo',
    ];

    /**
     * White-list of filter-able columns
     * @var array
     */
    protected $filter = [
        'id',
        'contact_name',
        'email_address',
        'job_title',
        'company',
        'created_at',
    ];

    /**
     * Initialize value of each fields
     * @return array
     */
    public static function initialize()
    {
        return [
            'contact_name' => '',
            'email_address' => '',
            'website' => '',
            'job_title' => '',
            'company' => '',
            'description' => '',
            'address' => '',
            'mobile' => '',
            'work_phone' => '',
            'home_phone' => '',
            'photo' => '',
        ];
    }

    /**
     * Relationship between contact and user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship between contact and task.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get all tags for the contact.
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
