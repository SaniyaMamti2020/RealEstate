@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        initValidation();      
    });  

    var initValidation = function () {

        $('#roleForm').validate({
            debug: false,
            ignore: '',
            rules: {
                name: {
                    required:true,
                },
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