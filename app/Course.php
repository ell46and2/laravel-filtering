<?php

namespace App;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	public $appends = [
		'started'
	];

	public $hidden = [
		'users'
	];

	public function subjects()
	{
		return $this->morphToMany(Subject::class, 'subjectable');
	}

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function getStartedAttribute()
	{
		if(!auth()->check()) {
			return false;
		}

		return $this->users->contains(auth()->user());
	}

    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
    	return (new CourseFilters($request))->add($filters)->filter($builder);
    }
}
