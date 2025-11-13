@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        
        @foreach ($errors->all() as $error)
        <p class="mb-1">{{ $error }}</p>
        @endforeach

    </div>
@endif