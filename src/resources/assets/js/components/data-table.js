/**
 * Created by shawnsandy on 7/7/17.
 */

var table = $(el).DataTable({
    data: table_data,
    "columns": table_columns,
    responsive: true
});

$("td.action").addClass("text-right");

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
