@extends('layouts.admin.master')

@section('title')
{{__('Change Passsword')}}
@endsection

@section('content')
<div class="container-fluid p-0">
  <div class="row">
    <div class="col-12">
      <div class="col-sm-6">
          <h5><b>{{__('Change Passsword')}}</b></h5>
      </div>
      <div class="col-sm-12 col-xl-12">
          <div class="row">
            <div class="col-md-12">
              @include('components.error')
            </div>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <form method="post" action="{{route('change-password-post')}}">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Old Password</label>
                            <input class="form-control  @error('old_password') is-invalid @enderror" type="password" name="old_password" required="" placeholder="Old Password">
                            @error('old_password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>  
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>New Password</label>
                            <input class="form-control  @error('password') is-invalid @enderror" type="password" name="password" required="" placeholder="Password">
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>  
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Confirm Password</label>
                            <input class="form-control  @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                            @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>  
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary btn-block" type="submit">Change</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection