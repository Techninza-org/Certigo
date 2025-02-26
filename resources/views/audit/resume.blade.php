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
            height: 100vh;
            display: none;
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

        svg path,
        svg rect {
            fill: #FF6700;
        }

        .progress-bar {
            width: 100%;
            height: 25px;
            background-color: #ccc;
        }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4caf50;
            text-align: center;
            line-height: 20px;
            color: white;
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
                                    <p><strong>Start time: </strong>{{ $audit->formated_date }} {{ $start_time }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <h4 class="text-center fw-bold">{{ $audit->audit_name }}</h4>
                                    <p class="d-none" id="answers_p" data-ans="{{ $total_answers_in_audit }}"> </p>
                                    <p class="d-none" id="questions_p" data-ques="{{ $total_questions_in_audit }}"></p>
                                    <div class="progress-bar">
                                        <div class="progress d-flex justify-content-center align-items-center fs-5"
                                            id="progress-bar">
                                        </div>
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
                                    @foreach ($templatesWithQuestions as $key => $templateData)
                                        <button class="nav-link areaSectionNav text-nowrap {{ $key == 0 ? 'active' : '' }}"
                                            id="v-pills-home-tab{{ $templateData['template']['id'] }}" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home{{ $templateData['template']['id'] }}" type="button"
                                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            {{ $templateData['template']['template_name'] }}
                                            {{ $templateData['template']['tot_que_answered'] }}/{{ $templateData['template']['tot_que'] }}
                                            @if ($templateData['template']['tot_que_answered'] != $templateData['template']['tot_que'] || $templateData['template']['has_nonconformity'] === true)
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
                                    style="width: -webkit-fill-available;">
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
                                    <form action="{{ route('fillAudit') }}" method="post" enctype="multipart/form-data" id="audit-save">
                                        @csrf
                                        <input type="hidden" name="audit_id" value="{{ $audit->id }}">
                                    
                                        <div class="tab-content" id="pills-tabContent">
                                            @foreach ($templatesWithQuestions as $key => $templateData)
                                                <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                                    id="v-pills-home{{ $templateData['template']['id'] }}" role="tabpanel"
                                                    aria-labelledby="v-pills-home-tab{{ $templateData['template']['id'] }}" tabindex="0">
                                    
                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                        @foreach ($templateData['questions'] as $questionKey => $questionData)
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link {{ $questionKey == 0 ? 'active' : '' }}"
                                                                    id="pills-home-tab{{ $questionData['question']['id'] }}" data-bs-toggle="pill"
                                                                    data-bs-target="#pills-home{{ $questionData['question']['id'] }}" type="button"
                                                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                                                    Q{{ $questionKey + 1 }}
                                                                    @if(!empty($questionData['response']) && isset($questionData['response']['response_score']))
                                                                        @if($questionData['response']['response_score'] == 1 || $questionData['response']['response_score'] == 4)
                                                                            <i class="fa-regular fa-circle-check ms-2"
                                                                               style="color: white; background-color: green; border-radius: 50%;"
                                                                               aria-hidden="true"></i>
                                                                        @elseif($questionData['response']['response_score'] == 0 || $questionData['response']['response_score'] == 2 )
                                                                            <i class="fa-regular fa-circle-check ms-2"
                                                                               style="color: white; background-color: red; border-radius: 50%;"
                                                                               aria-hidden="true"></i>
                                                                        @endif
                                                                    @endif
                                                                </button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                    
                                                    <div class="tab-content">
                                                        @foreach ($templateData['questions'] as $questionKey => $questionData)
                                                            <div class="tab-pane fade show {{ $questionKey == 0 ? 'active' : '' }}"
                                                                id="pills-home{{ $questionData['question']['id'] }}" role="tabpanel"
                                                                aria-labelledby="pills-home-tab{{ $questionData['question']['id'] }}" tabindex="0">
                                                                
                                                                <input type="hidden" name="questions[{{ $questionData['question']['id'] }}][question_id]" value="{{ $questionData['question']['id'] }}">
                                                                <input type="hidden" name="questions[{{ $questionData['question']['id'] }}][template_id]" value="{{ $templateData['template']['id'] }}">
                                    
                                                                <p class="question-p">{{ $questionData['question']['text'] }}</p>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <p>{{ $questionData['question']['question'] }}</p>
                                                                    @if (!empty($questionData['question']['allResponses']) && $questionData['question']['allResponses']->isNotEmpty())
                                                                        @foreach ($questionData['question']['allResponses'] as $response)
                                                                            <div>
                                                                                <input type="radio" name="questions[{{ $questionData['question']['id'] }}][response]" id="response_{{ $response->id }}"
                                                                                    value="{{ $response->id }}"
                                                                                    @if(isset($questionData['response']['response_id']) && $questionData['response']['response_id'] == $response->id) checked @endif>
                                                                                <label for="response_{{ $response->id }}">{{ $response->name }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </div>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Objective Evidences:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="questions[{{ $questionData['question']['id'] }}][objective_evidences]"
                                                                        value="{{ $questionData['response']['objective_evidences'] ?? '' }}" maxlength="200">
                                                                </div>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Give a Suggestion:</label>
                                                                    <textarea class="full-featured-non-premium form-control"
                                                                        name="questions[{{ $questionData['question']['id'] }}][suggestions]">{{ $questionData['response']['suggestions'] ?? '' }}</textarea>
                                                                </div>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Upload Evidences:</label>
                                                                    <input type="file" class="form-control" name="questions[{{ $questionData['question']['id'] }}][evidences][]" multiple>
                                                                </div>

                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Uploaded Evidences:</label>
                                                                        <div class="row image-container d-flex justify-content-evenly" >
                                                                            @if (!empty($questionData['response']['evidences']))
                                                                            @foreach (json_decode($questionData['response']['evidences'], true) as $evidence)
                                                                                <div class="col-auto">
                                                                                    <img src="{{ asset($evidence) }}" alt="Evidence Image" class="img-fluid" style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                                                                </div>
                                                                            @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Doc_Ref:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="questions[{{ $questionData['question']['id'] }}][doc_ref]"
                                                                        value="{{ $questionData['response']['doc_ref'] ?? '' }}" maxlength="200">
                                                                </div>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Person Responsible:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="questions[{{ $questionData['question']['id'] }}][person_responsible]"
                                                                        value="{{ $questionData['response']['person_responsible'] ?? '' }}" maxlength="200">
                                                                </div>
                                    
                                                                <div class="mb-3 d-grid">
                                                                    <label class="form-label">Timeline:</label>
                                                                    <input type="datetime-local" class="form-control"
                                                                        name="questions[{{ $questionData['question']['id'] }}][timeline]"
                                                                        value="{{ $questionData['response']['timeline'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary btn-lg mt-4">Save</button>
                                    </form>
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

        function clearFileInput() {
            document.getElementById('fileInput').value = ""; 
        }
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

        $(document).ready(function() {
            // Progress bar calculation
            const progressBar = document.getElementById("progress-bar");
            const currentValue = document.getElementById('answers_p').getAttribute('data-ans');
            const totalValue = document.getElementById('questions_p').getAttribute('data-ques');
            const widthPercentage = (currentValue / totalValue) * 100;
            progressBar.style.width = widthPercentage + "%";
            progressBar.textContent = `${currentValue}/${totalValue}`;

            // Tab persistence
            var lastActiveTab = localStorage.getItem('lastActiveTab');
            var firstTabId = $firstTab.attr('id');
            localStorage.setItem('lastActiveTab', firstTabId);
            if (lastActiveTab) {
                $('.areaSectionNav').removeClass('active');
                $('.tab-pane').removeClass('show active');
                $('#' + lastActiveTab).addClass('active');
                var tabPaneSelector = '[aria-labelledby="' + lastActiveTab + '"]';
                $(tabPaneSelector).addClass('show active');
            }

            $('.areaSectionNav').on('click', function() {
                var targetTabId = $(this).attr('id');
                localStorage.setItem('lastActiveTab', targetTabId);
            });
        });
    </script>
@endpush