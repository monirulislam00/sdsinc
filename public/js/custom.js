$(document).ready(function () {
    if ($("table").length) {
        $("table").DataTable({
            responsive: true,
        });
    }
    $("table").addClass("border table-bordered ");

    /* ------------------------------ setup up ajax ----------------------------- */
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
