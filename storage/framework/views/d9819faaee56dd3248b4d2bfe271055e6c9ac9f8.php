<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            initValidation();
        });

        var initValidation = function() {

            $('#userForm').validate({
                debug: false,
                ignore: '',
                rules: {
                    f_name: {
                        required: true,
                    },
                    l_name: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: function(element) {
                            if ($("#user_id").length == 0) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    mobile_no: {
                        required: true,
                    },
                    branch_id: {
                        required: true,
                    }
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

        $("#owner_photo").change(function() {
            OwnerImage(this);
        });

        function OwnerImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#owner_photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        $("#company_logo").change(function() {
            CompanyImage(this);
        });

        function CompanyImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#company_logo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        var editor = CKEDITOR.replace('address', {
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
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/user/script.blade.php ENDPATH**/ ?>