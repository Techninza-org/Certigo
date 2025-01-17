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

            width: 8rem;

        }



        /* Styling for the popup options */

        .option {

            cursor: pointer;

            padding: 5px;

        }



        



        /* table {

            display: grid;

            overflow: auto;

        } */









        .vscomp-ele {

            display: inline-block;

            max-width: -webkit-fill-available!important;

            width: 100%;

        }

    </style>

@endpush

@section('content')

    <div class="row">

        <div class="col-lg-12 d-flex align-items-strech">

            <div class="card w-100">

                <div class="card-body">

                    <div class="mb-5">

                        <h3>Training Details</h3>

                    </div>



                    <div class=" d-block align-items-center justify-content-between mb-9" >

                        <div class="row mb-3">

                            <div class="col-md-12">                            

                                <div class="mb-3 col-md-12">

                                    <p><strong>Topic :</strong> {{ $training->topic }}</p>

                                </div>

                                <div class="mb-3 col-md-12">

                                    <p><strong>Start Date :</strong> @php

                                        $date = date('F j, Y  H:i A', strtotime($training->audit_start_date));

                                        @endphp

                                        {{ $date }}</p>

                                </div>

                                <div class="mb-3 col-md-12">

                                    <p><strong>Client :</strong> {{ $client->organisation_name }}</p>

                                </div>

                                <div class="mb-3 col-md-12">

                                    <p><strong>Location :</strong> {{ $training->location }}</p>

                                </div>

                                <div class="mb-3 col-md-12">

                                    <p><strong>Amount : </strong> ₹ {{ $training->amount }}</p>

                                </div> 

                            </div> 

                            <div class="col-md-12 justify-content-center p-3 rounded-2" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

                                <table id="example" class="display " >

                                    <thead>

                                      <tr>

                                        <th scope="col" class="d-none"></th>

                                        <th scope="col">Name</th>

                                        <th scope="col">Designation</th>

                                        <th scope="col">Contact number</th>

                                      </tr>

                                    </thead>

                                    <tbody>

                                        @foreach($atendis as $atnd)

                                        <tr>

                                            <th class="d-none" scope="row">{{ $atnd->id }}</th>

                                            <td>{{ $atnd->fname }} {{ $atnd->lname }}</td>

                                            <td>{{ $atnd->designation }}</td>

                                            <td>{{ $atnd->contact }}</td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                  </table>    

                            </div> 



                        </div>


@if($training->img__array !== null)
                        <div class="row mb-4">
                            <b class="mb-3">Uploaded evidences</b>
                            @foreach($training->img__array as $one)
                            <div class="col-lg-2">
                                <img src="{{ url('') }}/{{ $one }}" alt="" style="max-width:90px;">
                            </div>
                            @endforeach
                        </div>
@endif




                        <b class="mt-3">Entered Key Points :</b>

                        @if($training->key_points !== null)

                                @foreach($training->key_points as $key => $point)

                                @php

                                $keyy = $key+1;

                                @endphp

                                <div class="d-flex mb-3 align-items-center ">

                                    <p class="mb-0 me-2" id="text_{{ $key }}"> {{ $keyy }}. {{ $point }} </p>

                                    <a class=" btn p-1 text-danger " href="{{ route('remove_point') }}" onclick="event.preventDefault();document.getElementById('textform_{{ $key }}').submit();"> X </a>

                                    <form id="textform_{{ $key }}" action="{{ route('remove_point') }}" method="get">

                                        <input type="hidden" name="key" value="{{ $key }}">

                                        <input type="hidden" value="{{ $training->id }}" name="trainingId">



                                    </form>

                                    

                                </div>

                                



                                @endforeach

                                @endif



                                <div class="d-flex justify-content-evenly align-items-center mb-3 mt-3">

                                    <a href="{{ route('trainer.sign.view',$training->id) }}"><i class="fa-solid fa-file-signature"></i> Trainer's Signature here</a>

                                    <a href="{{ route('trainee.sign.view',$training->id) }}"><i class="fa-solid fa-file-signature"></i> Trainee's Signature here</a>

                                </div>



                        <div class="text-center">

                            {{-- <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a> --}}

                            <a class="btn btn-success pt-0 pb-0" href="{{ route('downlaod.training.pdf') }}" onclick="event.preventDefault(); document.getElementById('complete-form').submit();">

                                Get Report </a>

                             <form id="complete-form" action="{{ route('downlaod.training.pdf') }}" method="get" class="d-none">

                              

                               <input type="hidden" value="{{ $training->id }}" name="trainingId">

                           </form>

                        </div>



                    </div>

                    

                </div>

            </div>

        </div>

    </div>





@endsection











@push('js')







    <script>

        $(document).ready(function() {

            

            new DataTable('#example');



        });



        VirtualSelect.init({ 

            ele: '#select-attendees' ,

            



        });



        VirtualSelect.init({ 

            ele: '#select-members' 

        });





        $(document).ready(function() {

            // Add input fields on plus button click

            $("#add-input").click(function() {

                $("#input-fields").append('<div class="form-group"><input type="text" name="input[]" class="form-control mb-3" placeholder="Enter text"></div>');

            });

        });

    </script>

@endpush

