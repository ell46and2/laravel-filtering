<div class="list-group mb-4">
	@foreach($map as $value => $name)
		<a 
			href="{{ route('courses.index', array_merge(request()->query(), [$key => $value, 'page' => 1])) }}" 
			class="list-group-item{{ request($key) === $value ? ' active' : '' }}"
		>{{ $name }}</a>
	@endforeach

	@if(request($key))
		<a href="{{ route('courses.index', array_except(request()->query(), [$key, 'page'])) }}" class="list-group-item list-group-item-info">&times; Clear this filter</a>
	@endif	
</div>