@push('scripts')
<script type="text/javascript">
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        initValidation();
    });

    jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
        return !element.files[0] || (element.files[0].size <= limit);
        }, 'File is too big'); 

    var initValidation = function () {
        $('.generalSettingForm').validate({
            debug: false,
            ignore: '',
            rules: {
                phone_no: {
                    maxlength:10
                },
                icon_img: {
                  fileSizeLimit: {{ config('constants.fileSize')}}
                },
                logo_img: {
                  fileSizeLimit: {{ config('constants.fileSize')}}
                },
                footer_logo_img: {
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


CKEDITOR.replace( 'address', {
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

CKEDITOR.replace( 'info', {
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

</script>


<script type="text/javascript">
    //setting logo image
    function LogoImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
    $("#logo_img").change(function(){
        LogoImage(this);
    });

    function FooterLogoImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#footer_logo_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
    $("#footer_logo_img").change(function(){
        FooterLogoImage(this);
    });

    //setting icon image
    function IconImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#icon_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
    $("#icon_img").change(function(){
        IconImage(this);
    }); 

    //setting payment qrcode image
    function QrCodeImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#qrcode_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
    $("#payment_qrcode_img").change(function(){
        QrCodeImage(this);
    }); 
</script>

@endpush