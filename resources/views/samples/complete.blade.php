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

                    <div class="mb-5">

                        <h3>Sample Details</h3>

                    </div>



                    <div class=" d-block align-items-center justify-content-between mb-9">

                        <div class="row">

                            <div class="col-md-10">

                                <div class="row">



                                    <div class="mb-3 col-md-6">

                                        <p><strong>Subject :</strong> {{ $sample->name }}</p>

                                    </div>

                                    <div class="mb-3 col-md-6">

                                        <p><strong>Start Date :</strong> @php

                                            $date = date('F j, Y  H:i A', strtotime($sample->date));

                                        @endphp

                                            {{ $date }}</p>

                                    </div>

                                    <div class="mb-3 col-md-6">

                                        <p><strong>Client :</strong> {{ $client->organisation_name }}</p>

                                    </div>

                                    <div class="mb-3 col-md-6">

                                        <p><strong>Location :</strong> {{ $sample->location }}</p>

                                    </div>



                                    <div class="mb-3 col-md-6">

                                        <p><strong>Quantity : </strong> {{ $sample->quantity }} </p>

                                    </div>



                                    <div class="mb-3 col-md-6">

                                        <p><strong>Sample Type :</strong>

                                            @if ($sample->type == 1)
                                                Food
                                            @elseif($sample->type == 2)
                                                Water
                                            @else
                                                Swad
                                            @endif

                                        </p>

                                    </div>

                                    <div class="mb-3 col-md-6">

                                        <p><strong>Weight : </strong> {{ $sample->weight }}</p>

                                    </div>

                                    <div class="mb-3 col-md-6">

                                        <p><strong>Temperature : </strong> {{ $sample->temperature }} °C</p>

                                    </div>



                                    <div class="mb-3 col-md-6">

                                        <p><strong>Parameters : </strong>

                                            @foreach ($param as $p)
                                                <span
                                                    style="    background-color: #d6e8f3;

                                        display: inline-block;

                                        padding: 7px;

                                        border-radius: 20px;color: #007ef9;">{{ $p->name }}</span>
                                            @endforeach

                                        </p>

                                    </div>

                                    <div class="mb-3 col-md-6">

                                        <p><strong>Amount : </strong> ₹ {{ $sample->amount }}</p>

                                    </div>



                                </div>

                            </div>





                        </div>



                        <div>

                            <div class="mb-4">

                                <form action="{{ route('sample.images') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" value="{{ $sample->id }}" name="sampleId">



                                    <input type="file" class="form-control mb-3" name="evidences[]" multiple
                                        accept=".jpeg, .jpg, .png" onchange="validateFiles(this)">







                                    <p>Enter Sample Key Points Below ( Other than Sample Topic)</p>

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

                        </div>



                        @if ($sample->points !== null)
                            <b class="mt-3">Entered Key Points :</b>



                            @foreach ($sample->points as $key => $point)
                                @php

                                    $keyy = $key + 1;

                                @endphp

                                <div class="d-flex mb-3 align-items-center ">

                                    @if ($point !== null || $point !== 'null')
                                        <p class="mb-0 me-2" id="text_{{ $key }}"> {{ $keyy }}.
                                            {{ $point }} </p>

                                        <a class=" btn p-1 text-danger " href="{{ route('remove_sample_point') }}"
                                            onclick="event.preventDefault();document.getElementById('textform_{{ $key }}').submit();">
                                            X </a>

                                        <form id="textform_{{ $key }}"
                                            action="{{ route('remove_sample_point') }}" method="get">

                                            <input type="hidden" name="key" value="{{ $key }}">

                                            <input type="hidden" value="{{ $sample->id }}" name="sampleId">



                                        </form>
                                    @endif

                                </div>
                            @endforeach
                        @endif



                        <div class="text-center">

                            <a class="btn btn-success pt-0 pb-0" href="{{ route('post.complete.sample', $sample->id) }}"
                                {{-- onclick="event.preventDefault(); document.getElementById('completeSample').submit();" --}}>

                                Complete Sample </a>

                            {{-- <form id="completeSample" action="{{ route('post.complete.sample') }}" method="post" class="d-none">

                                @csrf

                                <input type="hidden" value="{{ $sample->id }}" name="sampleId">

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
        function validateFiles(input) {
            const allowedExtensions = ['jpeg', 'jpg', 'png'];
            const maxSize = 3 * 1024 * 1024; // 3MB in bytes
            const files = input.files;

            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                let fileExtension = file.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    alert("Only JPEG, JPG, and PNG files are allowed.");
                    input.value = ""; // Clear the input
                    return;
                }

                if (file.size > maxSize) {
                    alert("File size must not exceed 3MB.");
                    input.value = ""; // Clear the input
                    return;
                }
            }
        }
    </script>
    <script>
        $(document).ready(function() {







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
@endpush
