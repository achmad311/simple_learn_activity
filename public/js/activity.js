"use strict";

// Class definition
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var Activity = (function () {
    var HOST_URL = window.location.origin;
    var datePicker = function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            minDate: new Date("2022-01-01"),
            maxDate: new Date("2022-06-30"),
        });
    };

    var tablelActivity = function () {
        $("#learn_activities_table").DataTable({
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            ordering: false,
            info: false,
            ajax: {
                url: HOST_URL + "/learn-activity/get-data",
                type: "GET",
            },
            columns: [
                {
                    data: "method_name",
                    name: "method_name",
                    className: "fw-bold",
                },
                {
                    data: "january",
                    name: "january",
                },
                {
                    data: "february",
                    name: "february",
                },
                {
                    data: "march",
                    name: "march",
                },
                {
                    data: "april",
                    name: "april",
                },
                {
                    data: "may",
                    name: "may",
                },
                {
                    data: "june",
                    name: "june",
                },
            ],
        });
    };

    var addActivity = function () {
        var form = $("#add_activity_form");
        var submitBtn = $("#create_activity_submit");

        submitBtn.on("click", function (e) {
            e.preventDefault();
            // var data = new FormData();

            // $.each(form.serializeArray(), function (i, field) {
            //     data.append(field.name, field.value);
            // });

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: form.serializeArray(),
            })
                .done(function (data) {
                    alert(data.message);
                    $("#add_activity_modal").modal("hide");
                    $("#add_activity_form")[0].reset();
                    $("#learn_activities_table").DataTable().ajax.reload();
                })
                .fail(function (data) {
                    var error = JSON.parse(data.responseText);
                    alert(error.message);
                });
        });
    };

    var editActivity = function () {
        var btnEdit = $("#edit_activity_btn");
        var btnSubmit = $("#edit_activity_submit");
        var form = $("#edit_activity_form");
        var table = $("#learn_activities_table");

        table.on("click", "td a#edit_activity_btn", function (e) {
            var a = $(this).closest("a");
            var id = a.attr("activity_id");
            console.log(id);
            $.ajax({
                url: HOST_URL + "/learn-activity/" + id + "/edit",
                type: "GET",
            })
                .done(function (data) {
                    console.log(data);
                    $("#edit_activity_name").val(data.name);
                    $("#edit_activity_id").val(data.id);
                    $("#edit_activity_method").val(data.method_id);
                    $("#edit_start_date").val(
                        data.start_date.split("/").reverse().join("-")
                    );
                    $("#edit_end_date").val(
                        data.end_date.split("/").reverse().join("-")
                    );

                    $("#edit_activity_modal").modal("show");
                })
                .fail(function (data) {
                    alert("Opps! Something went wrong.");
                });
        });

        // btnEdit.on("click", function (e) {
        //     e.preventDefault();
        //     var id = $(this).attr("activity_id");
        //     console.log(id);
        //     $.ajax({
        //         url: HOST_URL + "/learn-activity/" + id + "/edit",
        //         type: "GET",
        //     })
        //         .done(function (data) {
        //             console.log(data);
        //             $("#edit_activity_name").val(data.name);
        //             $("#edit_activity_id").val(data.id);
        //             $("#edit_activity_method").val(data.method_id);
        //             $("#edit_start_date").val(
        //                 data.start_date.split("/").reverse().join("-")
        //             );
        //             $("#edit_end_date").val(
        //                 data.end_date.split("/").reverse().join("-")
        //             );

        //             $("#edit_activity_modal").modal("show");
        //         })
        //         .fail(function (data) {
        //             alert("Opps! Something went wrong.");
        //         });
        // });

        btnSubmit.on("click", function (e) {
            e.preventDefault();
            var id = $("#edit_activity_id").val();
            $.ajax({
                url: HOST_URL + "/learn-activity/" + id,
                type: "PUT",
                data: form.serializeArray(),
            })
                .done(function (data) {
                    alert(data.message);
                    $("#edit_activity_modal").modal("hide");
                    $("#edit_activity_form")[0].reset();
                    $("#learn_activities_table").DataTable().ajax.reload();
                })
                .fail(function (data) {
                    var error = JSON.parse(data.responseText);
                    alert(error.message);
                })
                .always(function () {
                    $("#edit_activity_modal").modal("hide");
                });
        });
    };

    var deleteActivity = function () {
        var btnDelete = $("#delete_activity_btn");
        var submitBtn = $("#delete_activity_submit");
        var form = $("#delete_activity_form");
        var table = $("#learn_activities_table");

        table.on("click", "td a#delete_activity_btn", function (e) {
            var a = $(this).closest("a");
            var id = a.attr("activity_id");
            console.log(id);
            $("#delete_activity_id").val(id);
        });

        // btnDelete.on("click", function (e) {
        //     e.preventDefault();
        //     var id = $(this).attr("activity_id");
        //     $("#delete_activity_id").val(id);
        // });

        submitBtn.on("click", function (e) {
            e.preventDefault();
            var id = $("#delete_activity_id").val();

            $.ajax({
                url: HOST_URL + "/learn-activity/" + id,
                type: "DELETE",
            })
                .done(function (data) {
                    alert(data.message);
                    $("#delete_activity_modal").modal("hide");
                    $("#delete_activity_form")[0].reset();
                    $("#learn_activities_table").DataTable().ajax.reload();
                })
                .fail(function (data) {
                    var error = JSON.parse(data.responseText);
                    alert(error.message);
                })
                .always(function () {
                    $("#delete_activity_modal").modal("hide");
                });
        });
    };

    return {
        init: function () {
            tablelActivity();
            datePicker();
            addActivity();
            editActivity();
            deleteActivity();
        },
    };
})();

jQuery(document).ready(function () {
    Activity.init();
});
