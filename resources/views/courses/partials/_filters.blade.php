<p>
	<a href="{{ route('courses.index') }}">Clear all filters</a>
</p>

@include('courses.partials._filter-list', [
	'map' => [
		'free' => 'Free',
		'premium' => 'Premium'
	],
	'key' => 'access'
])

@include('courses.partials._filter-list', [
	'map' => [
		'beginner' => 'Beginner',
		'intermediate' => 'Intermediate',
		'advanced' => 'Advanced'
	],
	'key' => 'difficulty'
])

@include('courses.partials._filter-list', [
	'map' => [
		'snippet' => 'Snippet',
		'project' => 'Project',
		'theory' => 'Theory'
	],
	'key' => 'type'
])

@include('courses.partials._filter-list', [
	'map' => $subjects,
	'key' => 'subject'
])

@auth
	@include('courses.partials._filter-list', [
		'map' => [
			'true' => 'Started',
			'false' => 'Not started'
		],
		'key' => 'started'
	])
@endauth