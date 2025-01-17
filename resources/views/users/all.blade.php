@extends('layout.layout')
@push('css')
    <style>
      
        /* Styling for the popup */
        .popup {
            display: none;
            position: absolute;
            right: 120px;
            background-color: #f9f9f9;
            padding: 5px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            z-index: 1;
            border-radius: 8px;            
            width: 9rem;
        }

        /* Styling for the popup options */
        .option {
            cursor: pointer;
            padding: 5px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 30px!important;
            padding: 5px;
            background-color: transparent;
            margin-left: 3px;
        }



        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        #loader {
            border: 4px solid #ffffff;
            border-top: 4px solid #6800fb;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">


            

            <div class="card w-100">
                <div class="card-body">
                    
                    <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add User
                    </button>

                    @if (Session::has('success')) 
                    <div class="alert alert-success"> 
                        <ul> 
                            <li>{!! \Session::get('success') !!} </li> 
                        </ul> 
                    </div> 
                    @endif
                    @if (Session::has('error')) 
                    <div class="alert alert-danger"> 
                        <ul> 
                            <li>{!! \Session::get('error') !!} </li> 
                        </ul> 
                    </div> 
                    @endif
                    <div class=" d-block align-items-center justify-content-between mb-9" style="overflow-x: auto;height: 60vh;">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th style="display: none"></th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Role </th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $client)
                                    <tr>
                                        <td style="display: none">{{ $client->id }}</td>
                                        <td>{{ $client->name }} </td>
                                        <td>{{ $client->email }}</td>
                                        <td>
                                            @if($client->role == 1)
                                            <span class="badge text-bg-primary"> Super Admin</span> 
                                            @elseif($client->role == 0)
                                            <span class="badge text-bg-warning">Employee</span>
                                            @elseif($client->role == 2)
                                            <span class="badge text-bg-warning">Sub Admin</span>
                                            @endif
                                        </td>
                                        
                                        <td>
                                          <div style="    position: relative;">
                                            <i class="fa-solid fa-ellipsis-vertical btn popupButton" ></i>
                                            <div  class="popup">

                                                @if($client->status === 0)
                                                <div class="option d-flex p-2 iAmInactive" >                                                   

                                                    <a class="btn pt-0 pb-0" href="{{ route('active.user') }}" onclick="event.preventDefault(); document.getElementById('active-user{{ $client->id }}').submit();">
                                                        <i class="fa-solid fa-pen-to-square"></i>Active user</a>
                                                      <form id="active-user{{ $client->id }}" action="{{ route('active.user') }}" method="get" class="d-none">
                                                       
                                                        <input type="hidden" value="{{ $client->id }}" name="userId">
                                                    </form>
                                                </div>
                                                @else
                                               
                                                <div class="option d-flex p-2">                                                   

                                                    <a class="btn pt-0 pb-0" href="{{ route('edit.user') }}" onclick="event.preventDefault(); document.getElementById('edit-user{{ $client->id }}').submit();">
                                                        <i class="fa-solid fa-pen-to-square"></i>View/Edit</a>
                                                      <form id="edit-user{{ $client->id }}" action="{{ route('edit.user') }}" method="get" class="d-none">
                                                       
                                                        <input type="hidden" value="{{ $client->id }}" name="userId">
                                                    </form>
                                                </div>
                                                <div class="option d-flex p-2">
                                                  <a class="btn pt-0 pb-0" href="{{ route('delete.user') }}" onclick="event.preventDefault(); document.getElementById('delete-user{{ $client->id }}').submit();">
                                                    <i class="fa-solid fa-trash-can" style="color: red"></i> Delete </a>
                                                    <form id="delete-user{{ $client->id }}" action="{{ route('delete.user') }}" method="get" class="d-none">
                                                       
                                                        <input type="hidden" value="{{ $client->id }}" name="userId">
                                                    </form>
                                                </div>
                                                <div class="option d-flex p-2">
                                                    <a class="btn pt-0 pb-0" href="{{ route('inactive.user') }}" onclick="event.preventDefault(); document.getElementById('inactive-user{{ $client->id }}').submit();">
                                                        <i class="fa-solid fa-eye-slash" style="color: rgb(255, 136, 0)"></i> In-active </a>
                                                      <form id="inactive-user{{ $client->id }}" action="{{ route('inactive.user') }}" method="post" class="d-none">
                                                        @csrf
                                                        <input type="hidden" value="{{ $client->id }}" name="userId">
                                                    </form>
                                                </div>

                                                @endif
                                            </div>
                                          </div>
                                            


                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="overlay" style="display: none;">
                        <div id="loader"></div>
                      </div>
                      <form action="{{ route('add.user') }}" method="post">
                        @csrf                        

                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp"  name="name">
                            
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email">
                          
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Designation</label>
                            <input type="text" class="form-control"   name="designation">
                            
                          </div>
                        <div class="mb-3">
                          <label  class="form-label">Role</label>
                          <Select class="form-select" name="role">
                            <option value="0">Employee</option>                   
                            <option value="1"> Super Admin</option>
                            <option value="2"> Sub-Admin</option>
        
                          </Select>
                        </div>
        
                        
                        <div class="mb-3">
                            <label for="exampleNewPass1" class="form-label"> Password</label>
                            <input type="password" class="form-control" id="exampleNewPass1" aria-describedby="npassHelp" name="password" autocomplete="on">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleCNewPass1" class="form-label">Confirm  Password</label>
                            <input type="password" class="form-control" id="exampleCNewPass1" aria-describedby="cnpassHelp" name="cpass" autocomplete="off">
                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                order:[[0,'desc']]
            });

            $('table.dataTable tbody tr td:nth-child(2)').css({'white-space':'nowrap','font-weight':'600'});


            $('.popupButton').on('click', function() {
              var popup = $(this).next('.popup');
              // Hide all other popups
              $('.popup').not(popup).hide();
              // Toggle the display of the corresponding popup
              popup.toggle();
            });

            // Close the popup when clicking outside of it
            $(window).on('click', function(event) {
              if (!$(event.target).hasClass('popupButton') && !$(event.target).hasClass('popup')) {
                $('.popup').hide();
              }
            });

           
                
            
        });

        let inactiveElements = document.querySelectorAll(".iAmInactive");
        if (inactiveElements.length > 0) {
            Array.from(inactiveElements).forEach(function(inactiveElement){
                let trElement = inactiveElement.parentNode.parentNode.parentNode.parentNode;
                // trElement.style.backgroundColor = '#646262';
                // trElement.style.color = '#8f8f8f';
                trElement.style.opacity = '0.35';



            });
        } else {
          // Handle the case when there are no inactive elements
        }
        
    </script>
@endpush
