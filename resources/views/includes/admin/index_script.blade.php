<script>
    $(function () {

        var xsrfToken = $('meta[name="csrf-token"]').attr('content');

        var dataTable = $('.js-basic-example').DataTable({
            scrollX: true,
            serverSide: true,
            processing: true,
            searching: true,
            paging: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    width: 50, targets: 'w_50'
                },
                {
                    width: 100, targets: 'w_100'
                },
                {
                    width: 150, targets: 'w_150'
                },
                {
                    width: 200, targets: 'w_200'
                },
                {
                    width: 250, targets: 'w_250'
                },
                {
                    orderable: false, targets: 'no_orderable'
                },
                {
                    defaultContent: "<i>Not set</i>", targets: '_all'
                }
            ],
            ajax: {
                url: '{{$indexRecordsUrl}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': xsrfToken
                }
            },
            columns: [
                {
                    data: 'id',
                    defaultContent: "<i>Not set</i>",
                    render: function (data, type, row) {
                        return row.id;
                    }
                },
                {
                    render: function (data, type, row) {
                        return "<a target='_blank' href='{{$modelIndexUrl}}" + row.id + "'><button type='button' title='View Record' class='btn btn-circle  bg-light-green waves-effect waves-circle'><i class='material-icons'>featured_play_list</i></button></a>";
                    }
                },
                    @foreach($columns as $columnName=>$column)
                        @include('includes.admin.index_column_select')
                    @endforeach
                {
                    data: 'created_at'
                },
                {
                    data: 'updated_at'
                }
            ]
        });

        var exportButtons = new $.fn.dataTable.Buttons(dataTable, {
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: '.exportable'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: '.exportable'
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: '.exportable'
                    }
                }]
        }).container().appendTo($('#export_buttons'));


        exportButtons[0].classList.add('dt-buttons');



//        $('.dataTables_scrollBody').scrollLeft(350);



    });
</script>