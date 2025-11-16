<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        var editor = CKEDITOR.replace('description', {
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

        editor.on('change', function() {
            editor.updateElement();
        });

        $("#image").change(function() {
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

        $(document).ready(function() {
            initValidation();
        });
        var initValidation = function() {

            $('#categoryForm').validate({
                debug: false,
                ignore: '',
                rules: {
                    name: {
                        required: true,
                        maxlength: 100
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
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/category/script.blade.php ENDPATH**/ ?>