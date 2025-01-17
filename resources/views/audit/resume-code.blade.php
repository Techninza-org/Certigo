@extends('layout.layout')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
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

        .form-check .form-check-input {
            
            margin-left: 0;
        }

        .image-container .image-item button{
            position:absolute;
        }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card w-100 mb-2">
        <div class="card-body p-0">
          <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('index') }}">  Clients</a>
          <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('back.client.audit') }}" onclick="event.preventDefault(); document.getElementById('back-client-audits{{ $clientId }}').submit();">  Client's Audits</a>
          <form id="back-client-audits{{ $clientId }}" action="{{ route('back.client.audit') }}" method="get" class="d-none">                                                       
            <input type="hidden" value="{{ $clientId }}" name="cid">
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
                                    <p><strong>Start time:</strong>{{ $audit->formated_date }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <h4 class="text-center fw-bold">{{ $audit->audit_name }}</h4>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                </div>
                            </div>                           
                        </div>
                        <div class="col-md-12">
                            <div class="d-lg-flex d-md-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3 mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <strong class="mb-3" style="font-size: 12px">AREA OF CONCERN</strong>
                                    @foreach($tenplates_names_in_audit as $key => $tem_in_aud)
                                        <button class="nav-link text-nowrap {{ $key == 0 ? 'active' : '' }}" 
                                                id="v-pills-home-tab{{ $tem_in_aud->id }}" 
                                                data-bs-toggle="pill" data-bs-target="#v-pills-home{{ $tem_in_aud->id }}" 
                                                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $tem_in_aud->template_name }}</button>
                                    @endforeach                                  
                                </div>
                                <div class="tab-content pt-4" id="v-pills-tabContent" style="    width: -webkit-fill-available;">
                                    @if (\Session::has('success')) 
                                    <div class="alert alert-success"> 
                                        <ul> 
                                            <li>{!! \Session::get('success') !!} </li> 
                                        </ul> 
                                    </div> 
                                    @endif
                                    @if (\Session::has('error')) 
                                    <div class="alert alert-success"> 
                                        <ul> 
                                            <li>{!! \Session::get('error') !!} </li> 
                                        </ul> 
                                    </div> 
                                    @endif
                                    @foreach($tenplates_names_in_audit as  $key => $tem_in_aud)

                                    <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" 
                                        id="v-pills-home{{ $tem_in_aud->id }}" role="tabpanel" 
                                        aria-labelledby="v-pills-home-tab{{ $tem_in_aud->id }}" tabindex="0">
                                        
                                    </div>
                                    
                                    @endforeach

                                  {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div> --}}
                                  
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script>

$(document).ready(function() {
    var childElements = $('#v-pills-tab').children('button');
    
    childElements.each(function() {
        var id = $(this).attr('id');
        let tem_id = id.slice(-1);
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

                console.log(response);
                let resTemId = response.data[0]['template_id'];

                // <ul> starts
                let htmlContent = '<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';

                    // making of  <li> starts 
                    response.data.forEach(function(item, index) {
                        let t_name = item.template_name;
                        let f_char = t_name.charAt(0);
                        let index_space = t_name.indexOf(" ");
                        let sec_char = t_name.charAt(index_space + 1);
                        let indexPOne = index + 1;
                        let isActive = indexPOne === 1 ? 'active' : '';
                        htmlContent += '<li class="nav-item" role="presentation">';
                        htmlContent += '<button class="nav-link ' + isActive + '" id="pills-home-tab' + item.id + '" data-bs-toggle="pill" data-bs-target="#pills-home' + item.id + '" type="button" role="tab" aria-controls="pills-home' + item.id + '" aria-selected="true">' + f_char + sec_char + '-' + indexPOne + '</button>';
                        htmlContent += '</li>';
                    });
                    // making of  <li> ends 

                htmlContent += '</ul>';
                // <ul> ends

                // tab-content div starts 
                htmlContent += '<div class="tab-content" id="pills-tabContent" style="width: -webkit-fill-available">';  // tab-content started

                    // making of tab-pane div starts
                    response.data.forEach(function(item, index) {
                        let t_name = item.template_name;
                        let f_char = t_name.charAt(0);
                        let index_space = t_name.indexOf(" ");
                        let sec_char = t_name.charAt(index_space + 1);
                        let indexPOne = index + 1;
                        let isActive = indexPOne === 1 ? 'active' : '';
                        htmlContent += '<div class="tab-pane fade show ' + isActive + '" id="pills-home' + item.id + '" role="tabpanel" aria-labelledby="pills-home-tab' + item.id + '" tabindex="0">';        // tab-pane started
                            htmlContent += '<form action="{{ route("fillAudit") }}" method="post" enctype="multipart/form-data">@csrf';                        
                            
                                            htmlContent += '<input type="hidden" name="audit_id" value="{{ $audit->id }}">';                        
                                            htmlContent += '<input type="hidden" name="question_id" value="' + item.id + '">';
                                            htmlContent += '<input type="hidden" name="template_id" value="' + item.template_id + '">';
                                            htmlContent += '<input type="hidden" name="template_name" value="' + item.template_name + '">';

                                            htmlContent += '<p class="question-p">' + item.question + '</p>';                    
                                
                                        htmlContent += '</form>';
                        htmlContent += '</div>';

                        // Store the current tab-pane element's ID to use inside the AJAX success callback
                        let currentTabPaneId = 'pills-home' + item.id; 


                         // Toggle Response type with radio and checkbox start
                         let audi_id = $("input[name='audit_id_global']").val();                                       
                        $.ajax({
                            url: '{{ route('getResponseType') }}',
                            method: 'POST',
                            data: {
                                audi_id: audi_id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // console.log("audit wuth multi type"+response.multi_select);
                                let multi_val = response.multi_select;

                                // Find the current tab-pane element
                                let currentTabPane = $('#' + currentTabPaneId);
                               
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
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        // console.log(response);
                                        let respContent = '<div class="mb-3 " id="response-box">';
                                        response.data.forEach(function (itemr) {
                                            respContent += '<div class="form-check">\
                                                                <input class="form-check-input" type="' + (multi_val === 1 ? 'checkbox' : 'radio') + '" value="' + itemr.score + '" data-respid="' + itemr.id + '"  style="font-size: x-large;" name="' + (multi_val === 1 ? 'response_score[]' : 'response_score') + '">\
                                                                <label class="form-check-label" style="    margin-left: 10px;"> ' + itemr.name + ' </label>\
                                                            </div>';
                                        });

                                        respContent += '</div>';

                                        // Find the current tab-pane element and add respContent inside it
                                        $('#' + currentTabPaneId).find('form').append(respContent);   
                                        
                                        let inputFields = '<div class="mb-3 ">\
                                                                <label class="form-label">Objective evidences:</label>\
                                                                <input type="text" class="form-control" name="objective_evidences" >\
                                                            </div>\
                                                            <div class="mb-3 ">\
                                                                <label class="form-label">Give a Suggestion:</label>\
                                                                <input type="text" class="form-control" name="suggestions" >\
                                                            </div>\
                                                            <div class="mb-3 ">\
                                                                <label class="form-label">Upload evidences:</label>\
                                                                <input type="file" class="form-control" name="evidences[]" multiple >\
                                                            </div>\
                                                            <div class="mb-3 ">\
                                                                <label class="form-label">Uploaded evidences:</label>\
                                                                <div class=" row image-container d-flex justify-content-evenly" ></div>\
                                                            </div>\
                                                            <button type="submit" class="btn btn-primary btn-sm submit-btn">Submit</button>';

                                        $('#' + currentTabPaneId).find('form').append(inputFields);                                

                                    }
                                });
                                // Add responses end

                            }
                        });
                        // Toggle Response type with radio and checkbox start


                       

                       // Fetch audit details data from the server start                      
                       let aud_id = $("input[name='audit_id_global']").val();
                            //    console.log("audit id="+aud_id);
                       let itemId = item.id;
                        $.ajax({
                            url: '{{ route('getFormData') }}',
                            method: 'POST',
                            data: {
                                itemId: itemId, // Pass the item ID or any other identifier
                                audi_id: aud_id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // Now you have the data from the server in the response
                                // console.log(response);
                                // Assuming 'response' contains the data retrieved from the database
                                let formD = response; // Adjust this based on your actual data structure
                                // formData.forEach(function(formD){
                                    // Populate input fields with the data
                                    const formDResponseScore = formD.response_score;
                                    const dataArray = JSON.parse(formDResponseScore);
                                    // console.log("responses are"+dataArray);
                                    if (Array.isArray(dataArray)) {
                                        const currentTabPaneId = "pills-home"+ item.id; // Replace this with the ID of your current active tab-pane
                                        const checkboxes = $('#' + currentTabPaneId).find('input[name="response_score"]');

                                        dataArray.forEach(value => {
                                        // console.log(value);

                                            checkboxes.filter('[value="' + value + '"]').prop('checked', true);
                                        });
                                    }
                                    // $('#' + currentTabPaneId).find('input[name="response_score"]').filter('[value="' + formD.response_score + '"]').prop('checked', true);

                                    $('#' + currentTabPaneId).find('input[name="objective_evidences"]').val(formD.objective_evidences);
                                    $('#' + currentTabPaneId).find('input[name="suggestions"]').val(formD.suggestions);
                                    // Show the image
                                    let imageElement = $('#' + currentTabPaneId).find('.image-container'); // Assuming you have a div with a class 'image-container' to display the image
                                    imageElement.empty(); // Clear any existing content
                                    if (Array.isArray(formD.img)) {

                                    formD.img.forEach(function(image,index){
                                        // Inside the success function where you populate the image
                                        let imageUrl = '{{ env("APP_URL") }}' + '/' + image;
                                        imageElement.append('<div class="col-md-3 col-sm-12 image-item"><a href="' + imageUrl + '" class="fancybox" data-fancybox="gallery' + item.id + '"><img src="' + imageUrl + '" style="max-width: 100px;"></a><a class="close-btn" href="{{ route("removeEvidence") }}" onclick="event.preventDefault();document.getElementById(\'remove-evidence' + index + '\').submit();">&times;</a><form id="remove-evidence' + index + '" action="{{ route("removeEvidence") }}" method="get"><input type="hidden" name="audit_id" value="{{ $audit->id }}"><input type="hidden" name="question_id" value="' + formD.question_id + '"><input type="hidden" name="imageIndex" value="' + index + '"></form></div>');
                                        
                                        // Event delegation to handle click on the close button
                                        // $(document).on('click', '.close-btn', function() {
                                        //     // Find the closest image-item div and remove it
                                        //     $(this).closest('.image-item').remove();
                                        // });

                                    });
                                 }
                                    
                                    // ... Add other input fields and their respective data as needed
                                // });
                                
                            },
                            error: function(xhr, status, error) {
                                // Handle the error response
                            }
                        });
                        // Fetch audit details data from the server end
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




    // // Event delegation to handle form submission for dynamically added submit buttons
    // $(document).on('click', '.submit-btn', function(event) {
    //     event.preventDefault(); // Prevent the default form submission behavior

    //     // Get the closest form element to the clicked submit button
    //     var form = $(this).closest('form');

    //     // Do any further processing or validation if needed

    //     // Submit the form
    //     form.submit();
    // });




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








    </script>
@endpush
 {{-- htmlContent += '<div class="mb-3 ">\
                     <label class="form-label">Objective evidences:</label>\
                     <input type="text" class="form-control" name="remarks" >\
                 </div>\
                 <div class="mb-3 ">\
                     <label class="form-label">Give a Suggestion:</label>\
                     <input type="text" class="form-control" name="suggestions" >\
                 </div>\
                 <div class="mb-3 ">\
                     <label class="form-label">Upload evidences:</label>\
                     <input type="file" class="form-control" name="evidences" >\
                 </div>';

     htmlContent += '<button type="submit" class="btn btn-primary btn-sm">Submit</button>'; --}}





                    {{-- let resGrp = item.response_group;
                    console.log(resGrp);                    
                    $.ajax({
                        url: '{{ route('getResGrp') }}',
                        method: 'POST',
                        data: {
                            resGrp: resGrp
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            let respContent = '<div class="mb-3 " id="response-box">';
                            response.data.forEach(function(itemr) {
                                respContent += '<div class="form-check">\
                                                    <input class="form-check-input" type="checkbox" value="' + itemr.score + '"  style="font-size: x-large;" name="' + itemr.name + '">\
                                                    <label class="form-check-label" style="    margin-left: 10px;"> ' + itemr.name + ' </label>\
                                                </div>';
                            });

                            respContent += '</div>';
                            
                            $("#v-pills-home" + resTemId).find('.qResBox').html(respContent);
                            
                        }
                    });
                  --}}