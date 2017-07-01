@php $collections = collect($data) @endphp

@if(count($collections))
    @foreach($collections as $key => $value)
        <aside class="dashelements collections">
        <div class="h2">{{ $key }}</div>
        <p>
        {{ $value }}
        </p>
        </aside>
    @endforeach
 @endif

