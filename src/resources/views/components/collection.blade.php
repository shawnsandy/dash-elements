@php $collections = collect($data) @endphp

@if(count($collections))
    @foreach($collections as $key => $value)
        <aside class="dashelements collections">
        <p class="lead">{{ $key }}</p>
        <p>
        {{ $value }}
        </p>
        </aside>
    @endforeach
 @endif

