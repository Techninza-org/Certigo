@extends('layout.layout')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <style>
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
            float: right;
        }

        label {
            display: inline-block;
            padding-top: 10px;
            font-size: 15px;
        }

        .form-check .form-check-input {
            margin-left: 0;
        }

        .image-container .image-item button {
            position: absolute;
        }

        .loader {
            /* margin: 0 0 2em; */
            height: 100vh;
            /* width: 20%; */
            /* text-align: center; */
            /* padding: 1em; */
            /* margin: 0 auto 1em; */
            display: none;
            /* vertical-align: top; */
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
            left: 0;
            justify-content: center;
            align-items: center;
            background: white;
        }

        /*
                                    Set the color of the icon
                                    */
        svg path,
        svg rect {
            fill: #FF6700;
        }

        .progress-bar {
            width: 100%;
            height: 25px;
            /* Adjust the height as needed */
            background-color: #ccc;
            /* Background color of the progress bar container */
        }

        .progress {
            height: 100%;
            width: 0;
            /* Start with 0% width */
            background-color: #4caf50;
            /* Color of the progress bar */
            text-align: center;
            line-height: 20px;
            /* Should be the same as the height of the progress bar */
            color: white;
            /* Text color */
            font-weight: bold;
        }

        .area_section_buttons button {
            width: 250px;
            font-size: 0.7rem;
            white-space: normal !important;
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card w-100 mb-2">
                <div class="card-body p-0 d-flex justify-content-evenly">
                    <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('index') }}"> Clients</a>
                    <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('back.client.audit') }}"
                        onclick="event.preventDefault(); document.getElementById('back-client-audits{{ $clientId }}').submit();">
                        Client's Audits</a>
                    <form id="back-client-audits{{ $clientId }}" action="{{ route('back.client.audit') }}"
                        method="get" class="d-none">
                        <input type="hidden" value="{{ $clientId }}" name="cid">
                    </form>
                    <a class="btn btn-md text-light fw-bold bg-success border border-success "
                        href="{{ route('audit.final.score') }}"
                        onclick="event.preventDefault(); document.getElementById('audit-final-score{{ $audit->id }}').submit();">
                        Audit Completed</a>
                    <form id="audit-final-score{{ $audit->id }}" action="{{ route('audit.final.score') }}" method="get"
                        class="d-none">
                        <input type="hidden" value="{{ $audit->id }}" name="auditId">
                        <input type="hidden" value="{{ $clientId }}" name="cid">
                        <input type="hidden" value="{{ \Auth::user()->id }}" name="auth_id">
                        {{-- <input type="hidden" value="{{ $start_time }}" name="start_time"> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <input type="hidden" name="audit_id_global" value="{{ $audit->id }}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p><strong>Start time:</strong>{{ $audit->formated_date }} {{ $start_time }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <h4 class="text-center fw-bold">{{ $audit->audit_name }}</h4>
                                    <p class="d-none" id="answers_p" data-ans="{{ $total_answers_in_audit }}"> </p>
                                    <p class="d-none" id="questions_p" data-ques="{{ $total_questions_in_audit }}"></p>
                                    <div class="progress-bar">
                                        <div class="progress d-flex justify-content-center align-items-center fs-5"
                                            id="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <p class="fs-6 fw-medium mb-1">{{ $client->title }}. {{ $client->fname }}
                                        {{ $client->lname }}
                                    </p>
                                    <p style="font-size: 15px" class="fw-medium mb-0">({{ $client->organisation_name }})
                                    </p>
                                    <p style="font-size: 15px" class="fw-medium">{{ $audit->audit_index }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p style="font-size: 13px;color:red">Fill 'response', 'Objective evidences', 'Suggestion' and
                                'upload evidences' together while filling negative response.
                            </p>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary btn-sm p-2 text-white"
                                    href="{{ route('audit-status', ['id' => $audit->id]) }}">
                                    Status
                                </a>
                            </div>
                            <div class="d-lg-flex d-md-flex align-items-start">
                                <div class="nav flex-column nav-pills area_section_buttons me-3 mb-2" id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    <strong class="mb-3" style="font-size: 12px">AREA OF CONCERN</strong>
                                    @foreach ($tenplates_names_in_audit as $key => $tem_in_aud)
                                        <button class="nav-link areaSectionNav text-nowrap {{ $key == 0 ? 'active' : '' }}"
                                            id="v-pills-home-tab{{ $tem_in_aud->id }}" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home{{ $tem_in_aud->id }}" type="button"
                                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            {{ $tem_in_aud->template_name }}
                                            {{ $tem_in_aud['tot_que_answered'] }}/{{ $tem_in_aud['tot_que'] }}
                                            @if ($tem_in_aud['tot_que_answered'] != $tem_in_aud['tot_que'] || $tem_in_aud['has_nonconformity'] === true)
                                                <i class="fa-regular fa-circle-check ms-2"
                                                    style="color: white; background-color: red; border-radius: 50%;"
                                                    aria-hidden="true"></i>
                                            @else
                                                <i class="fa-regular fa-circle-check ms-2"
                                                    style="color: white; background-color: green; border-radius: 50%;"
                                                    aria-hidden="true"></i>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>
                                <div class="tab-content pt-4" id="v-pills-tabContent"
                                    style="    width: -webkit-fill-available;">
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
                                    {{-- Report button below --}}
                                    @foreach ($tenplates_names_in_audit as $key => $tem_in_aud)
                                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                            id="v-pills-home{{ $tem_in_aud->id }}" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab{{ $tem_in_aud->id }}" tabindex="0">
                                        </div>
                                    @endforeach

                                    {{-- Report Generate button only after audit is completed --}}
                                    @if ($emptyInputs == 0 && $audit->completion == 100)
                                        <!-- Button trigger modal -->
                                        <div class="d-flex justify-content-evenly align-items-center mb-3 mt-3">
                                            @if($audit->auditor_sign != null)
                                            <img src="{{ url('') }}/{{ $audit->auditor_sign }}" style="width: 10rem; padding-left: 18px;" alt="">
                                            @else
                                            <a
                                                href="{{ route('sign.view', ['audit_id' => $audit->id, 'client_id' => $client->id]) }}"><i
                                                    class="fa-solid fa-file-signature"></i> Auditor's Signature here</a>
                                                    @endif

                                            @if ($client->signature != null)
                                                <img src="{{ url("") }}/public/{{ $client->signature }}" alt="client signature" style="width: 120px;display:inline-block">
                                            @elseif($audit->auditee_sign != null)
                                                <img src="{{ url('') }}/{{ $audit->auditee_sign }}" style="width: 10rem; padding-left: 18px;" alt="">
                                            @else
                                                <a
                                                    href="{{ route('auditee.sign.view', ['audit_id' => $audit->id, 'client_id' => $client->id]) }}"><i
                                                        class="fa-solid fa-file-signature"></i> Auditee's Signature
                                                    here</a>
                                            @endif

                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-4">
                                                <div class="text-center mb-3" id="genRepBtn">
                                                    @if ($isSaved)
                                                        <a class="btn btn-primary btn-sm p-2 text-white" target="_blank"
                                                            href="{{ route('audit-report-viewpdf', ['id' => $audit->id]) }}">
                                                            View Report
                                                        </a>
                                                    @endif
                                                    {{-- @else --}}
                                                    <a class="btn btn-danger btn-sm p-2 text-white" target="_blank"
                                                        href="{{ route('audit.report.view') }}"
                                                        onclick="event.preventDefault(); document.getElementById('audit-report-view{{ $audit->id }}').submit();">
                                                        Save Report
                                                    </a>
                                                    
                                                    
                                                    <form id="audit-report-view{{ $audit->id }}"
                                                        action="{{ route('audit.report.view') }}" method="get"
                                                        class="d-none">
                                                        <input type="hidden" value="{{ $audit->id }}"
                                                            name="auditId">
                                                        <input type="hidden" value="{{ $clientId }}"
                                                            name="cid">
                                                        <input type="hidden" value="{{ \Auth::user()->id }}"
                                                            name="auth_id">
                                                        {{-- <input type="hidden" value="{{ $start_time }}" name="start_time"> --}}
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <p class="fs-6 fw-semibold text-danger">Provide evidences and remarks properly and
                                            answer all questions
                                        </p>
                                    @endif
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
    <div class="loader loader--style3" title="2">



        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
            xml:space="preserve">



            <path fill="#000"
                d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">



                <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25"
                    to="360 25 25" dur="0.6s" repeatCount="indefinite" />



            </path>



        </svg>



    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>







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
        function clearFileInput() {
            document.getElementById('fileInput').value = ""; // Clears the file input
        }

        $(document).ready(function() {
            var childElements = $('#v-pills-tab').children('button');
            $(".loader").css('display', 'flex');
            childElements.each(function() {
                var id = $(this).attr('id');
                const match = id.match(/\d+$/);
                let tem_id = parseInt(match[0]);
                // let tem_id = id.slice(-1);
                $.ajax({
                    url: '{{ route('tempdetAjax') }}',
                    method: 'POST',
                    data: {
                        tem_id: tem_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        let resTemId = response.response.data[0]['template_id'];
                        let multiResp = response.response.temp['multi_select'];
                        let htmlContent =
                            '<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';
                        // making of  <li> starts 
                        response.response.data.forEach(function(item, index) {
                            let t_name = item.template_name;
                            let f_char = t_name.charAt(0);
                            let index_space = t_name.indexOf(" ");
                            let sec_char = t_name.charAt(index_space + 1);
                            let indexPOne = index + 1;
                            let isActive = indexPOne === 1 ? 'active' : '';
                            htmlContent += '<li class="nav-item" role="presentation">';
                            htmlContent += '<button class="nav-link ' + isActive +
                                '" id="pills-home-tab' + item.id +
                                '" data-bs-toggle="pill" data-bs-target="#pills-home' +
                                item.id +
                                '" type="button" role="tab" aria-controls="pills-home' +
                                item.id + '" aria-selected="true">' + f_char +
                                sec_char + '-' + indexPOne + '</button>';
                            htmlContent += '</li>';
                        });
                        htmlContent += '</ul>';
                        htmlContent +=
                            '<div class="tab-content" id="pills-tabContent" style="width: -webkit-fill-available">'; // tab-content started
                        // making of tab-pane div starts
                        response.response.data.forEach(function(item, index) {
                            let t_name = item.template_name;
                            let f_char = t_name.charAt(0);
                            let index_space = t_name.indexOf(" ");
                            let sec_char = t_name.charAt(index_space + 1);
                            let indexPOne = index + 1;
                            let isActive = indexPOne === 1 ? 'active' : '';
                            htmlContent += '<div class="tab-pane fade show ' +
                                isActive + '" id="pills-home' + item.id +
                                '" role="tabpanel" aria-labelledby="pills-home-tab' +
                                item.id + '" tabindex="0">'; // tab-pane started
                            htmlContent +=
                                '<form action="{{ route('fillAudit') }}" id="myForm' +
                                item.id +
                                '" method="post" enctype="multipart/form-data">@csrf';
                            htmlContent +=
                                '<input type="hidden" name="audit_id" value="{{ $audit->id }}">';
                            htmlContent +=
                                '<input type="hidden" name="question_id" value="' + item
                                .id + '">';
                            htmlContent +=
                                '<input type="hidden" name="template_id" value="' + item
                                .template_id + '">';
                            htmlContent +=
                                '<input type="hidden" name="template_name" value="' +
                                item.template_name + '">';
                            htmlContent += '<p class="question-p">' + item.question +
                                '</p>';
                            htmlContent += '</form>';
                            htmlContent += '</div>';
                            // Store the current tab-pane element's ID to use inside the AJAX success callback
                            let currentTabPaneId = 'pills-home' + item.id;
                            let currentTabPaneBtnId = 'pills-home-tab' + item.id;
                            // Add Responses start
                            let resGrp = item.response_group;
                            // console.log(resGrp);                  
                            $.ajax({
                                url: '{{ route('getResGrp') }}',
                                method: 'POST',
                                data: {
                                    resGrp: resGrp
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                        .attr('content')
                                },
                                success: function(response) {
                                    console.log('grp', response.data);
                                    let respContent =
                                        '<div class="mb-3 " id="response-box">';
                                    response.data.forEach(function(itemr) {
                                        //console.log("getResGrp="+itemr.id);
                                        respContent +=
                                            '<div class="form-check"><input class="form-check-input" type="radio" value="' +
                                            itemr.score + '|' +
                                            itemr.id +
                                            '"  style="font-size: x-large;" name="response_score" ><label class="form-check-label" style="    margin-left: 10px;"> ' +
                                            itemr.name +
                                            ' </label></div>';
                                    });
                                    respContent += '</div>';
                                    // Find the current tab-pane element and add respContent inside it
                                    $('#' + currentTabPaneId).find('form')
                                        .append(respContent);
                                    let inputFields =
                                        '<div class="mb-3 ">\
                                                                                                                <label class="form-label">Objective evidences:</label>\
                                                                                                                <input type="text" class="form-control"  name="objective_evidences">\
                                                                                                            </div>\
                                                                                                            <div class="mb-3 ">\
                                                                                                                <label class="form-label">Give a Suggestion:</label>\
                                                                                                                <textarea class="full-featured-non-premium form-control" name="suggestions" ></textarea>\
                                                                                                            </div>\
                                                                                                            <label class="form-label">Upload evidences:</label>\
                                                                                                            <div class="mb-3 d-flex">\
                                                                                                                <input type="file" id="fileInput" class="form-control" name="evidences[]" multiple >\
                                                                                                                <button type="button" class="btn text-danger" onclick="clearFileInput()">x</button>\
                                                                                                            </div>\
                                                                                                            <div class="mb-3 ">\
                                                                                                                <label class="form-label">Uploaded evidences:</label>\
                                                                                                                <div class=" row image-container d-flex justify-content-evenly" ></div>\
                                                                                                            </div>\
                                                                                                            <div class="mb-3 ">\
                                                                                                                <label class="form-label">Doc_ref:</label>\
                                                                                                                <input type="text" class="form-control"  name="doc_ref" maxlength="200">\
                                                                                                            </div>\
                                                                                                            <div class="mb-3 ">\
                                                                                                                <label class="form-label">Personal Responsible:</label>\
                                                                                                                <input type="text" class="form-control"  name="person_responsible">\
                                                                                                            </div>\
                                                                                                            <div class="mb-3 ">\
                                                                                                                <label class="form-label">Timeline:</label>\
                                                                                                                <input type="datetime-local" class="form-control"  name="timeline">\
                                                                                                            </div>\
                                                                                                            <button type="submit" class="btn btn-primary btn-sm submit-btn">Submit</button>';
                                    $('#' + currentTabPaneId).find('form')
                                        .append(inputFields);
                                }
                            });
                            let aud_id = $("input[name='audit_id_global']").val();
                            let itemId = item.id;
                            $.ajax({
                                url: '{{ route('getFormData') }}',
                                method: 'POST',
                                data: {
                                    itemId: itemId,
                                    audi_id: aud_id
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                        .attr('content')
                                },
                                success: function(response) {
                                    // Assuming the server response is JSON data, parse it first
                                    try {
                                        if (response.status === true) {
                                            let formD = response.data;
                                            console.log('data', formD);
                                            let responseIds = formD[
                                                'response_id'];
                                            let responseScores = formD[
                                                'response_score'];
                                            var responseIdsArray =
                                                responseIds.split(',');
                                            var responseScoresArray =
                                                responseScores.split(',');
                                            if (multiResp == 1) {
                                                for (var i = 0; i <
                                                    responseScoresArray
                                                    .length; i++) {
                                                    var combinedValue =
                                                        responseScoresArray[
                                                            i] + "|" +
                                                        responseIdsArray[i];
                                                    // console.log(combinedValue);
                                                    $('#' +
                                                            currentTabPaneId
                                                        )
                                                        .find(
                                                            'input[name="response_score[]"]'
                                                        ).filter(
                                                            '[value="' +
                                                            combinedValue +
                                                            '"]').prop(
                                                            'checked', true
                                                        );
                                                }
                                            } else {
                                                $('#' + currentTabPaneId)
                                                    .find(
                                                        'input[name="response_score"]'
                                                    ).filter(
                                                        '[value="' + formD
                                                        .response_score +
                                                        '|' + formD
                                                        .response_id + '"]')
                                                    .prop('checked', true);
                                            }
                                            // Your code to populate input fields with data from formD
                                            // $('#' + currentTabPaneId).find('input[name="response_score"]').filter('[value="' + formD.response_score + '|' + formD.response_id +'"]').prop('checked', true);
                                            $('#' + currentTabPaneId).find(
                                                'input[name="objective_evidences"]'
                                            ).val(formD
                                                .objective_evidences);
                                            $('#' + currentTabPaneId).find(
                                                    'input[name="doc_ref"]')
                                                .val(formD.doc_ref);
                                            $('#' + currentTabPaneId).find(
                                                'input[name="person_responsible"]'
                                            ).val(formD
                                                .person_responsible);
                                            $('#' + currentTabPaneId).find(
                                                'input[name="timeline"]'
                                            ).val(formD.timeline);
                                            $('#' + currentTabPaneId).find(
                                                'textarea[name="suggestions"]'
                                            ).val(formD.suggestions);
                                            $('#' + currentTabPaneBtnId)
                                                .append(
                                                    "<i class='fa-regular fa-circle-check ms-2' style='color: white;background-color:" +
                                                    (formD.response_score >=
                                                        1 || formD
                                                        .response_score ==
                                                        'null' ? 'green' :
                                                        'red') +
                                                    ";border-radius: 50%;'></i>"
                                                );
                                            // $('#' + currentTabPaneBtnId).css("background-color",formD.response_score === 1 ? 'green' : 'red');
                                            let imageElement = $('#' +
                                                currentTabPaneId).find(
                                                '.image-container');
                                            imageElement.empty();
                                            if (Array.isArray(formD.img)) {
                                                formD.img.forEach(function(
                                                    image, index) {
                                                    let imageUrl =
                                                        '{{ env('APP_URL') }}' +
                                                        '/' + image;
                                                    imageElement
                                                        .append(
                                                            '<div class="col-md-3 col-sm-12 image-item"><a href="' +
                                                            imageUrl +
                                                            '" class="fancybox" data-fancybox="gallery' +
                                                            item
                                                            .id +
                                                            '"><img src="' +
                                                            imageUrl +
                                                            '" style="max-width: 100px;"></a><a class="close-btn" href="{{ route('removeEvidence') }}" onclick="event.preventDefault();document.getElementById(\'remove-evidence' +
                                                            index +
                                                            '\').submit();">&times;</a><form id="remove-evidence' +
                                                            index +
                                                            '" action="{{ route('removeEvidence') }}" method="get"><input type="hidden" name="audit_id" value="{{ $audit->id }}"><input type="hidden" name="question_id" value="' +
                                                            formD
                                                            .question_id +
                                                            '"><input type="hidden" name="imageIndex" value="' +
                                                            index +
                                                            '"></form></div>'
                                                        );
                                                });
                                            }
                                            $(".loader").css('display',
                                                'none');
                                        } else {
                                            // Data is not available in the response, show empty fields or reset the form
                                            $('#' + currentTabPaneId).find(
                                                'input[name="response_score"]'
                                            ).prop('checked', false);
                                            $('#' + currentTabPaneId).find(
                                                'input[name="objective_evidences"]'
                                            ).val('');
                                            $('#' + currentTabPaneId).find(
                                                'textarea[name="suggestions"]'
                                            ).val('');
                                            let imageElement = $('#' +
                                                currentTabPaneId).find(
                                                '.image-container');
                                            imageElement.empty();
                                            // ... Add other code to show empty fields or reset the form elements
                                            $(".loader").css('display',
                                                'none');
                                        }
                                    } catch (error) {
                                        console.error(
                                            "Error parsing server response:",
                                            error);
                                    }
                                    tinymce.init({
                                        selector: 'textarea.full-featured-non-premium',
                                        branding: false,
                                        promotion: false,
                                        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
                                        imagetools_cors_hosts: [
                                            'picsum.photos'
                                        ],
                                        menubar: 'file edit view insert format tools table help',
                                        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                                        toolbar_sticky: true,
                                        autosave_ask_before_unload: true,
                                        autosave_interval: "30s",
                                        autosave_prefix: "{path}{query}-{id}-",
                                        autosave_restore_when_empty: false,
                                        autosave_retention: "2m",
                                        image_advtab: true,
                                        content_css: '//www.tiny.cloud/css/codepen.min.css',
                                        image_class_list: [{
                                                title: 'None',
                                                value: ''
                                            },
                                            {
                                                title: 'Some class',
                                                value: 'class-name'
                                            }
                                        ],
                                        importcss_append: true,
                                        file_picker_callback: function(
                                            callback, value,
                                            meta) {
                                            /* Provide file and text for the link dialog */
                                            if (meta
                                                .filetype ===
                                                'file') {
                                                callback(
                                                    'https://www.google.com/logos/google.jpg', {
                                                        text: 'My text'
                                                    });
                                            }
                                            /* Provide image and alt text for the image dialog */
                                            if (meta
                                                .filetype ===
                                                'image') {
                                                callback(
                                                    'https://www.google.com/logos/google.jpg', {
                                                        alt: 'My alt text'
                                                    });
                                            }
                                            /* Provide alternative source and posted for the media dialog */
                                            if (meta
                                                .filetype ===
                                                'media') {
                                                callback(
                                                    'movie.mp4', {
                                                        source2: 'alt.ogg',
                                                        poster: 'https://www.google.com/logos/google.jpg'
                                                    });
                                            }
                                        },
                                        height: 400,
                                        image_caption: true,
                                        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                                        noneditable_noneditable_class: "mceNonEditable",
                                        toolbar_mode: 'sliding',
                                        contextmenu: "link image imagetools table",
                                    });
                                },
                            });
                        });
                        // Tab-pane div ends
                        htmlContent += '</div>';
                        $("#v-pills-home" + resTemId).html(htmlContent);
                        // htmlContent += respContent;
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                    }
                });
            });
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
        // Get the progress bar element
        const progressBar = document.getElementById("progress-bar");
        // Set the current and total values (4/5 in this example)
        let answers = document.getElementById('answers_p');
        let questions = document.getElementById('questions_p');
        const currentValue = answers.getAttribute('data-ans');
        const totalValue = questions.getAttribute('data-ques');
        const widthPercentage = (currentValue / totalValue) * 100;
        progressBar.style.width = widthPercentage + "%";
        progressBar.textContent = `${currentValue}/${totalValue}`;
    </script>

    <script>
        $(document).ready(function() {
            // Retrieve the last active tab ID from local storage
            var lastActiveTab = localStorage.getItem('lastActiveTab');

            // Set the active tab based on the stored value
            if (lastActiveTab) {
                $('.areaSectionNav').removeClass('active'); // Remove 'active' class from all tabs
                $('.tab-pane').removeClass('show active'); // Remove 'show' and 'active' classes from all tab panes

                $('#' + lastActiveTab).addClass('active'); // Add 'active' class to the last active tab

                // Find the corresponding tab-pane by attribute and add 'show' and 'active' classes to it
                var tabPaneSelector = '[aria-labelledby="' + lastActiveTab + '"]';
                $(tabPaneSelector).addClass('show active');
            }

            $('.areaSectionNav ').on('click', function() {
                var targetTabId = $(this).attr('id');
                localStorage.setItem('lastActiveTab', targetTabId);
            });
        })
    </script>
@endpush
