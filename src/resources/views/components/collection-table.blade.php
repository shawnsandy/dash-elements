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
        <td>{{ $action_label or "Actions" }}</td>
    </tr>
    </thead>
    <tbody>
    {{-- @slot(table_rows) --}}
    @if(isset($table_rows))
        {{ $$table_rows }}
    @else
        {{-- loop through the records using a subview--}}
        @foreach($records as $rows)
            <tr>
                @each( $view , $rows, "data")
                <td>{{ $slot }}</td>
            </tr>
        @endforeach
    @endif

    </tbody>
</table>
