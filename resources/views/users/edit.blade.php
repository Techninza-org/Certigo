@extends('layout.layout')


@push('css')


<style>



.field-icon {
  float: right;
  margin-right: 20px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}




</style>


@endpush


@section('content')


<div class="row">


  <div class="col-lg-6 col-md-6  d-flex align-items-strech">  





    <div class="card w-100">


      <div class="card-body">


        


        <div class=" d-block align-items-center justify-content-between mb-9">


          <h3>Account Details</h3>


            <form action="{{ route('edit.user.details') }}" method="post">


                @csrf





                <input type="hidden" name="userId" value="{{ $user->id }}">





                <div class="mb-3">


                    <label for="exampleInputName1" class="form-label">Name</label>


                    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" value="{{ $user->name }}" name="name">


                    


                  </div>


                <div class="mb-3">


                  <label for="exampleInputEmail1" class="form-label">Email address</label>


                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}" name="email">


                  


                </div>

                <div class="mb-3">


                  <label for="exampleInputPass" class="form-label">Password</label>


                  <input type="password" class="form-control" id="exampleInputPass"  value="{{ $user->string }}" name="string">

                  <span toggle="#exampleInputPass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  


                </div>


                <div class="mb-3">


                  <label  class="form-label">Designation</label>


                  <input type="text" class="form-control"  value="{{ $user->designation }}" name="designation">


                  


                </div>


                <div class="mb-3">


                  <label for="exampleRole1" class="form-label">Role</label>


                  <Select class="form-select" name="role">


                    <option value="1" {{ $user->role == 1 ? 'selected' : ''}}>Super Admin</option>


                    <option value="2" {{ $user->role == 2 ? 'selected' : ''}}>Sub-admin</option>


                    <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Employee</option>                   





                  </Select>


                </div>


                


                <button type="submit" class="btn btn-primary">Submit</button>


              </form>


        </div>


       


      </div>


    </div>


  </div>


  


  <div class="col-lg-6 col-md-6 d-flex align-items-strech">





    <div class="card w-100">


        <div class="card-body">


            @if (\Session::has('success')) 


            <div class="alert alert-success"> 


                <ul> 


                    <li>{!! \Session::get('success') !!} </li> 


                </ul> 


            </div> 


            @endif


            @if (\Session::has('error')) 


            <div class="alert alert-success"> 


                <ul> 


                    <li>{!! \Session::get('error') !!} </li> 


                </ul> 


            </div> 


            @endif


    <h3>Update password</h3>


            


          <div class=" d-block align-items-center justify-content-between mb-9">


              <form action="{{ route('update.user.pass') }}" method="post">


                @csrf





                <input type="hidden" name="userId" value="{{ $user->id }}">





                <div class="mb-3">


                      <label for="exampleCurrentPass1" class="form-label">Current Password</label>


                      <input type="password" class="form-control" id="exampleCurrentPass1" aria-describedby="cpassHelp" name="curr_pass" >


                      


                </div>


                <div class="mb-3">


                    <label for="exampleNewPass1" class="form-label">New Password</label>


                    <input type="password" class="form-control" id="exampleNewPass1" aria-describedby="npassHelp" name="new_pass">


                    


                </div>


                <div class="mb-3">


                    <label for="exampleCNewPass1" class="form-label">Confirm New Password</label>


                    <input type="password" class="form-control" id="exampleCNewPass1" aria-describedby="cnpassHelp" name="c_new_pass">


                    


                </div>


                


                <button type="submit" class="btn btn-primary">Submit</button>


                </form>


          </div>


         


        </div>


      </div>


  </div>


  


</div>





@endsection





@push('js')








<script>


 




$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});












</script>


@endpush