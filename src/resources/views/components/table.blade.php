<?php

$columns = collect(collect($data)->first())
    ->keys()
    ->map(function ($item) {
    return "<td class=\"{$item}\">" . ucwords(str_replace("_", " ", $item)) . "</td>";
});

$records = collect($data)->toArray();

?>

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
    @foreach($records as $row)
        <tr>
            @each("dashelements::components.partials.table-row", $row, "data")
        <td>{{ $slot }}</td>
        </tr>
    @endforeach

    </tbody>
</table>

