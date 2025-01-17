@extends('layout.layout')
@push('css')
<style>


</style>
@endpush
@section('content')
<div class="row">
  <div class="col-lg-12 d-flex align-items-strech">

   


    <div class="card w-100">
      <div class="card-body">
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Client
        </button> --}}
        <div class=" d-block align-items-center justify-content-between mb-9">
           
              {{-- <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
                <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
                  <div class="d-flex align-items-center justify-content-center w-100"> --}}
                    <div class="row justify-content-center w-100">
                      <div class="col-md-8 col-lg-6 col-xxl-6">
                        {{-- <div class="card mb-0">
                          <div class="card-body"> --}}
                            <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                              <img src="{{ url('') }}/images/certigoqas-logo.jpeg" width="180" alt="">
                            </a>
                            {{-- <p class="text-center">Your Social Campaigns</p> --}}
                            <form method="POST" action="{{ route('register.user') }}">
                                @csrf
            
                              <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
            
                              <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                              </div>
            
                              <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
            
                              <div class="mb-4">
                                <label for="password-confirm" class=" form-label ">Confirm Password</label>
            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
            
            
                              
                              <button type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
                              
                            </form>
                            {{-- <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-bold">Already registered?</p> &nbsp;
                                <a class="nav-link" href="{{ route('login') }}" style="color: #5d87ff;
                                font-weight: 600;">   {{ __('Login') }}</a>
                            </div> --}}
                           
                          {{-- </div>
                        </div> --}}
                      </div>
                    </div>
                  {{-- </div>
                </div>
              </div> --}}
              
        </div>
       
      </div>
    </div>
  </div>
  
</div>

@endsection

@push('js')


<script>
 





</script>
@endpush