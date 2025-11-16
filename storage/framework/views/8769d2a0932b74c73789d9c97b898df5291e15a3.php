<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        CKEDITOR.replace('page_desc', {
            toolbar: [{
                    name: 'document',
                    items: ['Source']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles'],
                    items: [
                        'Format', 'Bold', 'Italic', 'Underline'
                    ]
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', ]
                },
                {
                    name: 'insert',
                    items: ['Table', ]
                },
            ]
        });
        CKEDITOR.replace('other_desc', {
            toolbar: [{
                    name: 'document',
                    items: ['Source']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles'],
                    items: [
                        'Format', 'Bold', 'Italic', 'Underline'
                    ]
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', ]
                },
                {
                    name: 'insert',
                    items: ['Table', ]
                },
            ]
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            initValidation();
        });

        jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
            return !element.files[0] || (element.files[0].size <= limit);
        }, 'File is too big');

        jQuery.validator.addMethod('ckrequired', function(value, element, params) {
            var idname = jQuery(element).attr('id');
            var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
            return !params || messageLength.length !== 0;
        }, "This field is required");

        var initValidation = function() {
            $('#pagesForm').validate({
                debug: false,
                ignore: '',
                rules: {
                    page_name: {
                        required: true,
                    },
                    sub_title: {
                        required: true,
                    },
                    page_img: {
                        fileSizeLimit: <?php echo e(config('constants.fileSize')); ?>

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

        $("#page_img").change(function() {
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
            console.log(id);
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
                        url: '<?php echo e(url('/admin/page-image-delete')); ?>/' + id,
                        type: "GET",
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            $('.image_delete').html(
                                '<img alt="Image" src="<?php echo e(asset('/media/no-image.png')); ?>" class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">'
                                );
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
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/about/script.blade.php ENDPATH**/ ?>