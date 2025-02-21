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



            width: 1095px !important;



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

                    <div style="margin-bottom: 15px;">
                        <div class="d-flex justify-content-between items-center">
                            <button id="backButton" class="btn btn-primary">Back</button>
                            <button id="forwardButton" class="btn btn-secondary">Forward</button>
                        </div>
                    </div>


                    <div>



                        <h3>Update Training Details</h3>



                    </div>



                    @if (\Session::has('success'))
                        <div class="alert alert-success">







                            {!! \Session::get('success') !!}







                        </div>
                    @endif



                    @if (\Session::has('error'))
                        <div class="alert alert-danger">







                            {!! \Session::get('error') !!}







                        </div>
                    @endif



                    <div class=" d-block align-items-center justify-content-between mb-9">



                        <form action="{{ route('edit.training') }}" method="post" enctype="multipart/form-data">



                            @csrf



                            <div class="row">



                                <input type="hidden" name="trainingId" value="{{ $training->id }}">







                                <div class="mb-3 col-md-6">



                                    <label class="form-label">Training topic <span class="text-danger">*</span></label>



                                    <input type="text" class="form-control" name="topic" value="{{ $training->topic }}"
                                        required>



                                </div>











                                <div class="mb-3 col-md-6">



                                    <label class="form-label">Audit start Date<span class="text-danger">*</span></label>



                                    <input type="datetime-local" class="form-control" name="audit_start_date"
                                        {{ $training->audit_start_date }} required>



                                </div>







                                <div class="mb-3 col-md-6">



                                    <label class="form-label">Location <span class="text-danger">*</span></label>



                                    <input type="text" class="form-control" name="location"
                                        value="{{ $training->location }}" required>



                                </div>







                                <div class="mb-3 col-md-6">



                                    <label class="form-label">Amount <span class="text-danger">*</span></label>



                                    <input type="number" class="form-control" name="amount"
                                        value="{{ $training->amount }}" required>



                                </div>







                                <div class=" mb-3 col-md-4">



                                    <label class="form-label" for="">Select client</label>







                                    <select class="form-select" name="client" id="">



                                        @foreach ($clients as $c)
                                            <option value="{{ $c->id }}">{{ $c->organisation_name }} </option>
                                        @endforeach



                                    </select>



                                </div>







                                <div class="mb-3 col-md-4">







                                    <label class="form-label" for="">Select members</label>



                                    <select id="select-members" name="members" placeholder="Select" data-search="true"
                                        data-silent-initial-value-set="true">



                                        @foreach ($users as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach



                                    </select>







                                </div>







                                <div class="mb-3 col-md-4">







                                    <label class="form-label" for="">Select attendees</label>



                                    <select id="select-attendees" multiple name="attendees" placeholder=" Select"
                                        data-search="true" data-silent-initial-value-set="true">



                                        @foreach ($attendees as $aten)
                                            <option value="{{ $aten->id }}">{{ $aten->fname }} {{ $aten->lname }}
                                            </option>
                                        @endforeach



                                    </select>







                                </div>







                                <div class="modal-footer">



                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}



                                    <button type="submit" id="formSubmission" class="btn btn-primary">ADD</button>



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
    <script>
        $(document).ready(function() {















        });







        VirtualSelect.init({



            ele: '#select-attendees',











        });







        VirtualSelect.init({



            ele: '#select-members'



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
