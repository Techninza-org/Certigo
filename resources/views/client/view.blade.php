@extends('layout.layout')



@push('css')



<style>



.short-name h2{



    background: #1f658e;



    display: inline-block;



    padding: 15px;



    border-radius: 50%;



    color: white;



}















.nav-tabs .nav-link {



    



    background: #dbdbdb;



    border-radius:0px;



    color: black;



}







.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {



    color: #fff!important;



    background-color: #5d87ff!important;



    border-color: var(--bs-nav-tabs-link-active-border-color);



}







@media only screen and (max-width: 485px) {



    .nav-tabs div {



     width: -webkit-fill-available;



    }



}







.table-headings{



  font-size:20px;



  font-weight: 600;



  color: black;



  text-decoration: underline;



}



</style>



@endpush



@section('content')







<div class="row">



  <div class="col-lg-12 col-md-12">



    <div class="card w-100 mb-2">



      <div class="card-body p-0">



        <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('index') }}">  Clients</a>



      </div>



    </div>



  </div>



</div>






@if (Session::has('success')) 


                    <div class="alert alert-success"> 


                        


                            {!! \Session::get('success') !!} 


                        


                    </div> 


                    @endif


                    @if (Session::has('error')) 


                    <div class="alert alert-danger"> 


                        


                            {!! \Session::get('error') !!} 


                        


                    </div> 


                    @endif



<div class="row">



  <div class="col-lg-12 d-flex align-items-strech">



    <div class="card w-100">



      <div class="card-body">



        <div class="short-name text-center mb-3">



            <h2>{{ $f }}{{ $s }}</h2>



        </div>







        <div class="text-center mb-3">



            <h4> {{ $viewCl->fname }} {{ $viewCl->lname }} ( {{ $viewCl->designation }} )</h4>



            <h5> {{ $viewCl->organisation }} </h5>



            <h5> {{ $viewCl->organisation_location }} </h5>







        </div>







        <div class="row justify-content-center">



            <div class="col-md-2 col-sm-6 text-center">



                <strong>Audits</strong>



                <p>{{ $viewCl->no_audit_conduct }}</p>



            </div>



            <div class="col-md-2 col-sm-6 text-center">



                <strong>Samples</strong>



                <p>{{ $viewCl->no_samples_collect }}</p>



            </div>



            <div class="col-md-2 col-sm-6 text-center">



                <strong>Trainings</strong>



                <p>{{ $viewCl->no_trainings_conduct }}</p>



            </div>



            <div class="col-md-2 col-sm-6 text-center">



                <strong>Contract</strong>



                <p> ₹ {{ $viewCl->contract_amount }}</p>



            </div>



        </div>







        <div>



            <div class="p-2  mb-5">



                <div class="row d-flex">                



                    <ul class="nav nav-tabs nav-justified mb-3 justify-content-center" id="ex1" role="tablist">



                        <div class="col-md-4 col-sm-12">                        



                            <li class="nav-item" role="presentation">



                            <a



                                class="nav-link active"



                                id="ex3-tab-1"



                                data-bs-toggle="tab"



                                href="#ex3-tabs-1"



                                role="tab"



                                aria-controls="ex3-tabs-1"



                                aria-selected="true"



                                >Upcoming</a



                            >



                            </li>



                        </div>



                        <div class="col-md-4 col-sm-12">  



                        <li class="nav-item" role="presentation">



                        <a



                            class="nav-link"



                            id="ex3-tab-2"



                            data-bs-toggle="tab"



                            href="#ex3-tabs-2"



                            role="tab"



                            aria-controls="ex3-tabs-2"



                            aria-selected="false"



                            >In Progress </a



                        >



                        </li>



                    </div>



                    <div class="col-md-4 col-sm-12">  



                        <li class="nav-item" role="presentation">



                        <a



                            class="nav-link"



                            id="ex3-tab-3"



                            data-bs-toggle="tab"



                            href="#ex3-tabs-3"



                            role="tab"



                            aria-controls="ex3-tabs-3"



                            aria-selected="false"



                            >Completed</a



                        >



                        </li>



                    </div>



                    </ul>



                </div>



                  <div class="tab-content" id="ex2-content" style="overflow-x: auto;">







                    {{-- UPCOMING START  --}}



                    <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1" >







                      @if(!$upaudits->isEmpty())                      



                      <p class="table-headings mb-3" >Audits</p>



                      <table class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Audit </th>



                              <th scope="col">Auditor</th>



                              <th scope="col">Budget</th>







                              {{-- <th scope="col"><i class="fa-solid fa-gauge-high"></i> Completion</th> --}}



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($upaudits as $ua)



                            <tr>



                              <th class="d-none" scope="row">{{ $ua->id }}</th>



                              <td>{{ $ua->audit_name }}</td>



                              <td>{{ $ua->auditors }}</td>



                              <td>₹ {{ $ua->amount }}</td>



                              {{-- <td></td> --}}



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                      No audits to show <br>



                      @endif















                      @if(!$uptraining->isEmpty())



                      <p class="table-headings mb-3">Trainings</p>



                      <table  class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Topic </th>



                              <th scope="col">Start Date</th>



                              <th scope="col">Location</th>



                              <th scope="col"> Amount</th>



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($uptraining as $train)



                            <tr>



                              <td style="display: none">{{ $train->id }}</td>



                              <td>{{ $train->topic }} </td>



                              <td>@php



                                  $date = date('F j, Y  H:i A', strtotime($train->audit_start_date));



                                  @endphp



                                  {{ $date }}



                              </td>



                              <td>{{ $train->location }}</td>



                              <td> ₹ {{ $train->amount }}</td>



                              



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                      No trainings to show <br>



                      @endif











                      @if(!$upsamples->isEmpty())



                      <p class="table-headings mb-3">Samples</p>



                      <table  class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Name </th>



                              <th scope="col">Start Date</th>



                              <th scope="col">Type</th>



                              <th scope="col"> Client</th>



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($upsamples as $train)



                            <tr>



                              <td style="display: none">{{ $train->id }}</td>



                              <td>{{ $train->name }} </td>



                              <td>@php



                                  $date = date('F j, Y  H:i A', strtotime($train->date));



                                  @endphp



                                  {{ $date }}



                              </td>



                              <td>{{ $train->type }}</td>



                              <td> {{ $train->client }}</td>



                              



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                      No samples to show <br>



                      @endif



                    </div>



                    {{-- UPCOMING END --}}











                    {{-- IN_PROGRESS START --}}



                    <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">



                      @if(!$inaudits->isEmpty())



                      <p class="table-headings mb-3">Audits</p>



                      <table class="table display table-striped">



                        <thead>



                          <tr>



                            <th class="d-none" scope="col"></th>



                            <th scope="col">Audit </th>



                            <th scope="col">Auditor</th>



                            <th scope="col">Budget</th>







                            {{-- <th scope="col"><i class="fa-solid fa-gauge-high"></i> Completion</th> --}}



                          </tr>



                        </thead>



                        <tbody>



                            @foreach($inaudits as $ua)



                          <tr>



                            <th class="d-none" scope="row">{{ $ua->id }}</th>



                            <td>{{ $ua->audit_name }}</td>



                            <td>{{ $ua->auditors }}</td>



                            <td>₹ {{ $ua->amount }}</td>



                            {{-- <td></td> --}}



                          </tr>



                          @endforeach



                        </tbody>



                    </table>



                    @else



                      No audits to show <br>



                      @endif







                      @if(!$intraining->isEmpty())



                    <p class="table-headings mb-3">Trainings</p>



                      <table  class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Topic </th>



                              <th scope="col">Start Date</th>



                              <th scope="col">Location</th>



                              <th scope="col"> Amount</th>



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($intraining as $train)



                            <tr>



                              <td style="display: none">{{ $train->id }}</td>



                              <td>{{ $train->topic }} </td>



                              <td>@php



                                  $date = date('F j, Y  H:i A', strtotime($train->audit_start_date));



                                  @endphp



                                  {{ $date }}



                              </td>



                              <td>{{ $train->location }}</td>



                              <td> ₹ {{ $train->amount }}</td>



                              



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                      No trainings to show <br>



                      @endif







                      @if(!$insamples->isEmpty())



                      <p class="table-headings mb-3">Samples</p>



                      <table  class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Name </th>



                              <th scope="col">Start Date</th>



                              <th scope="col">Type</th>



                              <th scope="col"> Client</th>



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($insamples as $train)



                            <tr>



                              <td style="display: none">{{ $train->id }}</td>



                              <td>{{ $train->name }} </td>



                              <td>@php



                                  $date = date('F j, Y  H:i A', strtotime($train->date));



                                  @endphp



                                  {{ $date }}



                              </td>



                              <td>{{ $train->type }}</td>



                              <td> {{ $train->client }}</td>



                              



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                    No samples to show <br>



                    @endif



                    </div>



                    {{-- IN_PROGRESS END --}}











                   











                    {{-- COMPLETED START --}}



                    <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">



                      @if(!$cmaudits->isEmpty())



                      <p class="table-headings mb-3">Audits</p>                     



                      <table class="table display table-striped">



                        <thead>



                          <tr>



                            <th class="d-none" scope="col"></th>



                            <th scope="col">Audit </th>



                            <th scope="col">Auditor</th>



                            <th scope="col">Budget</th>







                            {{-- <th scope="col"><i class="fa-solid fa-gauge-high"></i> Completion</th> --}}



                          </tr>



                        </thead>



                        <tbody>



                            @foreach($cmaudits as $ua)



                          <tr>



                            <th class="d-none" scope="row">{{ $ua->id }}</th>



                            <td>{{ $ua->audit_name }}</td>



                            <td>{{ $ua->auditors }}</td>



                            <td>₹ {{ $ua->amount }}</td>



                            {{-- <td></td> --}}



                          </tr>



                          @endforeach



                        </tbody>



                    </table>



                    @else



                    No audits to show <br>



                    @endif











                    @if(!$cmtraining->isEmpty())



                    <p class="table-headings mb-3">Trainings</p>



                      <table  class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Topic </th>



                              <th scope="col">Start Date</th>



                              <th scope="col">Location</th>



                              <th scope="col"> Amount</th>



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($cmtraining as $train)



                            <tr>



                              <td style="display: none">{{ $train->id }}</td>



                              <td>{{ $train->topic }} </td>



                              <td>@php



                                  $date = date('F j, Y  H:i A', strtotime($train->audit_start_date));



                                  @endphp



                                  {{ $date }}



                              </td>



                              <td>{{ $train->location }}</td>



                              <td> ₹ {{ $train->amount }}</td>



                              



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                    No trainings to show <br>



                    @endif











                    @if(!$cmsamples->isEmpty())



                      <p class="table-headings mb-3">Samples</p>



                      <table  class="table display table-striped">



                          <thead>



                            <tr>



                              <th class="d-none" scope="col"></th>



                              <th scope="col">Name </th>



                              <th scope="col">Start Date</th>



                              <th scope="col">Type</th>



                              <th scope="col"> Client</th>



                            </tr>



                          </thead>



                          <tbody>



                              @foreach($cmsamples as $train)



                            <tr>



                              <td style="display: none">{{ $train->id }}</td>



                              <td>{{ $train->name }} </td>



                              <td>@php



                                  $date = date('F j, Y  H:i A', strtotime($train->date));



                                  @endphp



                                  {{ $date }}



                              </td>



                              <td>{{ $train->type }}</td>



                              <td> {{ $train->client }}</td>



                              



                            </tr>



                            @endforeach



                          </tbody>



                      </table>



                      @else



                      No samples to show <br>



                      @endif







                    </div>



                    {{-- COMPLETED END --}}



                    



                  </div>



              </div>



        </div>







        <div>


          <div>



            <a class="btn btn-primary" href="{{ route('consolidated', $viewCl->id) }}" target="_blank">Generate Consolidated Report</a>
          
          
          
          </div>
          
          
          {{-- <div>
          
          
          
            <a class="btn" href="{{ route('sendconsolidated', $viewCl->id) }}" >Send Consolidated Report</a>
          
          
          
          </div> --}}

          <div class="mt-8">



            <b>Consolidated Reports</b>



          </div>



          <table class="table display table-striped">
            <thead>
              <tr>
                <th  scope="col">Sr. No.</th>
                <th scope="col">Title </th> 
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($consolidated as $one)
              <tr>
                <td  scope="row">{{ $one->id }}</td>
                <td>{{ $one->title }}</td>  
                <td>
                  <a class="btn" href="{{ route('consolidated_quarter', [$viewCl->id,$one->quarter]) }}" >View Report</a>

                    {{-- <a class="btn" href="{{ route('send_consolidated_quarter_link', [$viewCl->id,$one->quarter]) }}" >Send Report</a> --}}
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







@endsection







@push('js')



















<script>



 



 $('#auditTable').DataTable({



      order:[[0,'desc']]



  });







  $('#trainTable').DataTable({



      order:[[0,'desc']]



  });







  







</script>



@endpush