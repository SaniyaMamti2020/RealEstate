@if ($message = Session::get('success'))

 @push('scripts')
    <script type="text/javascript">
        Swal.fire({
            toast: true,
            type: 'success',
            position: "top",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            title: "<span style='color:white'>" + '{{$message}}' + "</span>",
            text: "",
            icon: 'success',
            heightAuto: true,
            background: "green",
            iconColor: "white",
          });
    </script>
@endpush
@php session()->forget('success') @endphp

@endif

@if ($message = Session::get('error'))
 @push('scripts')
    <script type="text/javascript">
        Swal.fire({
            toast: true,
            type: 'error',
            position: "top",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            title: "<span style='color:white'>" + '{{$message}}' + "</span>",
            text: "",
            icon: 'error',
            heightAuto: true,
            background: "#DD6B55",
            iconColor: "<span style='color:white'></span>",
          });
    </script>
@endpush
@php session()->forget('success') @endphp
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
