$(function () {
    ('use strict');
  
    var dtUserTable = $('.user-list-table'),
      select = $('.select2');
  
    select.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%',
        dropdownParent: $this.parent()
      });
    });
  
    // Users List datatable
    if (dtUserTable.length) {
      dtUserTable.DataTable({
        columnDefs: [
          {
            className: 'dtr-control',
            orderable: false,
            targets: 0
          }
        ],
        order: [[1, 'desc']],
        dom:
          '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
          '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
          '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
          '>t' +
          '<"d-flex justify-content-between mx-2 row mb-1"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        language: {
          sLengthMenu: 'Show _MENU_',
          search: 'Search',
          searchPlaceholder: 'Search..'
        },
        // Buttons with Dropdown
        buttons: [
          {
            extend: 'collection',
            className: 'btn btn-outline-secondary dropdown-toggle me-2',
            text: feather.icons['external-link'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
            buttons: [
              {
                extend: 'print',
                text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2, 3, 4, 5] }
              },
              {
                extend: 'csv',
                text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2, 3, 4, 5] }
              },
              {
                extend: 'excel',
                text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2, 3, 4, 5] }
              },
              {
                extend: 'pdf',
                text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2, 3, 4, 5] }
              },
              {
                extend: 'copy',
                text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2, 3, 4, 5] }
              }
            ],
            init: function (api, node, config) {
              $(node).removeClass('btn-secondary');
              $(node).parent().removeClass('btn-group');
              setTimeout(function () {
                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
              }, 50);
            }
          },
        ],
        // For responsive popup
        responsive: {
          details: {
            type: 'column',
            display: $.fn.dataTable.Responsive.display.modal({
              // header: function (row) {
              //   var data = row.data();
              //   return 'Details of ' + data['full_name'];
              // }
            }),
            renderer: function (api, rowIdx, columns) {
              var data = $.map(columns, function (col, i) {
                return col.columnIndex !== 8 // ? Do not show row in modal popup if title is blank (for check box)
                  ? '<tr data-dt-row="' +
                  col.rowIdx +
                  '" data-dt-column="' +
                  col.columnIndex +
                  '">' +
                  '<td>' +
                  col.title +
                  ':' +
                  '</td> ' +
                  '<td>' +
                  col.data +
                  '</td>' +
                  '</tr>'
                  : '';
              }).join('');
              return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
            }
          }
        },
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        },
        initComplete: function () {
          // Adding role filter once table initialized
          this.api()
            .columns(1)
            .every(function () {
              var column = this;
              var label = $('<label class="form-label" for="tgl_lelang">Tanggal</label>').appendTo('.tgl_lelang');
              var select = $(
                `<select id="tgl_lelang" class="form-select text-capitalize mb-md-0 mb-2">
                  <option value=""> Pilih Tanggal </option>
                </select>`
              )
                .appendTo('.tgl_lelang')
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  var search = val.replace(/\\/g, '');
                  column.search(search, true, false).draw();
                });
  
              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  var el = $(d);
                  select.append('<option value="' + el.text() + '" class="text-capitalize">' + el.text() + '</option>');
                });
  
              select.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                  dropdownAutoWidth: true,
                  width: '100%',
                  dropdownParent: $this.parent()
                });
              });
            });
          // Adding role filter once table initialized
          this.api()
            .columns(4)
            .every(function () {
              var column = this;
              var label = $('<label class="form-label" for="pemenang">Berdasarkan Pemenang</label>').appendTo('.pemenang');
              var select = $(
                `<select id="pemenang" class="form-select text-capitalize mb-md-0 mb-2">
                  <option value=""> Pilih </option>
                  <option value="Belum Ada Pemenang"> Belum Ada Pemenang </option>
                  <option value="Dengan Pemenang"> Dengan Pemenang </option>
                </select>`
              )
                .appendTo('.pemenang')
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  var search = '';
                  if (val == 'Belum Ada Pemenang') {
                    search = val;
                  } else if (val == 'Dengan Pemenang') {
                    search = '^(?!Belum Ada Pemenang).*$';
                  } else {
                    search = ''
                  }
                  column.search(search, true, false).draw();
                });
  
              select.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                  dropdownAutoWidth: true,
                  width: '100%',
                  dropdownParent: $this.parent()
                });
              });
            });
          // Adding plan filter once table initialized
          this.api()
            .columns(6)
            .every(function () {
              var column = this;
              var label = $('<label class="form-label" for="LelangStatus">Status</label>').appendTo('.lelang_status');
              var select = $(
                '<select id="LelangStatus" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Pilih Status </option></select>'
              )
                .appendTo('.lelang_status')
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());
                  column.search(val ? val : '', true, false).draw();
                });
  
              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  var el = $(d);
                  select.append('<option value="' + el.text() + '" class="text-capitalize">' + el.text() + '</option>');
                });
  
              select.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                  dropdownAutoWidth: true,
                  width: '100%',
                  dropdownParent: $this.parent()
                });
              });
            });
        }
      });
    }
  
  });