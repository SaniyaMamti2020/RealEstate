@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        initValidation();      
    });  

    var initValidation = function () {

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
                    required:  function(element) 
                    {
                        if( $("#user_id").length == 0) 
                        { 
                            return true;
                        } 
                        else 
                        {
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
            messages: { 
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent()).addClass('text-danger');
            },
            submitHandler: function (e) {  
                return true;
            }

        });
    };
</script>
@endpush