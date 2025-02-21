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







        .option a {



            width: -webkit-fill-available;



        }







        table {



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









        /* message modal  */

        /* Modal container */

        .modal {

            display: none;

            position: fixed;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            background-color: rgba(0, 0, 0, 0.5);

        }



        /* Modal content */

        .modal-content {

            background-color: #fff;

            margin: 15% auto;

            padding: 20px;

            border: 1px solid #888;

            /* width: 24%; */

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



                    @if (\Session::has('success'))
                        <div class="alert alert-success">



                            <ul>



                                <li>{!! \Session::get('success') !!}



                                </li>



                            </ul>



                        </div>
                    @endif



                    @if (\Session::has('error'))
                        <div class="alert alert-danger">



                            <ul>



                                <li>{!! \Session::get('error') !!}



                                </li>



                            </ul>



                        </div>
                    @endif



                    <div>


                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                                data-bs-target="#sampleModal">



                                <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Schedule sample



                            </button>



                            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                                data-bs-target="#paraModal">



                                <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add Parameter



                            </button>
                        @endif


                    </div>



                    <div class=" d-block align-items-center justify-content-between mb-9"
                        style="overflow-x: auto;height: 60vh;">











                        <div class="p-5 bg-white rounded shadow mb-5">



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



                            <div class="tab-content" id="ex2-content">



                                {{-- UPCOMING  --}}



                                <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel"
                                    aria-labelledby="ex3-tab-1">



                                    <table id="myTable" class="display">



                                        <thead>



                                            <tr>



                                                <th style="display: none"></th>



                                                <th>Sample Name</th>



                                                <th>Sample Coll. Date</th>



                                                <th>Location </th>



                                                <th>Amount</th>







                                                <th></th>







                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach ($upsamples as $train)
                                                <tr>



                                                    <td style="display: none">{{ $train->id }}</td>



                                                    <td>{{ $train->name }} </td>



                                                    <td>@php

                                                        $date = date('F j, Y  H:i A', strtotime($train->date));

                                                    @endphp



                                                        {{ $date }}



                                                    </td>



                                                    <td>{{ $train->location }}</td>



                                                    <td class=" ">
                                                        @if (Auth::user()->role == 1)
                                                            ₹ {{ $train->amount }}
                                                    </td>
                                            @endif





                                            <td>



                                                <div style="    position: relative;">



                                                    <i class="fa-solid fa-ellipsis-vertical btn popupButton"></i>



                                                    <div id="popup" class="popup">



                                                        <div class="option d-flex p-1">



                                                            <a class="btn pt-0 pb-0" href="{{ route('view.sample') }}"
                                                                onclick = "event.preventDefault(); document.getElementById('view-sample{{ $train->id }}').submit();">



                                                                <i class="fa-regular fa-file-lines"></i> View </a>



                                                            <form id="view-sample{{ $train->id }}"
                                                                action="{{ route('view.sample') }}" method="get"
                                                                class="d-none">



                                                                @csrf



                                                                <input type="hidden" name="sampleId"
                                                                    value="{{ $train->id }}">



                                                            </form>



                                                        </div>







                                                        {{-- <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0" href="{{ route('get.edit.training', $train->id) }}"   >



                                                                    <i class="fa-solid fa-pen-to-square"></i> Edit </a>                                                    



                                                                </div> --}}











                                                        <div class="option d-flex p-1">



                                                            <a class="btn pt-0 pb-0" href="{{ route('delete.sample') }}"
                                                                onclick = "event.preventDefault(); document.getElementById('delete-sample{{ $train->id }}').submit();">



                                                                <i class="fa-solid fa-pen-to-square"></i> Delete </a>



                                                            <form id="delete-sample{{ $train->id }}"
                                                                action="{{ route('delete.sample') }}" method="get"
                                                                class="d-none">



                                                                @csrf



                                                                <input type="hidden" name="sampleId"
                                                                    value="{{ $train->id }}">



                                                            </form>



                                                        </div>







                                                    </div>



                                                </div>















                                            </td>







                                            </tr>
                                            @endforeach



                                        </tbody>



                                    </table>



                                </div>



                                {{-- UPCOMING  --}}







                                {{-- INPROGRESS  --}}



                                <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">



                                    <table id="inpTable" class="display">



                                        <thead>



                                            <tr>



                                                <th style="display: none"></th>



                                                <th>Sample Name</th>



                                                <th>Sample Coll. Date</th>



                                                <th>Location </th>



                                                <th>Amount</th>







                                                <th></th>







                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach ($insamples as $train)
                                                <tr>



                                                    <td style="display: none">{{ $train->id }}</td>



                                                    <td>{{ $train->name }} </td>



                                                    <td>@php

                                                        $date = date('F j, Y  H:i A', strtotime($train->date));

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
                                                                        href="{{ route('complete.sample.get') }}"
                                                                        onclick = "event.preventDefault(); document.getElementById('complete-sample{{ $train->id }}').submit();">



                                                                        <i class="fa-regular fa-file-lines"></i> View </a>



                                                                    <form id="complete-sample{{ $train->id }}"
                                                                        action="{{ route('complete.sample.get') }}"
                                                                        method="get" class="d-none">



                                                                        @csrf



                                                                        <input type="hidden" name="sampleId"
                                                                            value="{{ $train->id }}">



                                                                    </form>



                                                                </div>







                                                                {{-- <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0" href="{{ route('get.edit.training', $train->id) }}"   >



                                                                    <i class="fa-solid fa-pen-to-square"></i> Edit </a>                                                    



                                                                </div> --}}











                                                                <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('delete.sample') }}"
                                                                        onclick = "event.preventDefault(); document.getElementById('delete-sample{{ $train->id }}').submit();">



                                                                        <i class="fa-solid fa-pen-to-square"></i> Delete
                                                                    </a>



                                                                    <form id="delete-sample{{ $train->id }}"
                                                                        action="{{ route('delete.sample') }}"
                                                                        method="get" class="d-none">



                                                                        @csrf



                                                                        <input type="hidden" name="sampleId"
                                                                            value="{{ $train->id }}">



                                                                    </form>



                                                                </div>







                                                            </div>



                                                        </div>















                                                    </td>







                                                </tr>
                                            @endforeach



                                        </tbody>



                                    </table>



                                </div>



                                {{-- INPROGRESS  --}}







                                {{-- COMPLETED  --}}



                                <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">



                                    <table id="compTable" class="display">



                                        <thead>



                                            <tr>



                                                <th style="display: none"></th>



                                                <th>Sample Name</th>



                                                <th>Sample Coll. Date</th>



                                                <th>Location </th>



                                                <th>Amount</th>







                                                <th></th>







                                            </tr>



                                        </thead>



                                        <tbody>



                                            @foreach ($cmsamples as $train)
                                                <tr>



                                                    <td style="display: none">{{ $train->id }}</td>



                                                    <td>{{ $train->name }} </td>



                                                    <td>@php

                                                        $date = date('F j, Y  H:i A', strtotime($train->date));

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
                                                                    <a class="btn pt-0 pb-0" href="javascript:void(0)"
                                                                        onclick="previewSamplePDF('{{ route('downlaod.sample.pdf', ['sampleId' => $train->id]) }}')">
                                                                        <i class="fa-regular fa-file-lines"></i> Report
                                                                    </a>
                                                                </div>








                                                                {{-- <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0" href="{{ route('get.signature.sample',['sampleId'=> $train->id]) }}"   >



                                                                        <i class="fa-solid fa-upload"></i> Upload Signatures </a>                                                    



                                                                </div> --}}











                                                                <div class="option d-flex p-1">



                                                                    <a class="btn pt-0 pb-0"
                                                                        href="{{ route('delete.sample') }}"
                                                                        onclick = "event.preventDefault(); document.getElementById('delete-sample{{ $train->id }}').submit();">



                                                                        <i class="fa-solid fa-pen-to-square"></i> Delete
                                                                    </a>



                                                                    <form id="delete-sample{{ $train->id }}"
                                                                        action="{{ route('delete.sample') }}"
                                                                        method="get" class="d-none">



                                                                        @csrf



                                                                        <input type="hidden" name="sampleId"
                                                                            value="{{ $train->id }}">



                                                                    </form>



                                                                </div>







                                                            </div>



                                                        </div>















                                                    </td>







                                                </tr>
                                            @endforeach



                                        </tbody>



                                    </table>



                                </div>



                                {{-- COMPLETED  --}}







                            </div>



                        </div>































                    </div>







                </div>



            </div>



        </div>



    </div>
@endsection























@push('js')







    <div class="modal fade" id="sampleModal" tabindex="-1" aria-labelledby="sampleModalLabel" aria-hidden="true">



        <div class="modal-dialog">



            <div class="modal-content">



                <div class="modal-header">



                    <h1 class="modal-title fs-5" id="sampleModalLabel">Add new sample</h1>



                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body">



                    <div id="overlay" style="display: none;">



                        <div id="loader"></div>



                    </div>



                    <form action="{{ route('store.sample') }}" method="post" enctype="multipart/form-data">



                        @csrf



                        <div class="row">











                            <div class="mb-3 col-md-4">



                                <label class="form-label">Name of the sample <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="name" required>



                            </div>



















                            <div class="mb-3 col-md-4">



                                <label class="form-label">Sample selection date<span class="text-danger">*</span></label>



                                <input type="datetime-local" class="form-control" name="date" required>



                            </div>







                            <div class="mb-3 col-md-4">



                                <label class="form-label">Location <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="location" required>



                            </div>







                            {{-- <div class="mb-3 col-md-4">



                            <label class="form-label">Sample type <span class="text-danger">*</span></label>



                            <input type="text" class="form-control" name="type" required>



                        </div> --}}







                            <div class=" mb-3 col-md-4">



                                <label class="form-label">Sample type</label>







                                <select class="form-select" name="type" id="">



                                    <option value="1">Food</option>



                                    <option value="2">Water</option>



                                    <option value="3">Swad</option>







                                </select>



                            </div>







                            <div class="mb-3 col-md-4">



                                <label class="form-label">Sample temperature (°C)<span
                                        class="text-danger">*</span></label>



                                <input type="number" class="form-control" name="temperature" required>



                            </div>







                            <div class="mb-3 col-md-4">



                                <label class="form-label">Sample weight <span class="text-danger">*</span></label>



                                <input type="number" class="form-control" name="weight" required>



                            </div>







                            <div class="mb-3 col-md-4">



                                <label class="form-label">Sample quantity <span class="text-danger">*</span></label>



                                <input type="number" class="form-control" name="quantity" required>



                            </div>







                            <div class="mb-3 col-md-4">



                                <label class="form-label">Amount<span class="text-danger">*</span></label>



                                <input type="number" class="form-control" name="amount" required>



                            </div>







                            <div class=" mb-3 col-md-4">



                                <label class="form-label">Select client</label>







                                <select class="form-select" name="client" id="">



                                    @foreach ($clients as $c)
                                        <option value="{{ $c->id }}">{{ $c->organisation_name }} </option>
                                    @endforeach







                                </select>



                            </div>







                            <div class="mb-3 col-md-4">







                                <label class="form-label">Select members</label>



                                <select id="select-members" multiple name="members" placeholder=" Select"
                                    data-search="true" data-silent-initial-value-set="true">



                                    @foreach ($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach



                                </select>







                            </div>







                            <div class="mb-3 col-md-4">







                                <label class="form-label">Select parameters</label>



                                <select id="select-attendees" multiple name="parameters" placeholder=" Select"
                                    data-search="true" data-silent-initial-value-set="true">



                                    @foreach ($parameters as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
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







    <div class="modal fade" id="paraModal" tabindex="-1" aria-labelledby="paraModalLabel" aria-hidden="true">



        <div class="modal-dialog">



            <div class="modal-content">



                <div class="modal-header">



                    <h1 class="modal-title fs-5" id="paraModalLabel">Add Parameter</h1>



                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body">



                    <div id="overlay" style="display: none;">



                        <div id="loader"></div>



                    </div>



                    <form action="{{ route('store.parameter') }}" method="post" enctype="multipart/form-data">



                        @csrf



                        <div class="row">











                            <div class="mb-3 col-md-12">



                                <label class="form-label">Name of the parameter <span class="text-danger">*</span></label>



                                <input type="text" class="form-control" name="name" required>



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







    <div id="messageModal" class="modal">

        <div class="modal-content">

            <span class="close" id="closeModal">&times;</span>

            <b>Report generation may take few seconds. Please wait.</b>

        </div>

    </div>

    <!-- Modal for Preview -->
    <div id="samplePdfPreviewModal" class="modal fade" tabindex="-1" aria-labelledby="samplePdfPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="samplePdfPreviewModalLabel">PDF Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="samplePdfPreviewContent">
                    <!-- PDF pages will be rendered here -->
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('keydown', function(event) {
            if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'p') {
                event.preventDefault();
            } else if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 's') {
                event.preventDefault();
            } else if (event.key === 'S' && event.shiftKey && event.metaKey) {
                event.preventDefault();
            } else if (event.code === 'PrintScreen') {
                event.preventDefault();
            }
        });
    </script>


    <script>
        $(document).ready(function() {







            $('#myTable').DataTable({



                order: [
                    [0, 'desc']
                ]



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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>
    <script>
        async function previewSamplePDF(pdfUrl) {
            const content = document.getElementById('samplePdfPreviewContent');
            content.innerHTML = '<p>Loading...</p>';

            try {
                const response = await fetch(pdfUrl);
                if (!response.ok) throw new Error('Failed to load PDF');

                const blob = await response.blob();
                const objectURL = URL.createObjectURL(blob);

                pdfjsLib.GlobalWorkerOptions.workerSrc =
                    "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.worker.min.js";

                const loadingTask = pdfjsLib.getDocument(objectURL);
                const pdf = await loadingTask.promise;

                let imagesHTML = "";

                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    const page = await pdf.getPage(pageNum);
                    const scale = 1.5;
                    const viewport = page.getViewport({
                        scale
                    });

                    const canvas = document.createElement("canvas");
                    const context = canvas.getContext("2d");
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    await page.render({
                        canvasContext: context,
                        viewport
                    }).promise;

                    const imgData = canvas.toDataURL("image/png");
                    imagesHTML += `<img src="${imgData}" class="img-fluid mb-2" style="width:100%;">`;
                }

                content.innerHTML = imagesHTML;

                const modal = new bootstrap.Modal(document.getElementById('samplePdfPreviewModal'));
                modal.show();
            } catch (error) {
                console.error('Error loading PDF:', error);
                content.innerHTML = '<p>Error loading content. Please try again.</p>';
            }
        }
    </script>

@endpush
