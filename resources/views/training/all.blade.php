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















        .tablee {



            width: 1095px !important;



        }







        .nav-tabs .nav-link {







            background: #dbdbdb;



            border-radius: 0px;



            color: black;



        }







        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {



            color: #fff !important;



            background-color: #5d87ff !important;



            border-color: var(--bs-nav-tabs-link-active-border-color);



        }







        @media only screen and (max-width: 485px) {



            .nav-tabs div {



                width: -webkit-fill-available;



            }



        }





        /* Modal content */

        .modal-content {

            background-color: #fff;

            margin: 15% auto;

            padding: 20px;

            border: 1px solid #888;

            width: auto;

            position: relative;

        }



        /* Close button */

        .close {

            color: #aaa;

            position: absolute;

            top: 0;

            right: 0;

            font-size: 20px;

            padding: 10px;

            cursor: pointer;

        }



        .close:hover {

            color: red;

        }
    </style>
@endpush



@section('content')
    <div class="row">



        <div class="col-lg-12 d-flex align-items-strech">



            <div class="card w-100">



                <div class="card-body">



                    <div>


                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                                data-bs-target="#trainingModal">



                                <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Schedule training



                            </button>
                        @endif



                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                            data-bs-target="#attendeeModal">



                            <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add new attendee



                        </button>
                        {{-- {{ dd($attendees) }} --}}
                        <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">



                            <i class="fa-solid fa-trash" style="color: #f9f9f9"></i>&nbsp; Delete attendee



                        </button>



                    </div>







                    <div class=" d-block align-items-center justify-content-between mb-9" style="overflow-x: auto;">



                        @if (\Session::has('success'))
                            <div class="alert alert-success">



                                <ul>



                                    <li>{!! \Session::get('success') !!} </li>



                                </ul>



                            </div>
                        @endif



                        @if (\Session::has('error'))
                            <div class="alert alert-danger">



                                <ul>



                                    <li>{!! \Session::get('error') !!} </li>



                                </ul>



                            </div>
                        @endif



                        <div class="p-1 bg-white rounded shadow mb-5">



                            <div class="row d-flex">



                                <ul class="nav nav-tabs nav-justified mb-3 justify-content-center" id="ex1"
                                    role="tablist">



                                    <div class="col-md-4 col-sm-12">



                                        <li class="nav-item" role="presentation">



                                            <a class="nav-link active" id="ex3-tab-1" data-bs-toggle="tab"
                                                href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1"
                                                aria-selected="true">Upcoming</a>



                                        </li>



                                    </div>



                                    <div class="col-md-4 col-sm-12">



                                        <li class="nav-item" role="presentation">



                                            <a class="nav-link" id="ex3-tab-2" data-bs-toggle="tab" href="#ex3-tabs-2"
                                                role="tab" aria-controls="ex3-tabs-2" aria-selected="false">In Progress
                                            </a>



                                        </li>



                                    </div>



                                    <div class="col-md-4 col-sm-12">



                                        <li class="nav-item" role="presentation">



                                            <a class="nav-link" id="ex3-tab-3" data-bs-toggle="tab" href="#ex3-tabs-3"
                                                role="tab" aria-controls="ex3-tabs-3"
                                                aria-selected="false">Completed</a>



                                        </li>



                                    </div>



                                </ul>



                            </div>



                            <div class="tab-content" id="ex2-content" style="    overflow-x: auto;">



                                <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel"
                                    aria-labelledby="ex3-tab-1">



                                    <table id="myTable" class="display tablee">



                                        <thead>



                                            <tr>



                                                <th style="display: none"></th>



                                                <th>Training topic</th>



                                                <th> Start date</th>



                                                <th>Location </th>



                                                <th>Amount</th>







                                                <th></th>







                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach ($uptrainings as $train)
                                                <tr>



                                                    <td style="display: none">{{ $train->id }}</td>



                                                    <td>{{ $train->topic }} </td>



                                                    <td>@php

                                                        $date = date(
                                                            'F j, Y  H:i A',
                                                            strtotime($train->audit_start_date),
                                                        );

                                                    @endphp



                                                        {{ $date }}



                                                    </td>



                                                    <td>{{ $train->location }}</td>



                                                    <td>
                                                        @if (Auth::user()->role == 1)
                                                            ₹ {{ $train->amount }}
                                                        @endif
                                                    </td>







                                                    <td>



                                                        <div style="    position: relative;">



                                                            <i class="fa-solid fa-ellipsis-vertical btn popupButton"></i>



                                                            <div id="popup" class="popup">



                                                                <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('view.training') }}"
                                                                        onclick="event.preventDefault(); document.getElementById('view-training{{ $train->id }}').submit();">



                                                                        <i class="fa-regular fa-file-lines"></i> View </a>



                                                                    <form id="view-training{{ $train->id }}"
                                                                        action="{{ route('view.training') }}" method="get"
                                                                        class="d-none">







                                                                        <input type="hidden" name="trainingId"
                                                                            value="{{ $train->id }}">



                                                                    </form>



                                                                </div>







                                                                <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('get.edit.training', $train->id) }}">



                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                                                                </div>







                                                                {{-- <div class="option d-flex p-1">



                                                                                                    <a class="btn pt-0 pb-0"
                                                                                                        href="{{ route('get.edit.training') }}"
                                                                                                        onclick="event.preventDefault(); document.getElementById('edit-training').submit();">



                                                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                                                                                                    <form id="edit-training"
                                                                                                        action="{{ route('get.edit.training') }}" method="get"
                                                                                                        class="d-none">



                                                                                                        @csrf



                                                                                                        <input type="hidden" name="trainingId"
                                                                                                            value="{{ $train->id }}">



                                                                                                    </form>



                                                                                                </div> --}}


                                                                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                                                    <div class="option d-flex p-1">



                                                                        <a class="btn pt-0 pb-0"
                                                                            href="{{ route('delete.training') }}"
                                                                            onclick="event.preventDefault(); document.getElementById('delete-training{{ $train->id }}').submit();">



                                                                            <i class="fa-solid fa-pen-to-square"></i> Delete
                                                                        </a>



                                                                        <form id="delete-training{{ $train->id }}"
                                                                            action="{{ route('delete.training') }}"
                                                                            method="get" class="d-none">



                                                                            @csrf



                                                                            <input type="hidden" name="trainingId"
                                                                                value="{{ $train->id }}">



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



                                <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">



                                    <table id="inpTable" class="display tablee">



                                        <thead>



                                            <tr>



                                                <th style="display: none"></th>



                                                <th>Training topic</th>



                                                <th> Start date</th>



                                                <th>Location </th>



                                                <th>Amount</th>







                                                <th></th>







                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach ($inptrainings as $train)
                                                <tr>



                                                    <td style="display: none">{{ $train->id }}</td>



                                                    <td>{{ $train->topic }} </td>



                                                    <td>@php

                                                        $date = date(
                                                            'F j, Y  H:i A',
                                                            strtotime($train->audit_start_date),
                                                        );

                                                    @endphp



                                                        {{ $date }}



                                                    </td>



                                                    <td>{{ $train->location }}</td>



                                                    <td>
                                                        @if (Auth::user()->role == 1)
                                                            ₹ {{ $train->amount }}
                                                        @endif
                                                    </td>







                                                    <td>



                                                        <div style="    position: relative;">



                                                            <i class="fa-solid fa-ellipsis-vertical btn popupButton"></i>



                                                            <div id="popup" class="popup">



                                                                <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('get.complete.page') }}"
                                                                        onclick="event.preventDefault(); document.getElementById('get-complete{{ $train->id }}').submit();">



                                                                        <i class="fa-regular fa-file-lines"></i> View </a>



                                                                    <form id="get-complete{{ $train->id }}"
                                                                        action="{{ route('get.complete.page') }}"
                                                                        method="get" class="d-none">







                                                                        <input type="hidden" name="tId"
                                                                            value="{{ $train->id }}">



                                                                    </form>



                                                                </div>







                                                                <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('get.edit.training', $train->id) }}">



                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                                                                </div>







                                                                {{-- <div class="option d-flex p-1">



                                                                                                    <a class="btn pt-0 pb-0"
                                                                                                        href="{{ route('get.edit.training') }}"
                                                                                                        onclick="event.preventDefault(); document.getElementById('edit-training').submit();">



                                                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                                                                                                    <form id="edit-training"
                                                                                                        action="{{ route('get.edit.training') }}" method="get"
                                                                                                        class="d-none">



                                                                                                        @csrf



                                                                                                        <input type="hidden" name="trainingId"
                                                                                                            value="{{ $train->id }}">



                                                                                                    </form>



                                                                                                </div> --}}


                                                                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                                                    <div class="option d-flex p-1">



                                                                        <a class="btn pt-0 pb-0"
                                                                            href="{{ route('delete.training') }}"
                                                                            onclick="event.preventDefault(); document.getElementById('delete-training{{ $train->id }}').submit();">



                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                            Delete </a>



                                                                        <form id="delete-training{{ $train->id }}"
                                                                            action="{{ route('delete.training') }}"
                                                                            method="get" class="d-none">



                                                                            @csrf



                                                                            <input type="hidden" name="trainingId"
                                                                                value="{{ $train->id }}">



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



                                <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">



                                    <table id="compTable" class="display tablee">



                                        <thead>



                                            <tr>



                                                <th style="display: none"></th>



                                                <th>Training topic</th>



                                                <th> Start date</th>



                                                <th>Location </th>



                                                <th>Amount</th>







                                                <th></th>







                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach ($comptrainings as $train)
                                                <tr>



                                                    <td style="display: none">{{ $train->id }}</td>



                                                    <td>{{ $train->topic }} </td>



                                                    <td>@php

                                                        $date = date(
                                                            'F j, Y  H:i A',
                                                            strtotime($train->audit_start_date),
                                                        );

                                                    @endphp



                                                        {{ $date }}



                                                    </td>



                                                    <td>{{ $train->location }}</td>



                                                    <td>
                                                        @if (Auth::user()->role == 1)
                                                            ₹ {{ $train->amount }}
                                                        @endif
                                                    </td>







                                                    <td>



                                                        <div style="    position: relative;">



                                                            <i class="fa-solid fa-ellipsis-vertical btn popupButton"></i>



                                                            <div id="popup" class="popup">



                                                                <div class="option d-flex p-1">
                                                                    <!-- Download PDF Button -->
                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('downlaod.training.pdf') }}"
                                                                        onclick="event.preventDefault(); document.getElementById('view-training{{ $train->id }}').submit(); showCustomModal();">
                                                                        <i class="fa-regular fa-file-lines"></i> Report
                                                                    </a>

                                                                    <form id="view-training{{ $train->id }}"
                                                                        action="{{ route('downlaod.training.pdf') }}"
                                                                        method="get" class="d-none">
                                                                        @csrf
                                                                        <input type="hidden" name="trainingId"
                                                                            value="{{ $train->id }}">
                                                                    </form>


                                                                </div>

                                                                <div class="option d-flex p-1">
                                                                    <!-- Preview PDF Button -->
                                                                    <a class="btn pt-0 pb-0" href="javascript:void(0)"
                                                                        onclick="previewPDF('{{ route('downlaod.training.pdf', ['trainingId' => $train->id]) }}')">
                                                                        <i class="fa-regular fa-eye"></i> Preview
                                                                    </a>

                                                                </div>








                                                                {{-- <div class="option d-flex p-1">



                                                                                                    <a class="btn pt-0 pb-0"
                                                                                                        href="{{ route('get.signature.training',['trainingId'=> $train->id]) }}">



                                                                                                        <i class="fa-solid fa-upload"></i> Upload Signatures
                                                                                                    </a>



                                                                                                </div> --}}







                                                                {{-- <div class="option d-flex p-1">



                                                                                                    <a class="btn pt-0 pb-0"
                                                                                                        href="{{ route('get.edit.training') }}"
                                                                                                        onclick="event.preventDefault(); document.getElementById('edit-training').submit();">



                                                                                                        <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                                                                                                    <form id="edit-training"
                                                                                                        action="{{ route('get.edit.training') }}" method="get"
                                                                                                        class="d-none">



                                                                                                        @csrf



                                                                                                        <input type="hidden" name="trainingId"
                                                                                                            value="{{ $train->id }}">



                                                                                                    </form>



                                                                                                </div> --}}


                                                                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                                                    <div class="option d-flex p-1">



                                                                        <a class="btn pt-0 pb-0"
                                                                            href="{{ route('delete.training') }}"
                                                                            onclick="event.preventDefault(); document.getElementById('delete-training{{ $train->id }}').submit();">



                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                            Delete </a>



                                                                        <form id="delete-training{{ $train->id }}"
                                                                            action="{{ route('delete.training') }}"
                                                                            method="get" class="d-none">







                                                                            <input type="hidden" name="trainingId"
                                                                                value="{{ $train->id }}">



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



            </div>



        </div>



    </div>
@endsection























@push('js')



    {{-- ==================== Schedule training ================== --}}



    <div class="modal fade" id="trainingModal" tabindex="-1" aria-labelledby="trainingModalLabel" aria-hidden="true">



        <div class="modal-dialog">



            <div class="modal-content">



                <div class="modal-header">



                    <h1 class="modal-title fs-5" id="trainingModalLabel">Schedule training</h1>



                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body">



                    <div id="overlay" style="display: none;">



                        <div id="loader"></div>



                    </div>



                    <form action="{{ route('scheduleTraining') }}" method="post" enctype="multipart/form-data">



                        @csrf



                        <div class="row">











                            <div class="mb-3 col-md-6">



                                <label class="form-label">Training topic <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="topic" required>



                            </div>











                            <div class="mb-3 col-md-6">



                                <label class="form-label">Audit start Date<span class="text-danger">*</span></label>



                                <input type="datetime-local" class="form-control" name="audit_start_date" required>



                            </div>







                            <div class="mb-3 col-md-6">



                                <label class="form-label">Location <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="location" required>



                            </div>







                            <div class="mb-3 col-md-6">



                                <label class="form-label">Amount <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="amount" required>



                            </div>







                            <div class=" mb-3 col-md-4">



                                <label class="form-label">Select client</label>







                                <select class="form-select" name="client" id="" required>



                                    @foreach ($clients as $c)
                                        <option value="{{ $c->id }}">{{ $c->organisation_name }} </option>
                                    @endforeach



                                </select>



                            </div>







                            <div class="mb-3 col-md-4">







                                <label class="form-label">Select members</label>



                                <select id="select-members" name="members" data-search="true"
                                    data-silent-initial-value-set="true" required>
                                    <option value="">Select</option>
                                    @foreach ($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>







                            </div>







                            <div class="mb-3 col-md-4">







                                <label class="form-label">Select attendees</label>



                                <select id="select-attendees" multiple name="attendees" placeholder=" Select"
                                    data-search="true" data-silent-initial-value-set="true" required>



                                    @foreach ($attendees as $att)
                                        <option value="{{ $att->id }}">{{ $att->fname }} {{ $att->lname }}
                                        </option>
                                    @endforeach



                                </select>







                            </div>







                            <div class="modal-footer">



                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>



                                <button type="submit" id="formSubmission" class="btn btn-primary">ADD</button>



                            </div>



                        </div>



                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}



                    </form>







                </div>







            </div>



        </div>



    </div>











    {{-- ============= Add attendee modal ============ --}}



    <div class="modal fade" id="attendeeModal" tabindex="-1" aria-labelledby="attendeeModalLabel" aria-hidden="true">



        <div class="modal-dialog">



            <div class="modal-content">



                <div class="modal-header">



                    <h1 class="modal-title fs-5" id="attendeeModalLabel">Add new attendee</h1>



                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body">



                    <div id="overlay" style="display: none;">



                        <div id="loader"></div>



                    </div>



                    <form id="atten_store" action="{{ route('attendee.store') }}" method="post"
                        enctype="multipart/form-data">



                        @csrf



                        <div class="row">











                            <div class="mb-3 col-md-6">



                                <label class="form-label">First name <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="fname" required>



                            </div>



















                            <div class="mb-3 col-md-6">



                                <label class="form-label">Last name<span class="text-danger">*</span></label>



                                <input type="test" class="form-control" name="lname">



                            </div>







                            <div class="mb-3 col-md-6">



                                <label class="form-label">Email <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="email" required>



                            </div>







                            <div class="mb-3 col-md-6">



                                <label class="form-label">Designation <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="designation">



                            </div>







                            <div class="mb-3 col-md-6">



                                <label class="form-label">Contact number <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="contact">



                            </div>











                            <div class="modal-footer">



                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>



                                <button type="submit" id="formSubmission" class="btn btn-primary"
                                    onclick="event.preventDefault(); document.getElementById('atten_store').submit();toastr.success('Attendee added successfully!','Success');">ADD</button>



                            </div>



                        </div>



                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}



                    </form>







                </div>







            </div>



        </div>



    </div>



    <div id="messageModal" class="modal">

        <div class="modal-content" style="width: 24%">

            <span class="close" id="closeModal">&times;</span>

            <b>Report generation may take few seconds. Please wait.</b>

        </div>

    </div>

    <!-- Modal for Preview -->
    <div id="pdfPreviewModal" class="modal fade" tabindex="-1" aria-labelledby="pdfPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfPreviewModalLabel">PDF Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfPreviewIframe" src="" frameborder="0" width="100%"
                        height="500px"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <!-- Delete Attendee Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Attendee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendees as $attendee)
                                    <tr>
                                        <td>{{ $attendee->fname }} {{ $attendee->lname }}</td>
                                        <td>{{ $attendee->email }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger delete-attendee w-100"
                                                data-id="{{ $attendee->id }}">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".delete-attendee").forEach(button => {
                button.addEventListener("click", function() {
                    let attendeeId = this.getAttribute("data-id");

                    if (confirm("Are you sure you want to delete this attendee?")) {
                        fetch("{{ route('delete.attendees', ['id' => '__ID__']) }}".replace(
                                '__ID__', attendeeId), {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert("Attendee deleted successfully!");
                                    location.reload();
                                } else {
                                    alert("Error deleting attendee!");
                                }
                            })
                            .catch(error => console.error("Error:", error));
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {











            $('#myTable').DataTable({



                order: [



                    [0, 'desc']



                ],







            });











            $('#inpTable').DataTable({



                order: [
                    [0, 'desc']
                ]



            });











            $('#compTable').DataTable({



                order: [
                    [0, 'desc']
                ]



            });







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







        VirtualSelect.init({



            ele: '#select-attendees',











        });







        VirtualSelect.init({



            ele: '#select-members'



        });





        function showCustomModal() {

            // Add your code to display the modal here

            // For example, you can use the code to show your existing modal

            const messageModal = document.getElementById('messageModal');

            messageModal.style.display = 'block';

        }
    </script>


    <script>
        function previewPDF(pdfUrl) {
            // Set the iframe source to the PDF URL
            document.getElementById('pdfPreviewIframe').src = pdfUrl;

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('pdfPreviewModal'));
            modal.show();
        }
    </script>
@endpush
