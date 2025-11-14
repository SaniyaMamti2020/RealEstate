@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            initValidation();
        });

        jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
            return !element.files[0] || (element.files[0].size <= limit);
        }, 'File is too big');

        var initValidation = function() {
            $('#sliderForm').validate({
                debug: false,
                ignore: '',
                rules: {
                    slider_img: {
                        fileSizeLimit: {{ config('constants.fileSize') }}
                    },
                },
                messages: {},
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent()).addClass('text-danger');
                },
                submitHandler: function(e) {
                    return true;
                }

            });
        };

        $("#slider_img").change(function() {
            IconImage(this);
        });

        function IconImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        $(document).on('click', '.image_delete', function() {
            var id = $(this).attr('data-id');
            event.preventDefault();

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
                        url: '{{ url('/admin/slider-image-delete') }}/' + id,
                        type: "GET",
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            $('.image_delete').html(
                                '<img alt="Image" src="{{ asset('/media/no-image.png') }}" class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">'
                            );
                            $('#slider_img').addClass('required');
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
        });
    </script>
@endpush
