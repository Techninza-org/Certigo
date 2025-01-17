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


  <div class="col-lg-12 d-flex align-items-strech">





   








    <div class="card w-100" style="background-color: #f0f7ff;" >


      <div class="card-body">


        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">


          Add Client


        </button> --}}


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


        <div class=" d-block align-items-center justify-content-between mb-9">


            <div class="row">

              <div class="col-lg-12">
                <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#createResponseModal">



                  <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Create response



              </button>
              </div>

                @foreach($responses as $respGrp)


                <div class="col-md-4 col-sm-12 ">


                  <div class="card" >


                    <ul class="list-group list-group-flush" style="    position: relative;">


                      @foreach($respGrp as $r)


                      <li class="list-group-item" style="color:{{ $r->color }}">{{ $r->name }} {{ $r->score }} {{ $r->color }}</li>


                      @endforeach


                      {{-- <li class="list-group-item"></li>


                      <li class="list-group-item"></li> --}}


                    </ul>


                    {{-- <i class="fa-solid fa-pen-to-square" style="position: absolute;right: 0;top: 0;"></i> --}}


                    <a href="{{ route('delete-response') }}" onclick="event.preventDefault();document.getElementById('delete-response{{ $r->group_id }}').submit();"><i class="fa-solid fa-trash" style="position: absolute;right: 25px;top: 0;"></i></a>


                    <form  id="delete-response{{ $r->group_id }}" action="{{ route('delete-response') }}" method="get">


                      <input type="hidden" value="{{ $r->group_id }}" name="group_id">


                    </form>


                  </div>


                  


                </div>


                @endforeach


            </div>


        </div>


       


      </div>


    </div>


  </div>


  


</div>





@endsection


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


@push('js')








<script>


 








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









</script>


@endpush