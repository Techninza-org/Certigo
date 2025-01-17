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



        



        table {

            display: grid;

    overflow: auto;

        }









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

                        <div class="row">

                            <div class="col-md-6">                            

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

                            <div class="col-md-6 justify-content-center">

                                <table id="example" class="table table-striped" >

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

                        <div class="text-center">

                            <a class="btn btn-warning pt-0 pb-0" href="{{ route('startTraining') }}" onclick="event.preventDefault(); document.getElementById('startTraining').submit();">

                                 Start Training </a>

                              <form id="startTraining" action="{{ route('startTraining') }}" method="post" class="d-none">

                                @csrf

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

    </script>

@endpush

