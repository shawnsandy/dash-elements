@php

    $columns = collect(collect($data)->first())
        ->keys()
        ->map(function ($item) {
            return "<td class=\"{$item}\">" . ucwords(str_replace("_", " ", $item)) . "</td>";
        });

    $button = '<button class="data-btn btn btn-primary btn-xs" disabled="true" style="display: none;">View / Edit</button>';
    $columns_data = collect(collect($data)->first())->keys()->map(function($items) {
        return ["data" => $items, "class" => $items ];
     })->push(["data" => null, "class" => 'action', 'defaultContent' => "$button"]);

@endphp

<table id="{{ $table_id or 'data-tables'}}" class="table" >
    <thead>
    <tr>
        @foreach($columns as $td)
            {!! $td !!}
        @endforeach
        <td><button class="btn btn-default btn-xs"> Actions </button></td>
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
    var edit_url = "{{ $action_url or "#" }}";


        var table = $(el).DataTable({
            data: table_data,
            "columns": table_columns
        });
        $(el + ' tbody').on('click', 'tr', function () {

            data_btn = $(this).find(".data-btn");
            $(".data-btn").prop("disabled", true).hide();

            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                data_btn.show();
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                data_btn.prop("disabled", false).show();
                var data = table.rows(".selected").data();
                row_id = data[0]['id'];
            }
            $(data_btn).click(function () {
                $(data_btn).show();
                if (edit_url == null) {
                    console.log("No edit url for row " + row_id)
                } else {
                    console.log(edit_url + row_id);
                    window.location.href = edit_url + row_id + "/edit";
                }
            });
        });

</script>
@endpush


