<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    function changeStatus(_this, id, modal) {
        var status = $(_this).prop('checked') == true ? 1 : 0;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: `{{ route('change-status') }}`,
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                id: id,
                status: status,
                modal: modal
            },
            success: function(result) {
                Swal.fire({
                    toast: true,
                    type: 'success',
                    position: "top",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    title: "<span style='color:white'> Status Change Successfully!!!</span>",
                    text: "",
                    icon: 'success',
                    heightAuto: true,
                    background: "green",
                    iconColor: "white",
                });
                $("#dataTableBuilder").DataTable().ajax.reload(null, false);
            }
        });
    }

    function dataDelete(event, id, route) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: route,
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#dataTableBuilder').DataTable().ajax.reload();
                        if (response != 0) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    }
                });
            }
        });
    }

    $(function() {
        window.LaravelDataTables = window.LaravelDataTables || {};
        $(document).ready(function() {
            $(document).on('click', '.kt_info_toggle_custom', function() {
                var url = $(this).attr('data-url');
                $(".info_name_data").text('');
                $('.log_info_data').html('');
                $.ajax({
                    url: url,
                    type: 'GET', // replaced from put
                    dataType: "JSON",
                    data: {
                        '_token': '{{ csrf_token() }}' // method and token not needed in data
                    },
                    success: function(response) {
                        var htmlData = '';
                        if (response.status == 'success') {
                            var timeDataStatus = new Array('text-primary',
                                'text-warning', 'text-success', 'text-danger',
                                'text-info', 'text-secondary')
                            var iStart = 0;
                            $.each(response.data, function(key, value) {
                                var attributes_data = '';
                                if (value.attributes_data !== undefined) {
                                    attributes_data = value.attributes_data;
                                }
                                if (iStart == 0) {
                                    $(".info_name_data").text(value.name);
                                }
                                htmlData +=
                                    '<div class="timeline-item row p-3">';
                                htmlData +=
                                    '<div class="timeline-label col-md-4" style="border-right: 1px solid black;">' +
                                    value.created_date +
                                    ' <br/><small>By : ' + value.username +
                                    '</small></div>';
                                htmlData +=
                                    '<div class="timeline-label col-md-8">' +
                                    value.event + '' + attributes_data +
                                    ' <small><br/>IP : ' + value.ip +
                                    '</small></div>';
                                htmlData += '</div>';
                                iStart++;
                            });
                        }
                        $('.log_info_data').html(htmlData);
                    },
                    error: function(xhr) {
                        // / toastr.success(xhr.responseText);
                        Swal.fire(xhr.responseText);
                    }
                });
            });
        });
    });

    $(function() {
        $('#sortable').sortable({
            axis: 'y',
            opacity: 0.7,
            handle: 'span',
            update: function(event, ui) {
                var dls = 0;
            }
        });
    });

    function changePosition(modal, field_name, tableId) {
        var list_sortable = $('#sortable').sortable('toArray').toString();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('change-position') }}",
            method: "POST",
            data: {
                "list_order": list_sortable,
                "_token": "{{ csrf_token() }}",
                field_name: field_name,
                modal: modal
            },
            success: function(data) {
                console.log(data + 'datadata');
                if (data == 1) {
                    $("#positionActivitiesModal .alert-success").text('Position change successfully')
                        .show();
                    $('#' + tableId).DataTable().ajax.reload();
                    setTimeout(function() {
                        $('#positionActivitiesModal').modal('hide');
                        $("#positionActivitiesModal .alert-success").text(
                            'Position change successfully').hide();
                    }, 2000);
                } else {
                    $("#positionActivitiesModal .alert-info").text('Some things wrong please try again')
                        .show()
                }
            }
        });
    }
</script>
