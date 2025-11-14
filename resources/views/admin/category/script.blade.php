@push('scripts')
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
@endpush
