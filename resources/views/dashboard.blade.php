@extends('layout.layout')
@push('css')
    <style>
        table.dataTable.display>tbody>tr.odd>.sorting_1,
        table.dataTable.order-column.stripe>tbody>tr.odd>.sorting_1 {
            box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.054);
            font-weight: 600;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            border: none !important;
        }

        table.dataTable.display>tbody>tr.even>.sorting_1,
        table.dataTable.order-column.stripe>tbody>tr.even>.sorting_1 {
            box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.019);
            font-weight: 600;
        }

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
            width: 13rem;
        }

        /* Styling for the popup options */
        .option {
            cursor: pointer;
            padding: 5px;
        }

        /* Select2 css  */
        .select2-container {
            min-width: 400px;
        }

        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }

        .select2-results__option[aria-selected=true]:before {
            font-family: fontAwesome;
            content: "\f00c";
            color: #fff;
            background-color: #f77750;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #fff;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eaeaeb;
            color: #272727;
        }

        .select2-container--default .select2-selection--multiple {
            margin-bottom: 10px;
        }

        .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-radius: 4px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #f77750;
            border-width: 2px;
        }

        .select2-container--default .select2-selection--multiple {
            border-width: 2px;
        }

        .select2-container--open .select2-dropdown--below {
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .select2-selection .select2-selection--multiple:after {
            content: 'hhghgh';
        }

        .selected_templates {
            border-color: blue;
            border-width: 2px;
        }

        #viewmytempModal {
            width: min(100%, 950px);
            margin: 0 auto;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgb(255, 255, 255);
            padding: 10px;
            display: none;
            z-index: 9999;
            position: absolute;
            right: 0;
            left: 0;
        }

        /* Replace these colors with your desired color stops */
        .progress-bar {
            /* background: linear-gradient(to right, red, yellow, green); */
            height: 2px;
            border-radius: 10px;
            margin: 4px;
            width: 100%;
            /* Ensure the container takes the full width */
        }

        .progress {
            height: 100%;
            border-radius: 8px;
        }

        .blurred {
            filter: blur(5px);
        }

        .pac-container {
            z-index: 100000;
        }
    </style>
@endpush
@section('content')
    {{-- <div class="row">
    <div class="col-lg-12 col-md-12">
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
        <div class="card w-100 mb-2">
            <div class="card-body p-0">
                <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('index') }}"> Clients</a>
            </div>
        </div>
    </div>
</div> --}}

    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    {{-- <a href="{{ route('index') }}" class="btn"><i class="fa-regular fa-circle-left"
                        style="font-size: x-large;"></i></a> --}}
                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                        {{-- <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp;Schedule an Audit
                    </button> --}}
                        <div class="d-flex justify-content-end mb-2">
                            <button class="btn btn-warning btn-sm" id="toggleButton">Hide Amount</button>
                        </div>
                    @endif
                    <div class="text-white bg-danger text-center fs-5 fw-semibold d-none" id="message_show ">
                        Audits limit reached
                    </div>
                    <div class=" d-block align-items-center justify-content-between mb-9" style="overflow-x: auto;">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Audit Index</th>
                                    <th>Audit name</th>
                                    <th>Assigned On</th>
                                    {{-- 
                    <th>Start on</th>
                    --}}
                                    {{-- 
                    <th>End on </th>
                    --}}
                                    {{-- 
                    <th>Audit Type</th>
                    --}}
                                    {{-- 
                    <th>Location</th>
                    --}}
                                    {{-- 
                    <th>Checklists</th>
                    --}}
                                    <th>Auditors </th>
                                    <th>Amount</th>
                                    {{-- 
                    <th>Auditing For</th>
                    --}}
                                    <th>Completion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($audits->isEmpty())
                                    <p> No Audits scheduled </p>
                                @else
                                    @foreach ($audits as $audit)
                                        <tr>
                                            <td>{{ $audit->audit_index }}</td>
                                            <td>{{ $audit->audit_name }} <br>
                                                {{-- @if ($audit->status == 2) --}}
                                                @if ($audit->completion == 100)
                                                    <span style="font-size: 10px"><b class="text-success">Completed</b>
                                                        at:{{ $audit->end }} {{ $audit->end_time }}</span>
                                                @else
                                                    <span style="font-size: 12px">In Progress</span>
                                                    <span style="font-size: 10px">Updated at:{{ $audit->start }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $audit->start }}</td>
                                            {{-- 
                    <td>{{ $audit->start }}</td>
                    --}}
                                            {{-- 
                    <td>{{ $audit->end }}</td>
                    --}}
                                            {{-- 
                    <td>{{ $audit->audit_type }}</td>
                    --}}
                                            {{-- 
                    <td>{{ $audit->location }}</td>
                    --}}
                                            {{-- 
                    <td>{{ $audit->checklists }}</td>
                    --}}
                                            <td>{{ $audit->auditor?->name }}</td>
                                            <td class="blurable">
                                                @if (Auth::user()->role == 1)
                                                    ₹ {{ $audit->amount }}
                                                @endif
                                            </td>
                                            {{-- 
                    <td>{{ $audit->auditing_for }}</td>
                    --}}
                                            <td>
                                                @if ($audit->completion <= 100)
                                                    {{ $audit->completion }}%
                                                    <div class="progress-bar">
                                                        <div class="progress" data-value="{{ $audit->completion }}"></div>
                                                    </div>
                                                @else
                                                    {{ $audit->completion }}%
                                                @endif
                                            </td>
                                            <td>
                                                <div style="position: relative;">
                                                    <i class="fa-solid fa-ellipsis-vertical btn popupButton"></i>
                                                    <div id="popup" class="popup">
                                                        {{-- @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                                        <div class="option d-flex p-2">
                                                            <a class="btn pt-0 pb-0" data-bs-toggle="modal"
                                                                data-bs-target="#auditModal{{ $audit->id }}">
                                                                <i class="fa-solid fa-book"></i> View more details </a>
                                                        </div>
                                                    @endif --}}
                                                        @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                                            @if ($audit->completion == 100)
                                                                {{-- 
                             <div class="option d-flex p-2">
                                <a class="btn pt-0 pb-0" target="_blank" href="{{ route('audit.report.view') }}" onclick="event.preventDefault(); document.getElementById('audit-report-view{{ $audit->id }}').submit();">
                                <i class="fa-solid fa-pen-to-square"></i> View Audit Report </a>
                                <form id="audit-report-view{{ $audit->id }}" action="{{ route('audit.report.view') }}" method="get" class="d-none">
                                   <input type="hidden" value="{{ $audit->id }}" name="auditId">
                                   <input type="hidden" value="{{ $client->id }}" name="cid">
                                   <input type="hidden" value="{{ \Auth::user()->id }}" name="auth_id">
                                </form>
                             </div>
                             --}}
                                                                {{-- <a href="{{ route('view.pdf') }}" target="_blank">Open PDF</a> --}}
                                                                {{-- 
                             <div class="option d-flex p-2">
                                <a class="btn pt-0 pb-0" target="_blank" href="{{ route('view.completed.pdf') }}" onclick="event.preventDefault(); document.getElementById('audit-pdf-view{{ $audit->id }}').submit();">
                                <i class="fa-solid fa-pen-to-square"></i> View Audit Report </a>
                                <form id="audit-pdf-view{{ $audit->id }}" action="{{ route('view.completed.pdf') }}" method="get" class="d-none">
                                   <input type="hidden" value="{{ $audit->id }}" name="auditId">
                                   <input type="hidden" value="{{ $client->id }}" name="cid">
                                   <input type="hidden" value="{{ \Auth::user()->id }}" name="auth_id">
                                </form>
                             </div>
                             --}}
                                                            @endif
                                                        @endif
                                                        {{-- 
                             <div class="option d-flex p-2">
                                <a class="btn pt-0 pb-0" href="{{ route('audit.report') }}" onclick="event.preventDefault(); document.getElementById('audit-report{{ $audit->id }}').submit();">
                                <i class="fa-solid fa-pen-to-square"></i> Downlaod Audit Report </a>
                                <form id="audit-report{{ $audit->id }}" action="{{ route('audit.report') }}" method="get" class="d-none">
                                   <input type="hidden" value="{{ $audit->id }}" name="auditId">
                                   <input type="hidden" value="{{ $client->id }}" name="cid">
                                </form>
                             </div>
                             --}}
                                                        {{-- Send certigo report  --}}
                                                        {{-- @if ($audit->status == 2)
                             <div class="option d-flex p-2">
                                <a class="btn pt-0 pb-0"
                                   href="{{ route('send.email') }}" onclick="event.preventDefault(); document.getElementById('audit-report-mail{{ $audit->id }}').submit();">
                                <i class="fa-solid fa-pen-to-square"></i> Send Audit Report </a>
                                <form id="audit-report-mail{{ $audit->id }}" action="{{ route('send.email') }}" method="get" class="d-none">
                                   <input type="hidden" value="{{ $audit->id }}" name="auditId">
                                   <input type="hidden" value="{{ $client->id }}" name="cid">
                                   <input type="hidden" value="{{ \Auth::user()->id }}" name="auth_id">
                                </form>
                             </div>
                             @else  --}}
                                                        {{-- Resume audit --}}
                                                        <div class="option d-flex p-2">
                                                            <a class="btn pt-0 pb-0" href="{{ route('resumeAudit') }}"
                                                                onclick="event.preventDefault(); document.getElementById('resume-audit{{ $audit->id }}').submit();">
                                                                <i class="fa-solid fa-pen-to-square"></i> Resume audit </a>
                                                            <form id="resume-audit{{ $audit->id }}"
                                                                action="{{ route('resumeAudit') }}" method="get"
                                                                class="d-none">
                                                                <input type="hidden" value="{{ $audit->id }}"
                                                                    name="auditId">
                                                                <input type="hidden" value="{{ $audit->client?->id }}"
                                                                    name="cid">
                                                            </form>
                                                        </div>
                                                        {{-- @endif --}}
                                                        @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                                            <div class="option d-flex p-2">
                                                                <a class="btn pt-0 pb-0" href="{{ route('removeAudit') }}"
                                                                    onclick="event.preventDefault(); document.getElementById('delete-audit{{ $audit->id }}').submit();toastr.success('Audit removed successfully!','Success');">
                                                                    <i class="fa-solid fa-trash-can"></i> Delete </a>
                                                                <form id="delete-audit{{ $audit->id }}"
                                                                    action="{{ route('removeAudit') }}" method="post"
                                                                    class="d-none">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $audit->id }}"
                                                                        name="auditId">
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script type='text/javascript'
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcaKZuOunzgmgbSf7E_Bmh4v0Do-rDw6E&libraries=places"></script>

    <script>
        $(document).ready(function() {
            var autoCompleteLocation = document.getElementById('autoCompleteLocation');
            new google.maps.places.Autocomplete(autoCompleteLocation);


            var updateIndustrialLocation = document.getElementById('updateIndustrialLocation');
            new google.maps.places.Autocomplete(updateIndustrialLocation);

            var updateLocation = document.getElementById('updateLocation');
            new google.maps.places.Autocomplete(updateLocation);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#myTableIndus').DataTable();


            $('table.dataTable tbody tr td:first-child').css('white-space', 'nowrap');

            // Open the popup when clicking on the ellipsis icon
            $(document).on('click', '.popupButton', function() {
                var popup = $(this).next('.popup');
                $('.popup').not(popup).hide();
                popup.toggle();
            });

            // Close the popup when clicking outside of it
            $(document).on('click', function(event) {
                if (!$(event.target).hasClass('popupButton') && !$(event.target).closest('.popup').length) {
                    $('.popup').hide();
                }
            });
// ==========================================================================================================================================
            var progressElements = $('.progress');
            console.log('Number of progress elements:', progressElements.length);
            progressElements.each(function() {
                console.log('Progress element:', this);
            });

            progressElements.each(function() {
                console.log(1);
                var value = $(this).data('value');
                console.log('Value:', value);
                console.log(typeof value);
                var maxVal = 100;
                var widthPercent = Math.min(Math.max(value, 0), maxVal);
                $(this).css('width', widthPercent + '%');
                var hue;
                if (value <= 33.333) {
                    hue = 0; // Red
                } else if (value < 99) {
                    hue = 30; // Orange
                } else {
                    hue = 120; // Green
                }
                var backgroundColor = 'hsl(' + hue + ', 100%, 50%)';
                $(this).css('background-color', backgroundColor);
            });

            const myDropdown = document.getElementById('temp_folder');



            const modal = document.getElementById('mytempModal');



            const modalSubmit = document.getElementById('modalSubmit');



            const selectedElementsDropdown = document.getElementById('selectedElements');







            // Event listener for select dropdown



            myDropdown.addEventListener('change', function() {



                if (this.value !== '') {







                    // console.log(this.value);



                    let folderID = this.value;



                    $.ajax({



                        url: "{{ route('tempsInFolder') }}",



                        method: "POST",



                        data: {



                            folderID: folderID







                        },



                        headers: {



                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                        },







                        success: function(response) {



                            var elementsContainer = document.getElementById("mytempModal");



                            var allTempInFold = document.getElementById("allTempInFold");







                            allTempInFold.innerHTML = "";



                            let resp = response.response;





                            resp.forEach(function(element) {



                                var formCheck = document.createElement("div");



                                formCheck.className = "fs-4 col-md-4 col-sm-12";



                                formCheck.innerHTML =
                                    "<input class='form-check-input fs-3 selected_templates' type='checkbox' value='" +
                                    element.id + "' name='temp_id'>&nbsp;" + element
                                    .template_name +
                                    "<button class='btn btn-sm viewTemBtn' data-tempid='" +
                                    element.id +
                                    "'><i class='fa-solid fa-eye' style='color: #6d2aea;'></i></button><br>";





                                allTempInFold.appendChild(formCheck);





                            });







                        }







                    });



                    modal.style.display = 'block'; // Open the modal



                }



            });







            // Event listener for modal submit button



            modalSubmit.addEventListener('click', function() {



                const selectedElements = document.querySelectorAll(
                    '#mytempModal input[type="checkbox"]:checked');



                // selectedElementsDropdown.innerHTML = ''; 







                // Add selected elements to the multi-select dropdown with cross marks



                selectedElements.forEach(function(element) {



                    var tem_id = element.value;







                    const option = document.createElement('option');



                    option.value = element.value;



                    option.style.backgroundColor = "aliceblue";



                    option.setAttribute('selected', 'selected');







                    option.text = element.nextSibling.nodeValue.trim();







                    // Create a span element with a cross mark



                    const crossMark = document.createElement('span');



                    crossMark.innerHTML = '&#10060;';



                    crossMark.classList.add('remove-element');







                    // Event listener to remove the selected element when the cross mark is clicked



                    option.addEventListener('click', function() {











                        $.ajax({



                            url: '{{ route('remSelTemp') }}',



                            method: 'POST',



                            data: {



                                tem_id: tem_id



                            },



                            headers: {



                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')



                            },



                            success: function(response) {







                            },



                            error: function(xhr, status, error) {



                                // Handle the error response



                            }



                        });


                        option.remove();



                    });











                    // Append the option and cross mark to the dropdown



                    option.appendChild(crossMark);



                    selectedElementsDropdown.add(option);



                });







                modal.style.display = 'none'; // Close the modal



            });















            // $("#viewTemBtn").on('click', function(){



            //     $('#viewmytempModal').css('display','block'); // Display the modal



            // });















            $('#auditScheduleform').on('submit', function(event) {



                event.preventDefault(); // Prevent default form submission











                var formData = $(this).serialize(); // Serialize form data







                $.ajax({



                    url: '{{ route('scheduleAudit') }}',



                    method: 'POST',



                    data: formData,



                    headers: {



                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                    },



                    success: function(response) {



                        // console.log(response.status);



                        if (response.status == 200) {



                            location.reload();







                        }



                        if (response.status == 400) {



                            // console.log("failure");



                            $('#message_show').removeClass('d-none');



                            $('#exampleModal').modal('hide');







                        }



                    },



                    error: function(xhr, status, error) {



                        // Handle the error response



                    }



                });



            });















            // Virtual select multi select dropdown 



            VirtualSelect.init({



                ele: '#multipleSelect'







            });
        });




        $(document).on('click', '.viewTemBtn', function() {



            let tempID = $(this).data("tempid");



            // console.log(tempID);



            var target = $("#template-data");



            target.empty();



            $.ajax({



                url: "{{ route('fillViewModal') }}",



                method: "POST",



                data: {



                    tempID: tempID



                },



                headers: {



                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                },



                success: function(response) {



                    let items = response.response;



                    let template = response.template;











                    // Create the HTML elements



                    var ulElement = $(
                        "<ul class='nav nav-pills mb-3' id='pills-tab' role='tablist'></ul>");



                    var divElement = $("<div class='tab-content' id='pills-tabContent'></div>");







                    items.forEach(function(item, index) {



                        var shortName = template.template_name;



                        var firstLetter = shortName.charAt(0);



                        var firstSpaceIndex = shortName.indexOf(" ");



                        var letterAfterSpace = shortName.charAt(firstSpaceIndex + 1);















                        var listItem = $(
                            `<li class='nav-item' role='presentation'><button class='nav-link ${index == 0 ? 'active' : ''}' id='pills-${item.id}-tab' data-bs-toggle='pill' data-bs-target='#pills-${item.id}' type='button' role='tab' aria-controls='pills-${item.id}' aria-selected='true'>${firstLetter}${letterAfterSpace}-${index+1}</button></li>`
                        );



                        var tabPane = $(
                            `<div class='tab-pane fade show ${index == 0 ? 'active' : ''}' id='pills-${item.id}' role='tabpanel' aria-labelledby='pills-${item.id}-tab' tabindex='0'>${firstLetter}${letterAfterSpace}-${index+1} : ${item.question}</div>`
                        );







                        // Create a div element



                        var newDiv = $('<div>');







                        // Add attributes, classes, or content to the div



                        // newDiv.attr('id', 'myDiv');



                        // newDiv.addClass('myClass');











                        var orss = item.ors;



                        // console.log(orss);



                        orss.forEach(function(ors) {



                            // console.log(ors.name);



                            var resItem = $(`<div class="form-check">\



                                            <input class="form-check-input" type="checkbox" value=""  name="">\



                                            <label class="form-check-label" > ${ors.name} </label>\



                                        </div>`);



                            newDiv.append(resItem);



                            tabPane.append(newDiv);



                        });







                        ulElement.append(listItem);



                        divElement.append(tabPane);











                    });







                    // Append the new elements to the target element



                    target.append(ulElement);



                    target.append(divElement);



                }



            });







            $('#viewmytempModal').css('display', 'block');



        });







        $(document).on('click', '#closeviewTem', function() {



            $('#viewmytempModal').css('display', 'none');



        });



        $(document).on('click', '#closeSelTem', function() {



            $('#mytempModal').css('display', 'none');



        });
    </script>
    <script>
        const toggleButton = document.getElementById('toggleButton');



        const blurableElements = document.querySelectorAll('.blurable');







        let isBlurred = false;







        toggleButton.addEventListener('click', () => {



            isBlurred = !isBlurred;







            if (isBlurred) {



                blurableElements.forEach(element => {



                    element.classList.add('blurred');



                });



                toggleButton.textContent = 'Unhide Amount';



            } else {



                blurableElements.forEach(element => {



                    element.classList.remove('blurred');



                });



                toggleButton.textContent = 'Hide Amount';



            }



        });
    </script>
@endpush
