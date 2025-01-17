@extends('layout.layout')

@push('css')

    <style>

      

        /* Styling for the popup */

        .popup {

            display: none;

            position: absolute;

            right: 30px;

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

        .pac-container { z-index: 100000; }

    </style>

@endpush

@section('content')

    <div class="row">

        <div class="col-lg-12 d-flex align-items-strech">





            



            <div class="card w-100">

                <div class="card-body">

                    <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">

                      <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add New Client

                    </button>

                    <div class=" d-block align-items-center justify-content-between mb-9" style="overflow-x: auto;height: 60vh;">

                        {{-- <table id="myTable" class="display">

                            <thead>

                                <tr>

                                    <th style="display: none"></th>

                                    <th>Client Name</th>

                                    <th>Client ID</th>

                                    <th>Organization </th>

                                    <th>Organization Location </th>



                                    <th>Number of Audits</th>

                                    

                                    <th>Number of Samples</th>

                                    <th>Amount of Contract</th>

                                    

                                    <th></th>



                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($clients as $client)

                                    <tr>

                                        <td style="display: none">{{ $client->id }}</td>

                                        <td>{{ $client->title }} {{ $client->fname }} {{ $client->lname }}</td>

                                        <td>{{ $client->client_id }}</td>

                                        <td>{{ $client->organisation_name }}</td>

                                        <td>{{ $client->organisation_location }}</td>



                                        

                                        <td>{{ $client->no_audit_conduct }}</td>

                                        

                                        <td>{{ $client->no_samples_collect }}</td>

                                        <td>₹ {{ $client->contract_amount }}</td>

                                       

                                        <td>

                                          <div style="    position: relative;">

                                            <i class="fa-solid fa-ellipsis-vertical btn popupButton" ></i>

                                            <div id="popup" class="popup">

                                                <div class="option d-flex p-2">

                                                    <a class="btn pt-0 pb-0" href="{{ route('view.client') }}" onclick="event.preventDefault(); document.getElementById('view-client{{ $client->id }}').submit();">

                                                        <i class="fa-solid fa-book" style="color: rgb(255, 136, 0)"></i> view </a>

                                                      <form id="view-client{{ $client->id }}" action="{{ route('view.client') }}" method="get" class="d-none">

                                                        

                                                        <input type="hidden" value="{{ $client->id }}" name="id">

                                                    </form>

                                                </div>

                                                <div class="option d-flex p-2">

                                                    <a class="btn pt-0 pb-0" href="{{ route('client.audit', $client->id) }}">

                                                    <i class="fa-solid fa-book" style="color: rgb(0, 94, 255)"></i> Audits </a>

                                                </div>

                                                <div class="option d-flex p-2">

                                                    <a class="btn pt-0 pb-0" href="{{ route('edit.client', $client->id) }}">

                                                    <i class="fa-solid fa-pen-to-square"></i> Edit </a>

                                                </div>

                                                <div class="option d-flex p-2">

                                                  <a class="btn pt-0 pb-0" href="{{ route('delete.client', $client->id) }}">

                                                    <i class="fa-solid fa-trash-can" style="color: red"></i> Delete </a>

                                                </div>

                                                <div class="option d-flex p-2">

                                                    <a class="btn pt-0 pb-0" href="{{ route('inactive.client') }}" onclick="event.preventDefault(); document.getElementById('inactive-client{{ $client->id }}').submit();">

                                                        <i class="fa-solid fa-eye-slash" style="color: rgb(255, 136, 0)"></i> In-active </a>

                                                      <form id="inactive-client{{ $client->id }}" action="{{ route('inactive.client') }}" method="post" class="d-none">

                                                        @csrf

                                                        <input type="hidden" value="{{ $client->id }}" name="clientId">

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                            





                                        </td>



                                    </tr>

                                @endforeach

                            </tbody>

                        </table> --}}









                        <table id="myTable" class="display">

                            <thead>

                                <tr>

                                    <th >Id</th>

                                    <th data-sortable="false">Name</th>

                                    <th data-sortable="false">Client ID</th>

                                    <th data-sortable="false">Organization </th>

                                    <th data-sortable="false">Organization Location </th>



                                    <th data-sortable="false">Number of Audits</th>

                                    

                                    <th data-sortable="false">Number of Samples</th>

                                    {{-- @if(Auth::user()->role ==1) --}}

                                    <th data-sortable="false">Amount of Contract</th>

                                    {{-- @endif --}}

                                    <th data-sortable="false"></th>

                                  

                                </tr>

                            </thead>

                            <tbody>



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

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Client</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <div id="overlay" style="display: none;">

                        <div id="loader"></div>

                      </div>

                    <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="mb-3 col-md-3">

                                <label class="form-label">Title <span class="text-danger">*</span></label>



                                <select class="form-select" name="title" id="">

                                    <option value="Mr">Mr</option>

                                    <option value="Mrs">Mrs</option>

                                    <option value="Ms">Ms</option>

                                    <option value="Dr">Dr</option>

                                    <option value="Professor">Professor</option>

                                    <option value="Sir">Sir</option>

                                    <option value="Madam">Madam</option>



                                </select>

                            </div>



                            <div class="mb-3 col-md-5">

                                <label class="form-label">First Name <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="fname" required>

                            </div>





                            <div class="mb-3 col-md-4">

                                <label class="form-label">Last Name <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="lname" required>

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Designation <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="designation" required>

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Organization name <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="organisation_name" required>

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Organization Location <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" id="organisation_location" name="organisation_location" required>

                            </div>



                            <div class="mb-3 col-md-6">

                                <label class="form-label">FSSAI number </label>

                                <input type="text" class="form-control" name="fssai_no">

                            </div>



                            <div class="mb-3 col-md-6">

                                <label class="form-label">PIN Code <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="pincode" required>

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Company E-Mail ID <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="company_emailid" required>

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Company Website <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="company_website" >

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Company Contact no. <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="comp_cont_no" required>

                            </div>



                            <div class="mb-3 col-md-6">

                                <label class="form-label">Company Partners</label>

                                <input type="text" class="form-control" name="comp_partners">

                            </div>











                            <div class="mb-3 col-md-6">

                                <label class="form-label">Company Partners E-Mail ID's</label>

                                <input type="text" class="form-control" name="comp_part_email">

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Number of Audits in contract</label>

                                <input type="text" class="form-control" name="no_audit_conduct">

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Number of trainings in contract</label>

                                <input type="text" class="form-control" name="no_trainings_conduct">

                            </div>



                            <div class="mb-3 col-md-4">

                                <label class="form-label">Number of Samples in contract</label>

                                <input type="text" class="form-control" name="no_samples_collect">

                            </div>









                            <div class="mb-3 col-md-6">

                                <label class="form-label">Amount of Contract</label>

                                <input type="text" class="form-control" name="contract_amount">

                            </div>



                            <div class="mb-3 col-md-6">

                                <label class="form-label">Upload client logo:</label>

                                <input type="file" class="form-control" name="client_logo">

                            </div>



                            {{-- <div class="mb-3 col-md-6">

                                <label class="form-label">Upload client signature:</label>

                                <input type="file" class="form-control" name="client_signature" required>

                            </div> --}}



                            {{-- <div class="mb-3 col-md-6" id="doc_ref" >

                                <label class="form-label">Doc Ref</label>

                                <input type="text" class="form-control" name="doc_ref" >

                            </div>

    

                            <div class="mb-3 col-md-6" id="personal_responsible" >

                                <label class="form-label">Personal Responsible</label>

                                <input type="text" class="form-control" name="personal_responsible" > 

                            </div> --}}

    

                            <label class="form-label"> Director/ CEO </label>

                            <div class="mb-3 col-md-4" id="director" >

                                <input type="text" class="form-control" name="director" placeholder="Director's name">

                            </div>

    

                            <div class=" mb-3 col-md-4" id="director_email_mob" >

                                {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                <input type="email" aria-label="Email" class="form-control mb-3" name="director_email" placeholder="Director's email">

                               

                            </div>

                            <div class=" mb-3 col-md-4"  >

                                {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                <input type="number" aria-label="Mobile" class="form-control" name="director_mobile" placeholder="Director's mobile">

                            </div>

    

                            

    

                            <label class="form-label"> Food Safety Team Leader </label>

                            <div class="mb-3 col-md-4" id="fstl" >

                                <input type="text" class="form-control" name="fstl" placeholder="FSTL's name"> 

                            </div>

                            <div class="mb-3 col-md-4" id="food_email_mob" >

                                {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                <input type="email" aria-label="Email" class="form-control mb-3" name="food_email" placeholder="FSTL's email">

                            </div>

                            <div class="mb-3 col-md-4"  >

                                {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                <input type="number" aria-label="Mobile" class="form-control" name="food_mobile" placeholder="FSTL's mobile">

                            </div>



                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="submit" id="formSubmission" class="btn btn-primary" >ADD</button>

                            </div>

                        </div>

                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                    </form>



                </div>



            </div>

        </div>

    </div>
    <script  type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcaKZuOunzgmgbSf7E_Bmh4v0Do-rDw6E&libraries=places">
            
    </script>

    <script>
            $(document).ready(function() {
               
                
                var organisation_location = document.getElementById('organisation_location');
                new google.maps.places.Autocomplete(organisation_location);
                
             });
    </script>


    <script>

        $(document).ready(function() {



           









            $('#myTable').DataTable({

                processing: true,

                serverSide: true,

                order: [[ 0, "desc" ]],

                ajax: "{{ route('dataindex') }}",

                

                columns: [

                    { data: 'id' },                    



                    { 

                        data: null,

                        render: function(data, type, row) {

                            return data.title + ' ' + data.fname + ' ' + data.lname;

                        }

                    },

                    

                    { data: 'client_id' },

                    { data: 'organisation_name' },

                    { data: 'organisation_location' }   ,

                    { data: 'no_audit_conduct' }  ,

                    { data: 'no_samples_collect' }  ,

                    { data: 'contract_amount' }  ,

                    

                    { 

                        data: null,

                        render: function(data, type, row) {

                        // Replace the code below with your own HTML markup for the action buttons
                                
                        return '<div style="position: relative;">\
                            <i class="fa-solid fa-ellipsis-vertical btn popupButton" ></i>\
                            <div id="popup" class="popup">\
                                ' + (data.status === 2 ?
                                '<div class="option d-flex p-2 iAmInactive" >\
                                    <a class="btn pt-0 pb-0" href="{{ route("active.client") }}" onclick="event.preventDefault(); document.getElementById(\'active-client'+data.id+'\').submit();toastr.success(\'Client made Active!\', \'Success\');">\
                                        <i class="fa-solid fa-pen-to-square"></i>Active Client</a>\
                                        <form id="active-client'+data.id+'" action="{{ route("active.client") }}" method="get" class="d-none">\
                                        <input type="hidden" value="'+data.id+'" name="clientId">\
                                    </form>\
                                </div>':
                                '<div class="option d-flex p-2">\
                                    <a class="btn pt-0 pb-0" href="{{ route("view.client") }}" onclick="event.preventDefault();document.getElementById(\'view-client'+data.id+'\').submit();">\
                                        <i class="fa-solid fa-book" style="color: rgb(255, 136, 0)"></i> view </a>\
                                    <form id="view-client'+data.id+'" action="{{ route("view.client") }}" method="get" class="d-none">\
                                        <input type="hidden" value="'+data.id+'" name="id">\
                                    </form>\
                                </div>\
                                <div class="option d-flex p-2">\
                                    <a class="btn pt-0 pb-0" href="{{ route("client.audit") }}" onclick="event.preventDefault();document.getElementById(\'client-audits'+data.id+'\').submit();">\
                                    <i class="fa-solid fa-book" style="color: rgb(0, 94, 255)"></i> Audits </a>\
                                    <form id="client-audits'+data.id+'" action="{{ route("client.audit") }}" method="get" class="d-none">\
                                        <input type="hidden" value="'+data.id+'" name="cid">\
                                    </form>\
                                </div>\
                                <div class="option d-flex p-2">\
                                    <a class="btn pt-0 pb-0" href="{{ route("edit.client") }}" onclick="event.preventDefault();document.getElementById(\'client-edit'+data.id+'\').submit();">\
                                    <i class="fa-solid fa-pen-to-square"></i> Edit </a>\
                                    <form id="client-edit'+data.id+'" action="{{ route("edit.client") }}" method="get" class="d-none">\
                                        <input type="hidden" value="'+data.id+'" name="clid">\
                                    </form>\
                                </div>\
                                <div class="option d-flex p-2">\
                                    <a class="btn pt-0 pb-0" href="{{ route("inactive.client") }}" onclick="event.preventDefault(); document.getElementById(\'inactive-client'+data.id+'\').submit();toastr.success(\'Client made In-active!\', \'Success\');">\
                                        <i class="fa-solid fa-eye-slash" style="color: rgb(255, 136, 0)"></i> In-active </a>\
                                    <form id="inactive-client'+data.id+'" action="{{ route("inactive.client") }}" method="post" class="d-none">@csrf\
                                        <input type="hidden" value="'+data.id+'" name="clientId">\
                                    </form>\
                                </div>\
                                <div class="option d-flex p-2">\
                                    <a class="btn pt-0 pb-0" href="{{ route("delete.client") }}" onclick="event.preventDefault(); document.getElementById(\'delete-client'+data.id+'\').submit();toastr.success(\'Client removed successfully!\', \'Success\');">\
                                    <i class="fa-solid fa-trash-can" style="color: red"></i> Delete </a>\
                                    <form id="delete-client'+data.id+'" action="{{ route("delete.client") }}" method="get" class="d-none">\
                                        <input type="hidden" value="'+data.id+'" name="dclId">\
                                    </form>\
                                </div>')+
                            '</div>\
                            </div>';
                        }

                    }







                ]

            });



            $('table.dataTable tbody tr td:nth-child(2)').css({'white-space':'nowrap','font-weight':'600'});





            // Attach the event handlers to a parent element that exists in the DOM

            $(document).on('click', '.popupButton', function() {

            var popup = $(this).next('.popup');

            // Hide all other popups

            $('.popup').not(popup).hide();

            // Toggle the display of the corresponding popup

            popup.toggle();

            });



            // Close the popup when clicking outside of it

            $(document).on('click', function(event) {

            if (!$(event.target).hasClass('popupButton') && !$(event.target).hasClass('popup')) {

                $('.popup').hide();

            }

            });





           

                



            

        });





        document.addEventListener('DOMContentLoaded', function() {

            // console.log("domready");

        

            let inactiveElements = document.querySelectorAll(".iAmInactive");

            if (inactiveElements.length > 0) {

                console.log("elements found");

        

                Array.from(inactiveElements).forEach(function(inactiveElement){

                    let trElement = inactiveElement.closest('tr');

                    console.log(trElement);

                    trElement.style.backgroundColor = '#646262';

                    trElement.style.color = '#8f8f8f';

                });

            } else {

                console.log("No inactive elements found");

                // Handle the case when there are no inactive elements

            }

        });











        

    </script>

@endpush

