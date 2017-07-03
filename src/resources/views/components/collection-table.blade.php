@php

    $columns = collect(collect($data)->first())
        ->keys()
        ->map(function ($item) {
            return "<td class=\"{$item}\">" . ucwords(str_replace("_", " ", $item)) . "</td>";
        });

    $records = collect($data)->toArray();

    $view = isset($component) ? $component : "dashelements::components.partials.table-row";

@endphp

<table class="table">
    <thead>
    <tr>
        @foreach($columns as $td)
            {!! $td !!}
        @endforeach
        <td>{{ $action or "Actions" }}</td>
    </tr>
    </thead>
    <tbody>

    @foreach($records as $rows)
        <tr>
            @each( $view , $rows, "data")
            <td>{{ $slot }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
