@php

    $columns = collect(collect($data)->first())
        ->keys()
        ->map(function ($item) {
            return "<td class=\"{$item}\">" . ucwords(str_replace("_", " ", $item)) . "</td>";
        });

    $button = '<button class="data-btn btn btn-primary btn-xs" disabled="true">View / Edit</button>';
    $columns_data = collect(collect($data)->first())->keys()->map(function($items) {
        return ["data" => $items, "class" => $items ];
     })->push(["data" => null, "class" => 'action', 'defaultContent' => "$button"]);

@endphp

<table id="{{ $table_id or 'data-tables'}}" class="table">
    <thead>
    <tr>
        @foreach($columns as $td)
            {!! $td !!}
        @endforeach
        <td></td>
    </tr>
    </thead>
</table>

@push("styles")
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
@endpush

@push("scripts")
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>

    var table_data = <?= collect($data) ?>;
    var table_columns = <?= $columns_data ?>;
    var el = "{{ $table_id or "#data-tables"}}";
    var edit_url = "{{ $options["edit_url"] or 'null' }}";

    $(document).ready(function () {
        var table = $(el).DataTable({
            data: table_data,
            "columns": table_columns
        });
    });

</script>
@endpush


