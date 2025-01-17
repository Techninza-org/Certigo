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


</style>


@endpush


@section('content')


    <div class="row">


        <div class="col-lg-12 d-flex align-items-strech">


            <div class="card w-100">


                <div class="card-body">


                    <div>


                        <a href="{{ route('get.templates') }}" class="btn"><i class="fa-regular fa-circle-left"


                            style="font-size: x-large;"></i>Folders</a>


                    </div>


                    <div>


                        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#templateAddModal">


                            <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add New template


                          </button>





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


                    </div>


                    <div class="row">


                        @foreach($templates as $template)


                        <div class="col-md-2 text-center">


                           


                            <div class="text-end" style="    position: relative;">


                                <i class="fa-solid fa-ellipsis btn popupButton"></i>


                                


                                <div id="popup" class="popup">


                                    {{-- <div class="option d-flex p-2">


                                        <a class="btn pt-0 pb-0" href="{{ route('open-template' ) }}" onclick = "event.preventDefault(); document.getElementById('open-template{{ $template->id }}').submit();">  


                                            <i class="fa-solid fa-book"></i> Open </a>


                                        <form id="open-template{{ $template->id }}" action="{{ route('open-template') }}" method="get" class="d-none">


                                            <input type="hidden" name="folderid" value="{{ $folderid }}">


                                        


                                            <input type="hidden" name="templateId" value="{{ $template->id }}">


                                        </form>


                                    </div> --}}


                                    <div class="option d-flex p-2">


                                        <a class="btn pt-0 pb-0" href="{{ route('get-edit-template' ) }}" onclick = "event.preventDefault(); document.getElementById('edit-template{{ $template->id }}').submit();">  <i class="fa-solid fa-pen-to-square"></i> Edit </a>


                                        <form id="edit-template{{ $template->id }}" action="{{ route('get-edit-template') }}" method="get" class="d-none">


                                            <input type="hidden" name="folderid" value="{{ $folderid }}">


                                        


                                            <input type="hidden" name="templateId" value="{{ $template->id }}">


                                        </form>


                                    </div>


                                    <div class="option d-flex p-2">


                                        <a class="btn pt-0 pb-0" href="{{ route('removeTemplate') }}" onclick="event.preventDefault(); document.getElementById('delete-template{{ $template->id }}').submit();">


                                            <i class="fa-solid fa-trash-can" style="color: red"></i> Delete </a>
    
    
                                            <form id="delete-template{{ $template->id }}" action="{{ route('removeTemplate') }}" method="post" class="d-none">
    
    
                                                @csrf
    
    
                                                <input type="hidden" value="{{ $template->id }}" name="templateId">
    
    
                                            </form>


                                  </div>


                                </div>


                              </div>    


                             <i class="fa-solid fa-file" style="color: #1d6d96;font-size: x-large;"></i>  <br>  


                              <p class="m-0" style="    font-size: 15px;">{{ $template->template_name }}</p> 


                              <p class="m-0" style="    font-size: 10px;">{{ $template->description }}</p> 


                              <p class="m-0 text-primary" style="    font-size: 10px;">Total Objectives: {{ $template->oc }}</p> 


                                                


                        </div>


                        @endforeach


                    </div>


                </div>


                


                


            </div>


        </div>


    </div>





    


@endsection





{{-- Template add model  --}}


<div class="modal fade" id="templateAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog">


        <div class="modal-content">


            <div class="modal-header">


                <h1 class="modal-title fs-5" id="exampleModalLabel">Add template</h1>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


            </div>


            <div class="modal-body">





                <form action="{{ route('template.store') }}" method="post">


                    @csrf


                    <div class="row">  





                        <input type="hidden" name="temp_folder_id" value="{{ $folderid }}">





                        <div class="mb-3 ">


                            <label class="form-label">Template type</label>


                            <select class="form-select" name="template_type" id="">


                                <option value="1">Hygienic template</option>


                                <option value="2">Industrial template</option>


                            </select>


                        </div>





                        <div class="mb-3 ">


                            <label class="form-label">Template name</label>


                            <input type="text" class="form-control" name="template_name">


                        </div>





                        <div class="mb-3 ">


                            <label class="form-label">Few words about this template</label>


                            <input type="text" class="form-control" name="description">


                        </div>





                        {{-- <div class="mb-3 ">


                            <input class="form-check-input toggle-input" type="checkbox"  style="font-size: large; border: #5d87ff 2px solid;" name="multi_select">


                            <label class="form-label">Multiple Selection</label>


                        </div> --}}


                        


                        <div class="modal-footer">


                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                            <button type="submit" class="btn btn-primary">ADD</button>


                        </div>


                    </div>


                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}


                </form>





            </div>





        </div>


    </div>


</div>








{{-- Template open model  --}}


<div class="modal fade" id="templateOpenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog">


        <div class="modal-content">


            <div class="modal-header">


                <h1 class="modal-title fs-5" id="exampleModalLabel">Template Details</h1>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


            </div>


            <div class="modal-body">





                {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">





                    @foreach($$template->details as $key => $temp_d)


                    <li class="nav-item" role="presentation">


                      <button class="nav-link {{$key === 0 ? ' active' : ''}}" id="pills-tab{{ $temp_d->id }}" data-bs-toggle="pill" data-bs-target="#pills{{ $temp_d->id }}" type="button" role="tab" aria-controls="pills{{ $temp_d->id }}" aria-selected="true">{{ $firstLetter }}{{ $letterAfterSpace }}-{{ $temp_d->id }}</button>


                    </li>


                    @endforeach





                    


                    


                </ul>


                <div class="tab-content" id="pills-tabContent">


                    @foreach($$template->details as $key => $temp_d)


                    <div class="tab-pane fade show {{$key === 0 ? ' active' : ''}}" id="pills{{ $temp_d->id }}" role="tabpanel" aria-labelledby="pills-tab{{ $temp_d->id }}" tabindex="0">


                        {{ $firstLetter }}{{ $letterAfterSpace }}-{{ $temp_d->id }}  .  {{ $temp_d->question }}


                    </div>                                


                    @endforeach





                    <div class="form-check">


                        <input class="form-check-input" type="checkbox" value="" id="Compliance" style="font-size: x-large;">


                        <label class="form-check-label" for="Compliance"> Compliance </label>


                    </div>


                    <div class="form-check">


                        <input class="form-check-input" type="checkbox" value="" id="Non-Compliance" style="font-size: x-large;">


                        <label class="form-check-label" for="Non-Compliance">Non-Compliance </label>


                    </div>


                    <div class="form-check">


                        <input class="form-check-input" type="checkbox" value="" id="N/A" style="font-size: x-large;">


                        <label class="form-check-label" for="N/A"> N/A </label>


                    </div>


                   


                   


                </div> --}}


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


    </script>


@endpush


