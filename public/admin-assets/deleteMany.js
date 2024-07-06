/**
 * !!!REQUIREMENTS VARIABLES:
 *  - delete_many_route_path
 *  - csrf_token
 */

$('input[type="checkbox"].table-checkbox-ids,#select_all_ids').change(function () {
    const selected_count = $('input[type="checkbox"].table-checkbox-ids:checked').length;

    if (selected_count > 0) {
        $('#deleteAllSelectedRecord').html(`delete selected (${selected_count})`);
        $('#deleteAllSelectedRecordButton').html(`delete selected (${selected_count})`);
        $('#modalDeleteBody').html(`Are you sure you want to delete ${selected_count} selected record(s)?`);
    } else {
        $('#deleteAllSelectedRecord').html(`delete all`);
        $('#deleteAllSelectedRecordButton').html(`delete all`);
        $('#modalDeleteBody').html(`Are you sure you want to delete all records?`);
    }
});

$("#select_all_ids").click(function (){
    $('.table-checkbox-ids').prop('checked',$(this).prop('checked'));
});

$('#deleteAllSelectedRecord').click(function (e) {
    let all_ids = [];
    $('input[type="checkbox"].table-checkbox-ids:checked').each(function () {
        all_ids.push($(this).val());
    });
    $.ajax({
        url: delete_many_route_path,
        type: "DELETE",
        data: {
            ids: all_ids.length > 0 ? all_ids : '*' ,
            _token: delete_request_csrf_token
        },
        success: function (response) {
            location.reload();
        }
    });
});
