@php

    $columns = collect(collect($data)->first())
        ->keys()
        ->map(function ($item) {
            return "<td class=\"{$item}\">" . ucwords(str_replace("_", " ", $item)) . "</td>";
        });

    $button = '<button class="data-btn btn btn-primary btn-xs" disabled="true" style="display: none;">View / Edit</button>';
    $columns_data = collect(collect($data)->first())->keys()->map(function($items) {
        return ["data" => $items, "class" => $items];
     })->push(["data" => null, "class" => 'action', 'defaultContent' => "$button"]);

    if(!isset($action_url))
   $action_url = url()->current()."/";

@endphp

<table id="{{ $table_id or 'data-tables'}}" class="table">
    <thead>
    <tr>
        @foreach($columns as $td)
            {!! $td !!}
        @endforeach
        <td style="max-width: 150px;" class="text-right">
            <button class="btn btn-default btn-xs"> Actions</button>
        </td>
    </tr>
    </thead>
</table>

@push("styles")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/b-1.3.1/r-2.1.1/datatables.min.css"/>
@endpush

@push("scripts")
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/b-1.3.1/r-2.1.1/datatables.min.js"></script>
<script>

    var table_data = <?= collect($data) ?>;
    var table_columns = <?= $columns_data ?>;
    var el = "{{ $table_id or "#data-tables"}}";
    var edit_url = "{{ $action_url }}";

</script>

<script src="/assets/dashelements/js/components/data-table.js"></script>
@endpush


