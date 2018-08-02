<div class="edicioncard col {{ $item->status }}">
	<a href="{{ $item->link }}" style="background-image:url({{ $item->image }});">
		<h1>{{ $item->title }}</h1>
		<span class="month">{{ $item->month }}</span>
	</a>
</div>