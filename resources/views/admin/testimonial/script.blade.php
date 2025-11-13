@push('scripts')

<script type="text/javascript">
    CKEDITOR.replace( 'description', {
        toolbar: [
           { name: 'document',items: [ 'Source'] },
            { name: 'basicstyles', 
                groups: ['basicstyles'],
                items: [
                    'Format','Bold','Italic','Underline'
            ]},
            {name: 'paragraph', 
                groups: ['list','indent','blocks','align','bidi'],
                items: ['NumberedList','BulletedList', 'JustifyLeft','JustifyCenter','JustifyRight',
            ]},
            { name: 'insert', items: [ 'Table', ] },
        ]
    });
    $(document).ready(function() {
        initValidation();      
    });  

    jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
        return !element.files[0] || (element.files[0].size <= limit);
        }, 'File is too big'); 

    jQuery.validator.addMethod('ckrequired', function (value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength =  jQuery.trim ( CKEDITOR.instances[idname].getData() );
        return !params  || messageLength.length !== 0;
    }, "This field is required");

    var initValidation = function () {
        $('#testimonialForm').validate({
            debug: false,
            ignore: '',
            rules: {
                title:{
                    required : true,
                },
                designation:{
                    required : true,
                },
                image: {
                  fileSizeLimit: {{ config('constants.fileSize')}}
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

    $("#image").change(function(){
        IconImage(this);
    });

    function IconImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    };

</script>
@endpush