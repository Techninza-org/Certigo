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



            width: 9rem;



        }







        /* Styling for the popup options */



        .option {



            cursor: pointer;



            padding: 5px;



        }







        label {



            display: inline-block;



            padding-top: 10px;



            font-size: 15px;



        }







        .objective-xmark{



            position: absolute;



            top: -10px;



            background: red;



            right: 0px;



            color: white;



            padding: 2px;



            font-size: 9px;



            border-radius: 2px;



        }



    







        /* Loader  */



        .loader{



            /* margin: 0 0 2em;



            height: 100px; */



            width: 20%;



            text-align: center;



            /* padding: 1em;



            margin: 0 auto 1em; */



            display:none;



            /* vertical-align: top; */



            }



</style>



@endpush



@section('content')



<div class="row">



    <div class="col-lg-12 col-md-12">



      <div class="card w-100 mb-2">



        <div class="card-body p-0">



          <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('get.templates') }}">  Folders</a>



          <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('get_template_files') }}" onclick="event.preventDefault(); document.getElementById('back-client-audits{{ $folderid }}').submit();">  Templates</a>



          <form id="back-client-audits{{ $folderid }}" action="{{ route('get_template_files') }}" method="get" class="d-none">                                                       



            <input type="hidden" value="{{ $folderid }}" name="folderid">



        </form>



        </div>



      </div>



    </div>



</div>



    <div class="row">



        <div class="col-lg-12 d-flex align-items-strech">



            <div class="card w-100">



                <div class="card-body">



                    {{-- <div>



                        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#templateAddModal">



                            <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add New template



                          </button>



                    </div> --}}



                    <div class="row">



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



                        {{-- @foreach($templates as $template)



                        <div class="col-md-2 text-center">



                           



                            <div class="text-end" style="    position: relative;">



                                <i class="fa-solid fa-ellipsis btn popupButton"></i>



                                



                                <div id="popup" class="popup">



                                    <div class="option d-flex p-2">



                                        <a class="btn pt-0 pb-0" href="{{ route('get_template_files', $template->id) }}">



                                        <i class="fa-solid fa-book"></i> Open </a>



                                    </div>



                                    <div class="option d-flex p-2">



                                        <a class="btn pt-0 pb-0" href="{{ route('edit-template', $template->id ) }}">  <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                                    </div>



                                    <div class="option d-flex p-2">



                                      <a class="btn pt-0 pb-0" href="">



                                        <i class="fa-solid fa-trash-can"></i> Delete </a>



                                  </div>



                                </div>



                              </div>    



                             <i class="fa-solid fa-file" style="    font-size: xx-large;"></i>  <br>  



                              <p class="m-0" style="    font-size: 16px;">{{ $template->template_name }}</p> 



                              <p class="m-0" style="    font-size: 12px;">{{ $template->description }}</p> 



                                                



                        </div>



                        @endforeach --}}







                        <form action="{{ route('template.update') }}" method="post">



                            @csrf



                            <div class="row">  



        



                                <input type="hidden" name="templateid" value="{{ $template->id }}">



        



                                <div class="mb-3 ">



                                    <label class="form-label">Template type</label>



                                    <select class="form-select" name="template_type" id="">



                                        <option value="1" {{ $template->template_type == '1' ? 'selected': '' }}>Hygienic template</option>



                                        <option value="2" {{ $template->template_type == '2' ? 'selected' : '' }}>Industrial template</option>



                                    </select>



                                </div>



        



                                <div class="mb-3 ">



                                    <label class="form-label">Template name</label>



                                    <input type="text" class="form-control" name="template_name" value="{{ $template->template_name }}">



                                </div>



        



                                <div class="mb-3 ">



                                    <label class="form-label">Few words about this template</label>



                                    <input type="text" class="form-control" name="description" value="{{ $template->description }}">



                                </div>







                                {{-- <div class="mb-3 ">



                                    <input class="form-check-input toggle-input" type="checkbox"  style="font-size: large; border: #5d87ff 2px solid;" name="multi_select" {{ $template->multi_select == 1 ? 'checked' : '' }}>



                                    <label class="form-label">Multiple Selection</label>



                                </div> --}}



                                



                                <div class="modal-footer">



                                    {{-- <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button> --}}



                                    <button type="submit" class="btn btn-primary">Update</button>



                                </div>



                            </div>



                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}



                        </form>



                    </div>



                </div>



                



                



            </div>



        </div>







        <div class="col-lg-12 d-flex align-items-strech">



            <div class="card w-100">



                <div class="card-body">



                    {{-- <div>



                        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#templateAddModal">



                            <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add New template



                          </button>



                    </div> --}}



                    <div class="row">







                        {{-- <div class="col-md-3">



                            <h4>Area Of Concern</h4>



                        </div> --}}



                        <div class="col-md-9">



                            <div>



                                <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#templateDetailsModal">



                                    <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add an Objective



                                </button>



                                <!-- <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#createResponseModal">



                                    <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Create response



                                </button> -->



                            </div>



                        </div>







                        <div class="col-md-9">



                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">







                                @foreach($template_details as $key => $temp_d)



                                <li class="nav-item" role="presentation" style="position: relative">



                                  <button class="nav-link mb-3 {{$key === 0 ? ' active' : ''}}" id="pills-tab{{ $temp_d->id }}" data-bs-toggle="pill" data-bs-target="#pills{{ $temp_d->id }}" type="button" role="tab" aria-controls="pills{{ $temp_d->id }}" aria-selected="true" data-id="{{ $temp_d->id }}">{{ $firstLetter }}{{ $letterAfterSpace }}-{{ $key+1 }}</button>



                                  <i class="fa-solid fa-xmark objective-xmark" data-id="{{ $temp_d->id }}" id="obj{{  $temp_d->id  }}"></i>



                                </li>



                                @endforeach







                                {{-- <li class="nav-item" role="presentation">



                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>



                                </li>



                                <li class="nav-item" role="presentation">



                                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>



                                </li> --}}



                                



                            </ul>



                            <div class="tab-content" id="pills-tabContent">



                                @foreach($template_details as $key => $temp_d)



                                <div class="tab-pane fade show {{$key === 0 ? ' active' : ''}}" id="pills{{ $temp_d->id }}" role="tabpanel" aria-labelledby="pills-tab{{ $temp_d->id }}" tabindex="0">



                                    {{ $firstLetter }}{{ $letterAfterSpace }}-{{ $key+1 }}  .  



                                    <form action="{{ route('updt-obj-q') }}" method="post">



                                        @csrf



                                        <input type="hidden" value="{{ $temp_d->id }}" name="id">



                                        <input type="text" class="form-control mb-2" value="{{ $temp_d->question }}" name='question'>







                                        <label class="fw-semibold">Select NC</label>



                                        <select class="form-select mb-3" name="nc" id="">



                                            <option value="2" {{ $temp_d->nc == '2' ? 'selected': '' }}>Critical</option>



                                            <option value="1" {{ $temp_d->nc == '1' ? 'selected': '' }}>Major</option>



                                            <option value="0" {{ $temp_d->nc == '0' ? 'selected': '' }}>Minor</option>







                                        </select>



                                         <label for="">Select SDG</label>



                                        <select class="form-select" name="sdg" id="">
                                            <option value="" >Select SGD here</option>

                                            <option value="1" {{ $temp_d->sdg == 1 ? 'selected' : '' }}>No Poverty</option>

                                            <option value="2" {{ $temp_d->sdg == 2 ? 'selected' : '' }}>Zero Hunger</option>

                                            <option value="3" {{ $temp_d->sdg == 3 ? 'selected' : '' }}>Good Health and Well Being</option>

                                            <option value="4" {{ $temp_d->sdg == 4 ? 'selected' : '' }}>Quality Education</option>

                                            <option value="5" {{ $temp_d->sdg == 5 ? 'selected' : '' }}>Gender Equality</option>

                                            <option value="6" {{ $temp_d->sdg == 6 ? 'selected' : '' }}>Clean Water and Sanitation</option>

                                            <option value="7" {{ $temp_d->sdg == 7 ? 'selected' : '' }}>Affordable and Clean Energy</option>

                                            <option value="8" {{ $temp_d->sdg == 8 ? 'selected' : '' }}>Decent Work and Economic Growth</option>

                                            <option value="9" {{ $temp_d->sdg == 9 ? 'selected' : '' }}>Industry, Innovation and Infrastructure</option>

                                            <option value="10" {{ $temp_d->sdg == 10 ? 'selected' : '' }}>Reduced Inequalities</option>

                                            <option value="11" {{ $temp_d->sdg == 11 ? 'selected' : '' }}>Sustainable cities and communities</option>

                                            <option value="12" {{ $temp_d->sdg == 12 ? 'selected' : '' }}>Responsible consumption and production</option>

                                            <option value="13" {{ $temp_d->sdg == 13 ? 'selected' : '' }}> Climate action</option>

                                            <option value="14" {{ $temp_d->sdg == 14 ? 'selected' : '' }}>Life below water</option>

                                            <option value="15" {{ $temp_d->sdg == 15 ? 'selected' : '' }}>Life on land</option>

                                            <option value="16" {{ $temp_d->sdg == 16 ? 'selected' : '' }}> Peace, justice and strong institutions</option>

                                            <option value="17" {{ $temp_d->sdg == 17 ? 'selected' : '' }}>Partnership for the goals</option>

                                        </select> 



                                        <div class="mb-3">



                                            <label for="">Question name</label>



                                            <input class="form-control" type="text" name="question_name" id="" value="{{ $temp_d->question_name }}">



                                        </div>







                                        <!-- Checkbox to toggle input type -->



                                        {{-- <div class="form-check mb-3 ms-4" style="display: inline-block; font-size: x-large;">



                                            <input class="form-check-input toggle-input" type="checkbox" id="toggleInputType{{ $temp_d->id }}" style="font-size: x-large; border: #5d87ff 2px solid;" name="multi_select">



                                            <label class="form-check-label">Toggle Input Type</label>



                                        </div> --}}



                            



                                        @if($template->multi_select == 0)



                                        <div class="mb-3" id="response-box{{ $temp_d->id }}">



                                            @foreach($temp_d->respGrp as $resp)



                                                <div class="form-check">



                                                    <input class="form-check-input" type="radio" value="{{ $resp->score }}" style="font-size: x-large;" name="{{ $temp_d->score_f }}">



                                                    <label class="form-check-label">{{ $resp->name }}</label>



                                                </div>



                                            @endforeach



                                        </div>



                                        @else



                                        <div class="mb-3" id="response-box{{ $temp_d->id }}">



                                            @foreach($temp_d->respGrp as $resp)



                                                <div class="form-check">



                                                    <input class="form-check-input" type="checkbox" value="{{ $resp->score }}" style="font-size: x-large;" name="response_score[]">



                                                    <label class="form-check-label">{{ $resp->name }}</label>



                                                </div>



                                            @endforeach



                                        </div>



                                        @endif



                            



                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>



                                    </form>



                                </div>



                                @endforeach



                            </div>



                            



                        </div>







                        



                    </div>



                </div>



                



                



            </div>



        </div>



    </div>







    



@endsection







































<div class="modal fade" id="templateDetailsModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">



    <div class="modal-dialog modal-dialog-centered">



      <div class="modal-content">



        <div class="modal-header">



          <h5 class="modal-title" id="exampleModalToggleLabel">Add an objective</h5>



          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



        </div>



        <div class="modal-body">







            <form action="{{ route('add-objective') }}" method="post">



                @csrf



                <div class="row">  







                    <input type="hidden" name="template_id" value="{{ $template->id }}">                        







                    <div class="mb-3 ">



                        <label class="form-label">Question name</label>



                        <input type="text" class="form-control" name="question_name">



                    </div>







                    <div class="mb-3 ">



                        <label class="form-label">Question</label>



                        <input type="text" class="form-control" name="question">



                    </div>











                    







                    <div class="mb-3 " id="response-box">



                        



                        



                    </div>







                    {{-- <div class="mb-3 ">



                        <label class="form-label">Add remarks</label>



                        <input type="text" class="form-control" name="remarks" disabled>



                    </div>







                    <div class="mb-3 ">



                        <label class="form-label">Give a Suggestion:</label>



                        <input type="text" class="form-control" name="suggestions" disabled>



                    </div> --}}



                    



                    <div class="modal-footer">



                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>



                        <button type="submit" class="btn btn-primary">ADD</button>



                    </div>



                </div>



                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}



            </form>







        </div>



        <div class="modal-footer">



          <button class="btn btn-primary" data-bs-target="#addResponsesModal" data-bs-toggle="modal">Add responses</button>



        </div>



      </div>



    </div>



</div>











<div class="modal fade" id="addResponsesModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">



    <div class="modal-dialog modal-dialog-centered">



        <div class="modal-content">



        <div class="modal-header">



            <h5 class="modal-title" id="exampleModalToggleLabel2">Add responses</h5>



            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



        </div>



        <div class="modal-body">











            <div class="row">



                @foreach($responses as $key => $value)



                <div class="col-md-6" style="    position: relative;">



                    <div class="card" >



                        <ul class="list-group list-group-flush">



                            @foreach($value as $val)



                            <li class="list-group-item">{{ $val->name }}, Score:{{ $val->score }}, Color:{{ $val->color }}</li>                            



                            {{-- <li class="list-group-item">{{ $val->score }}</li>



                            <li class="list-group-item">{{ $val->color }}</li> --}}



                            @endforeach



                        </ul>



                        <div class="form-check" style="    position: absolute; top: 0;right: 50px;">



                            <input class="form-check-input input-form-check" type="checkbox" value="{{ $val->group_id }}" id="flexCheckDefault_{{ $val->group_id }}" style="border: 1.25px solid #0060ff;">



                            



                        </div>



                    </div>



                    



                </div>



                @endforeach



                







            </div>



        







            



        </div>



        <div class="modal-footer">



            <button class="btn btn-primary" data-bs-target="#templateDetailsModal" data-bs-toggle="modal">Back to objective</button>



        </div>



        </div>



    </div>



</div>



  



<div class="modal fade" id="createResponseModal" aria-hidden="true" aria-labelledby="createResponseModalLabel2" tabindex="-1">



    <div class="modal-dialog modal-dialog-centered">



        <div class="modal-content">



        <div class="modal-header">



            <h5 class="modal-title" id="createResponseModalLabel2">Create responses</h5>



            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



        </div>



        <div class="modal-body">







            



            <div class="row " id="response-card-box">



                <div class="col-md-6 response-card-col" style="    position: relative;" id="">



                    <div class="card"  >



                        <form action="{{ route('submitResponsesForm') }}" method="post">



                            @csrf



                            <ul class="list-group list-group-flush">



                                <li class="list-group-item">



                                    <input class="form-control" type="text" placeholder="Name" name="name" id="name">



                                </li>



                                <li class="list-group-item" >



                                    <input class="form-control" type="text" placeholder="Score" name="score" id="score">



                                </li>



                                <li class="list-group-item">



                                    <input class="form-control" type="text" placeholder="Color" name="color" id="color">



                                </li>



                                <li class="list-group-item d-felx align-items-center">                            



                                    <input class="form-check-input" type="radio" name="is_base" id="is_base" style="    font-size: initial;



                                    border: 1px solid blue;



                                    margin-right: 10px;">



                                    <label class="form-check-label">Set as base</label>



                                </li>







                                <input type="hidden" class="group_id" name="form1" >



                            </ul>



                        </form>



                    </div>                    



                </div>



                



            </div>



            <button class="btn btn-primary" type="submit" onclick="submitForms()">Add response</button>



            <div class="loader loader--style8" title="7" id="mail-sent-loader">



                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"



                    width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">



                    <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">



                        <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />



                        <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />



                        <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />



                    </rect>



                    <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">



                        <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />



                        <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />



                        <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />



                    </rect>



                    <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">



                        <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />



                        <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />



                        <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />



                    </rect>



                </svg>



            </div>



            <div id="successPopup" style="display: none;    background-color: limegreen;text-align: center;color: white;">Response add successfully!</div>



            



             



            



        </div>



        <div class="modal-footer">



            <button class="btn" onclick="copyElement()"><i class="fa-solid fa-square-plus" style="



                font-size: xx-large;



            "></i></button>



        </div>



        </div>



    </div>



</div>















<div class="modal fade" id="changeResponsesModal" aria-hidden="true" aria-labelledby="changeResponsesModalLabel2" tabindex="-1">



    <div class="modal-dialog modal-dialog-centered">



        <div class="modal-content">



        <div class="modal-header">



            <h5 class="modal-title" id="changeResponsesModalLabel2">Change response</h5>



            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



        </div>



        <div class="modal-body">











            <div class="row">



                @foreach($responses as $key => $value)



                <div class="col-md-6" style="    position: relative;">



                    <div class="card" >



                        <ul class="list-group list-group-flush">



                            @foreach($value as $val)



                            <li class="list-group-item">{{ $val->name }}, Score:{{ $val->score }}, Color:{{ $val->color }}</li>                            



                            {{-- <li class="list-group-item">{{ $val->score }}</li>



                            <li class="list-group-item">{{ $val->color }}</li> --}}



                            @endforeach



                        </ul>



                        <div class="form-check" style="    position: absolute; top: 0;right: 50px;">



                            <input class="form-check-input input-check-form" type="checkbox" value="{{ $val->group_id }}" id="flexCheckDefault_{{ $val->group_id }}" style="border: 1.25px solid #0060ff;">



                            



                        </div>



                    </div>



                    



                </div>



                @endforeach



                







            </div>



        







            



        </div>



        <div class="modal-footer">



            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>



        </div>



        </div>



    </div>



</div>























@push('js')



    <script>



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











        /* ==================== REMOVING AN OBJECTIVE ==================== */



        $('.objective-xmark').click(function() {



            // Get the data-id attribute value of the clicked <i> tag



            var dataId = $(this).attr('data-id');



           



            if(confirm("Are your sure you want to remove this objective?")){







                $.ajax({



                    url: "{{ route('remove-objective') }}",



                    method: "POST",



                    data: {



                        dataId: dataId



                    },



                    headers: {



                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                    },



                    success: function(response){



                       $("#obj" + dataId).parent().remove();



                       $("#pills" + dataId).remove();



                        



                    }



                });







            }



            // Prevent the default behavior of the <i> tag (if any)



            return false;



        });











       /* ==================== MAKING COPY OF RESPONSE FORM ==================== */



        function copyElement() {



            var originalElement = document.querySelector('.col-md-6.response-card-col');



            var clonedElement = originalElement.cloneNode(true);



            



            // Clear input values in the cloned element



            var inputElements = clonedElement.querySelectorAll('input');



            inputElements.forEach(function(input) {



                input.value = '';



            });







            // Clear radio button selection in the cloned element



            var radioGroups = clonedElement.querySelectorAll('input[type="radio"]');



            var radioGroupMap = {}; // Track radio groups to prevent double selection



            radioGroups.forEach(function(radio) {



                if (!radioGroupMap[radio.name]) {



                    radioGroupMap[radio.name] = true;



                    radio.checked = false;



                }



            });











            originalElement.parentNode.appendChild(clonedElement);



        }



        



        /* ==================== CREATE RESPONSES  ==================== */



        function submitForms() {



            $('#mail-sent-loader').css('display', 'inline-block');



            



            var forms = document.querySelectorAll('.response-card-col form');



            var formData = [];







            forms.forEach(function(form) {



                var name = form.querySelector('input[name="name"]').value;



                var score = form.querySelector('input[name="score"]').value;



                var color = form.querySelector('input[name="color"]').value;



                var is_base = form.querySelector('input[name="is_base"]').value;











                formData.push({



                    name: name,



                    score: score,



                    color: color,



                    is_base: is_base







                });



            });







            // Send the form data to the Laravel route using AJAX



            var csrfToken = document.querySelector('meta[name="csrf-token"]').content;



            var url = "{{ route('submitResponsesForm') }}";







            fetch(url, {



                method: 'POST',



                headers: {



                    'Content-Type': 'application/json',



                    'X-CSRF-TOKEN': csrfToken



                },



                body: JSON.stringify(formData)



            })



            .then(function(response) {



                // Handle the response from the server



                if (response.ok) {



                    $('#mail-sent-loader').css('display', 'none');



                    $('#successPopup').fadeIn().delay(5000).fadeOut();







                    console.log('Forms submitted successfully');



                    // You can perform additional actions here, such as showing a success message



                    



                } else {



                    console.log('Error submitting forms');



                    // Handle the error condition, such as displaying an error message



                }



            })



            .catch(function(error) {



                console.log('Error:', error);



                // Handle any other errors that may occur during the AJAX request



            });



        }











       /* ==================== ADD RESPONSES TO AN OBJECTIVE ==================== */



        var checkboxes = document.querySelectorAll(".input-form-check");







        checkboxes.forEach(function(checkbox) {



            checkbox.addEventListener("click", function() {



                if (this.checked) {



                    console.log("Checkbox clicked! Performing AJAX call...");



                    let checkVal = checkbox.getAttribute('value');







                    $.ajax({



                        url: "{{ route('fetch.response.id') }}",



                        method: "POST",



                        data: {



                            checkVal: checkVal



                        },



                        headers: {



                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                        },







                        success: function(response) {



                            var responseContainer = document.getElementById("response-box");



                            responseContainer.innerHTML =  "";







                            let resp = response.resp;



                            console.log(resp[0].group_id);







                            var input = document.createElement("input");



                            input.setAttribute('type', 'hidden');



                            input.setAttribute('value',resp[0].group_id);



                            input.setAttribute('name',"group_id");



                            responseContainer.appendChild(input);







                            // if (Array.isArray(response)) {



                                resp.forEach(function(element) {



                                







                                    var formCheck = document.createElement("div");



                                    formCheck.className = "form-check";







                                    



                                    



                                    formCheck.innerHTML = "<input class='form-check-input' type='checkbox' value='' name='' ><label class='form-check-label pt-0' for='flexCheckDefault1'> " + element.name +" </label>";



                                    



                                    responseContainer.appendChild(formCheck);



                                });



                            // }



                        }







                    });



                }



            });



        });















        /* ==================== CHANGE RESPONSES TO AN OBJECTIVE ==================== */



        var checkboxes2 = document.querySelectorAll(".input-check-form");







        checkboxes2.forEach(function(checkbox) {



            checkbox.addEventListener("click", function() {



                if (this.checked) {



                    console.log("Checkbox2 clicked!");







                    let checkVal = checkbox.getAttribute('value');



                    console.log(checkVal);







                   



                    let activeNavLink = document.querySelector('.nav-pills .nav-item .nav-link.active');



                    let objID = activeNavLink.getAttribute('data-id');



                    console.log(objID);







                    $.ajax({



                        url: "{{ route('change.response') }}",



                        method: "POST",



                        data: {



                            checkVal: checkVal,



                            objID : objID



                        },



                        headers: {



                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                        },







                        success: function(response) {



                            // var responseContainer = document.getElementById("response-box");



                            // responseContainer.innerHTML =  "";



                            console.log(response);



                            // let resp = response.resp;



                            // console.log(resp[0].group_id);







                            /* var input = document.createElement("input");



                            input.setAttribute('type', 'hidden');



                            input.setAttribute('value',resp[0].group_id);



                            input.setAttribute('name',"group_id");



                            responseContainer.appendChild(input); */







                            



                                /*resp.forEach(function(element) {



                                    var formCheck = document.createElement("div");



                                    formCheck.className = "form-check";                                    



                                    formCheck.innerHTML = "\



                                        <input class='form-check-input' type='checkbox' value='' name='' >\



                                        <label class='form-check-label pt-0' for='flexCheckDefault1'> " + element.name +" </label>\



                                    ";                                    



                                    responseContainer.appendChild(formCheck);



                                });*/



                           



                        }







                    });



                }



            });



        });















// $(document).ready(function(){











        



//         document.addEventListener('DOMContentLoaded', function () {



//             const toggleCheckboxes = document.querySelectorAll('.toggle-input');







//             toggleCheckboxes.forEach(toggleCheckbox => {



//                 const responseBox = document.querySelector(`#response-box${toggleCheckbox.id.slice(-1)}`);



//                 const radios = responseBox.querySelectorAll('input[type="radio"]');







                



//                 toggleCheckbox.addEventListener('change', function () {



                    



//                     const isRadio = radios[0].type === 'radio';







                    



//                     radios.forEach(radio => {



//                         if (isRadio) {



                            



//                             radio.type = 'checkbox';



//                         } else {



                            



//                             radio.type = 'radio';



//                         }



//                     });



//                 });



//             });



//         });







//     });



       



    </script>



@endpush



