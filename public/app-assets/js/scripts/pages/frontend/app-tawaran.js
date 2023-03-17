$(function () {
    ("use strict");

    var dtUserTable = $(".user-list-table"),
        select = $(".select2");

    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: "100%",
            dropdownParent: $this.parent(),
        });
    });

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                ">t" +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                ">",
            language: {
                sLengthMenu: "Show _MENU_",
                search: "Search",
                searchPlaceholder: "Search..",
            },
            // Buttons with Dropdown
            buttons: [
                {
                    extend: "collection",
                    className: "btn btn-outline-secondary dropdown-toggle me-2",
                    text:
                        feather.icons["external-link"].toSvg({
                            class: "font-small-4 me-50",
                        }) + "Export",
                    buttons: [
                        {
                            extend: "print",
                            text:
                                feather.icons["printer"].toSvg({
                                    class: "font-small-4 me-50",
                                }) + "Print",
                            className: "dropdown-item",
                            exportOptions: { columns: [1, 2] },
                        },
                        {
                            extend: "csv",
                            text:
                                feather.icons["file-text"].toSvg({
                                    class: "font-small-4 me-50",
                                }) + "Csv",
                            className: "dropdown-item",
                            exportOptions: { columns: [1, 2] },
                        },
                        {
                            extend: "excel",
                            text:
                                feather.icons["file"].toSvg({
                                    class: "font-small-4 me-50",
                                }) + "Excel",
                            className: "dropdown-item",
                            exportOptions: { columns: [1, 2] },
                        },
                        {
                            extend: "pdf",
                            text:
                                feather.icons["clipboard"].toSvg({
                                    class: "font-small-4 me-50",
                                }) + "Pdf",
                            className: "dropdown-item",
                            exportOptions: { columns: [1, 2] },
                        },
                        {
                            extend: "copy",
                            text:
                                feather.icons["copy"].toSvg({
                                    class: "font-small-4 me-50",
                                }) + "Copy",
                            className: "dropdown-item",
                            exportOptions: { columns: [1, 2] },
                        },
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass("btn-secondary");
                        $(node).parent().removeClass("btn-group");
                        setTimeout(function () {
                            $(node)
                                .closest(".dt-buttons")
                                .removeClass("btn-group")
                                .addClass("d-inline-flex mt-50");
                        }, 50);
                    },
                },
                // {
                //     text: 'Tambahkan Penawaran',
                //     className: 'add-new btn btn-primary',
                //     attr: {
                //       'data-bs-toggle': 'modal',
                //       'data-bs-target': '#modal-tawaran'
                //     },
                //     init: function (api, node, config) {
                //       $(node).removeClass('btn-secondary');
                //     }
                // },
            ],
            // For responsive popup
            responsive: {
                // details: {
                //     display: $.fn.dataTable.Responsive.display.modal({
                //         header: function (row) {
                //             var data = row.data();
                //             return "Details of " + data["full_name"];
                //         },
                //     }),
                //     type: "column",
                //     renderer: function (api, rowIdx, columns) {
                //         var data = $.map(columns, function (col, i) {
                //             return col.columnIndex !== 6 // ? Do not show row in modal popup if title is blank (for check box)
                //                 ? '<tr data-dt-row="' +
                //                       col.rowIdx +
                //                       '" data-dt-column="' +
                //                       col.columnIndex +
                //                       '">' +
                //                       "<td>" +
                //                       col.title +
                //                       ":" +
                //                       "</td> " +
                //                       "<td>" +
                //                       col.data +
                //                       "</td>" +
                //                       "</tr>"
                //                 : "";
                //         }).join("");
                //         return data
                //             ? $('<table class="table"/>').append(
                //                   "<tbody>" + data + "</tbody>"
                //               )
                //             : false;
                //     },
                // },
            },
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: "&nbsp;",
                    next: "&nbsp;",
                },
            },
        });
    }
});
