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

            max-width: -webkit-fill-available !important;

            width: 100%;

        }
    </style>
@endpush

@section('content')

    <div class="row">

        <div class="col-lg-12 d-flex align-items-strech">

            <div class="card w-100">

                <div class="card-body">

                    <div class="card-body">
                        <div style="margin-bottom: 15px;">
                            <div class="d-flex justify-content-between items-center">
                                <button id="backButton" class="btn btn-primary">Back</button>
                                <button id="forwardButton" class="btn btn-secondary">Forward</button>
                            </div>
                        </div>

                        <div class="mb-5">

                            <h3>Training Details</h3>

                        </div>



                        <div class=" d-block align-items-center justify-content-between mb-9">

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

                                <div class="col-md-12 justify-content-center p-3 rounded-2"
                                    style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

                                    <table id="example" class="display ">

                                        <thead>

                                            <tr>

                                                <th scope="col" class="d-none"></th>

                                                <th scope="col">Name</th>

                                                <th scope="col">Designation</th>

                                                <th scope="col">Contact number</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            @foreach ($atendis as $atnd)
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



                            <div class="mb-4">

                                <form action="{{ route('training.images') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" value="{{ $training->id }}" name="trainingId">



                                    <input type="file" class="form-control mb-3" name="evidences[]" multiple=""
                                        accept="image/jpeg, image/jpg, image/png" id="fileInput">







                                    <p>Enter Training Key Points Below ( Other than Training Topic)</p>

                                    <div id="input-fields">

                                        <div class="form-group">

                                            <input type="text" name="input[]" class="form-control mb-3"
                                                placeholder="Enter key point">

                                        </div>

                                    </div>

                                    <button type="button" id="add-input" class="btn btn-success btn-sm">+ Add </button>

                                    <br>

                                    <button class="btn btn-sm btn-primary mt-3 mb-4" type="submit">Submit</button>

                                </form>

                            </div>

                            @if ($training->img__array !== null)
                                <div class="row mb-4">
                                    <b class="mb-3">Uploaded evidences</b>
                                    @foreach ($training->img__array as $one)
                                        <div class="col-lg-2">
                                            <img src="{{ url('') }}/{{ $one }}" alt=""
                                                style="max-width:90px;">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <b class="mt-3">Entered Key Points :</b>

                            @if ($training->points__array !== null)
                                @foreach ($training->points__array as $key => $point)
                                    @php

                                        $keyy = $key + 1;

                                    @endphp

                                    <div class="d-flex mb-3 align-items-center ">

                                        <p class="mb-0 me-2" id="text_{{ $key }}"> {{ $keyy }}.
                                            {{ $point }} </p>

                                        <a class=" btn p-1 text-danger " href="{{ route('remove_point') }}"
                                            onclick="event.preventDefault();document.getElementById('textform_{{ $key }}').submit();">
                                            X </a>

                                        <form id="textform_{{ $key }}" action="{{ route('remove_point') }}"
                                            method="get">

                                            <input type="hidden" name="key" value="{{ $key }}">

                                            <input type="hidden" value="{{ $training->id }}" name="trainingId">



                                        </form>



                                    </div>
                                @endforeach
                            @endif



                            <div class="text-center">

                                {{-- <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a> --}}

                                <a class="btn btn-success pt-1 pb-1"
                                    href="{{ route('post.complete.training', $training->id) }}" {{-- onclick="event.preventDefault(); document.getElementById('complete-form').submit();" --}}>

                                    Complete Training </a>

                                {{-- <form id="complete-form" action="{{ route('post.complete.training') }}" method="post" class="d-none">

                                @csrf

                                <input type="hidden" value="{{ $training->id }}" name="trainingId">

                            </form> --}}

                            </div>



                        </div>



                    </div>

                </div>

            </div>

        </div>





    @endsection











    @push('js')
        <script>
            document.getElementById("fileInput").addEventListener("change", function() {
                const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
                const files = this.files;
                let invalidFiles = [];

                for (let i = 0; i < files.length; i++) {
                    if (!allowedTypes.includes(files[i].type)) {
                        invalidFiles.push(files[i].name);
                    }
                }

                if (invalidFiles.length > 0) {
                    alert("Invalid file(s) detected: " + invalidFiles.join(", ") +
                        "\nOnly JPG, JPEG, and PNG files are allowed.");
                    this.value = ""; // Clear the invalid file selection
                }
            });
        </script>
        <script>
            $(document).ready(function() {



                new DataTable('#example');



            });



            VirtualSelect.init({

                ele: '#select-attendees',





            });



            VirtualSelect.init({

                ele: '#select-members'

            });





            $(document).ready(function() {

                // Add input fields on plus button click

                $("#add-input").click(function() {

                    $("#input-fields").append(
                        '<div class="form-group"><input type="text" name="input[]" class="form-control mb-3" placeholder="Enter text"></div>'
                    );

                });

            });
        </script>


        <script>
            // Add event listeners for back and forward buttons
            document.getElementById('backButton').addEventListener('click', function() {
                window.history.back(); // Navigate to the previous page in history
            });

            document.getElementById('forwardButton').addEventListener('click', function() {
                window.history.forward(); // Navigate to the next page in history
            });
        </script>
    @endpush
