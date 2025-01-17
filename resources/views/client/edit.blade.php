@extends('layout.layout')

@push('css')

    <style>

        table.dataTable.display>tbody>tr.odd>.sorting_1,

        table.dataTable.order-column.stripe>tbody>tr.odd>.sorting_1 {

            box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.054);

            font-weight: 600;

            text-wrap: nowrap;

        }





        .dataTables_wrapper .dataTables_paginate .paginate_button.current,

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {

            border: none !important;

        }

        .pac-container { z-index: 100000; }


    </style>

@endpush

@section('content')

    <div class="row">

        <div class="col-lg-12 d-flex align-items-strech">

            <div class="card w-100">

                <div class="card-body">

                    <a href="{{ route('index') }}" class="btn"><i class="fa-regular fa-circle-left"

                            style="font-size: x-large;"></i></a>

                            <h5 class="mb-3" style="    text-transform: uppercase;    text-decoration: underline;color:#525252">Update

                                {{ $client->title }} {{ $client->fname }} {{ $client->lname }} details</h5>

                            <div class=" d-block align-items-center justify-content-between mb-9">

                                <form action="{{ route('client.update') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">

            

                                        <input type="hidden" value="{{ $client->id }}" name="id">

                                        <div class="mb-3 col-md-3">

                                            <label class="form-label">Title <span class="text-danger">*</span></label>

            

                                            <select class="form-select" name="title" id="">

                                                <option value="Mr" {{ $client->title == 'Mr' ? 'selected' : '' }}>Mr</option>

                                                <option value="Mrs" {{ $client->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>

                                                <option value="Ms" {{ $client->title == 'Ms' ? 'selected' : '' }}>Ms</option>

                                                <option value="Dr" {{ $client->title == 'Dr' ? 'selected' : '' }}>Dr</option>

                                                <option value="Professor" {{ $client->title == 'Professor' ? 'selected' : '' }}>

                                                    Professor</option>

                                                <option value="Sir" {{ $client->title == 'Sir' ? 'selected' : '' }}>Sir</option>

                                                <option value="Madam" {{ $client->title == 'Madam' ? 'selected' : '' }}>Madam</option>

            

                                            </select>

                                        </div>

            

                                        <div class="mb-3 col-md-5">

                                            <label class="form-label">First Name <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="fname" value="{{ $client->fname }}"

                                                required>

                                        </div>

            

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Last Name <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="lname" value="{{ $client->lname }}"

                                                required>

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Designation <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="designation"

                                                value="{{ $client->designation }}" required>

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Organization name <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="organisation_name"

                                                value="{{ $client->organisation_name }}" required>

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Organization Location <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="organisation_location" id="organisation_location"

                                                value="{{ $client->organisation_location }}" required>

                                        </div>

            

                                        <div class="mb-3 col-md-6">

                                            <label class="form-label">FSSAI number </label>

                                            <input type="text" class="form-control" name="fssai_no" value="{{ $client->fssai_no }}">

                                        </div>

            

                                        <div class="mb-3 col-md-6">

                                            <label class="form-label">PIN Code <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="pincode" value="{{ $client->pincode }}"

                                                required>

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Company E-Mail ID <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="company_emailid"

                                                value="{{ $client->company_emailid }}" required>

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Company Website <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="company_website"

                                                value="{{ $client->company_website }}" required>

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Company Contact no. <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="comp_cont_no"

                                                value="{{ $client->comp_cont_no }}" required>

                                        </div>

            

                                        <div class="mb-3 col-md-6">

                                            <label class="form-label">Company Partners</label>

                                            <input type="text" class="form-control" name="comp_partners"

                                                value="{{ $client->comp_partners }}">

                                        </div>

            

            

            

            

            

                                        <div class="mb-3 col-md-6">

                                            <label class="form-label">Company Partners E-Mail ID's</label>

                                            <input type="text" class="form-control" name="comp_part_email"

                                                value="{{ $client->comp_part_email }}">

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Number of Audit to conduct</label>

                                            <input type="text" class="form-control" name="no_audit_conduct"

                                                value="{{ $client->no_audit_conduct }}">

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Number of trainings to conduct</label>

                                            <input type="text" class="form-control" name="no_trainings_conduct"

                                                value="{{ $client->no_trainings_conduct }}">

                                        </div>

            

                                        <div class="mb-3 col-md-4">

                                            <label class="form-label">Number of Samples to collect</label>

                                            <input type="text" class="form-control" name="no_samples_collect"

                                                value="{{ $client->no_samples_collect }}">

                                        </div>

            

            

            

            

                                        <div class="mb-3 col-md-6">

                                            <label class="form-label">Amount of Contract</label>

                                            <input type="text" class="form-control" name="contract_amount"

                                                value="{{ $client->contract_amount }}">

                                        </div>

            

                                        <div class="mb-3 col-md-6">

                                            <label class="form-label">Upload client logo:</label>

                                            <input type="file" class="form-control" name="logo">

                                        </div>

            

                                        <div>

                                            <img src="{{ env('APP_URL') }}/storage/clients-logo/{{ $client->client_logo }}" alt="" style="    max-width: 100px;">

                                        </div>

                                        <label class="form-label"> Director/ CEO </label>

                                        <div class="mb-3 col-md-4" id="director" >

                                            <input type="text" class="form-control" name="director" placeholder="Director's name" value="{{ $client->director }}">

                                        </div>



                                        <div class=" mb-3 col-md-4" id="director_email_mob" >

                                            {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                            <input type="email" aria-label="Email" class="form-control mb-3" name="director_email" placeholder="Director's email" value="{{ $client->director_email }}">

                                        

                                        </div>

                                        <div class=" mb-3 col-md-4"  >

                                            {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                            <input type="number" aria-label="Mobile" class="form-control" name="director_mobile" placeholder="Director's mobile" value="{{ $client->director_mobile }}">

                                        </div>







                                        <label class="form-label"> Food Safety Team Leader </label>

                                        <div class="mb-3 col-md-4" id="fstl" >

                                            <input type="text" class="form-control" name="fstl" placeholder="FSTL's name" value="{{ $client->fstl }}"> 

                                        </div>

                                        <div class="mb-3 col-md-4" id="food_email_mob" >

                                            {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                            <input type="email" aria-label="Email" class="form-control mb-3" name="food_email" placeholder="FSTL's email" value="{{ $client->food_email }}">

                                        </div>

                                        <div class="mb-3 col-md-4"  >

                                            {{-- <span class="input-group-text"> Director's Email & Mobile</span> --}}

                                            <input type="number" aria-label="Mobile" class="form-control" name="food_mobile" placeholder="FSTL's mobile" value="{{ $client->food_mobile }}">

                                        </div>

            

                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </div>

                                    </div>

                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                                </form>

                            </div>

                </div>

                

            </div>

        </div>

    </div>



@endsection



@push('js')

<script  type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcaKZuOunzgmgbSf7E_Bmh4v0Do-rDw6E&libraries=places">
            
</script>

<script>
        $(document).ready(function() {
           
            
            var organisation_location = document.getElementById('organisation_location');
            new google.maps.places.Autocomplete(organisation_location);
            
         });
</script>

@endpush

