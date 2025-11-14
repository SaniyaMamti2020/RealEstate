<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            initValidation();
        });

        var initValidation = function() {

            $('#roleForm').validate({
                debug: false,
                ignore: '',
                rules: {
                    name: {
                        required: true,
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
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/roles/script.blade.php ENDPATH**/ ?>