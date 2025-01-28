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



        .option a{

            width: -webkit-fill-available;

        }



        table{

            width: 1095px!important;

        }

</style>

@endpush

@section('content')

{{-- <p>{{$auditTrash}}</p> --}}

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body" style="overflow-x: auto;">
                <!-- Navigation Buttons -->
                <div style="margin-bottom: 15px;">
                    <div class="d-flex justify-content-between items-center">
                    <button id="backButton" class="btn btn-primary">Back</button>
                    <button id="forwardButton" class="btn btn-secondary">Forward</button>
                    </div>
                </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">

                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Audits</button>

                        </li>

                        <li class="nav-item" role="presentation">

                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Clients</button>

                        </li>

                        <li class="nav-item" role="presentation">

                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Templates</button>

                        </li>



                        <li class="nav-item" role="presentation">

                            <button class="nav-link" id="training-tab" data-bs-toggle="tab" data-bs-target="#training-tab-pane" type="button" role="tab" aria-controls="training-tab-pane" aria-selected="false">Trainings</button>

                        </li>

                        <li class="nav-item" role="presentation">

                            <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane" type="button" role="tab" aria-controls="user-tab-pane" aria-selected="false">Users</button>

                        </li>

                        

                      </ul>

                      <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                            <table id="aTable" class="display">

                                <thead>

                                    <tr>

                                        <th style="display: none"></th>

                                        <th>Audit Name</th>

                                        <th>Client Name</th>

                                        <th>Ref Number</th>

                                        <th>Org Name</th>

                                        <th>Audit Index</th>

                                        <th>Auditor</th>

                                        <th>Budget </th>

                                        <th></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if($auditTrash->isEmpty())

                                        No audit to restore

                                    @else                                     

                                    @foreach ($auditTrash as $aTrash)

                                        <tr>

                                            <td style="display: none">{{ $aTrash->id }}</td>

                                            <td>{{ $aTrash->audit_name }} </td>

                                            <td>{{ $aTrash->client_name }} </td>

                                            <td>{{ $aTrash->doc_ref }}</td>

                                            <td>{{ $aTrash->organisation_name }}</td>

                                            <td>{{ $aTrash->audit_index }}</td>

                                            <td>{{ $aTrash->auditors }}</td>

                                            <td>{{ $aTrash->amount }}</td>

                                            <td> 

                                                <a href="{{ route('restoreAudit') }}" class="" onclick="event.preventDefault(); document.getElementById('re_aud').submit();">Restore</a>

                                                <form action="{{ route('restoreAudit') }}" id="re_aud" method="post" class="d-none">

                                                    @csrf

                                                    <input type="hidden" name="rAudit" value="{{ $aTrash->id }}">

                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach

                                    @endif

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                            <table id="cTable" class="display">

                                <thead>

                                    <tr>

                                        <th style="display: none"></th>

                                        <th>Client Name</th>

                                        <th>Client ID</th>

                                        <th>Organisation  </th>

                                        <th></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($clientT as $cTrash)

                                        <tr>

                                            <td style="display: none">{{ $cTrash->id }}</td>

                                            <td>{{ $cTrash->title }} {{ $cTrash->fname }} {{ $cTrash->lname }} </td>

                                            <td>{{ $cTrash->client_id }}</td>

                                            <td>{{ $cTrash->organisation_name }}</td>

                                            

                                            <td>

                                                <a href="{{ route('restoreClient') }}" class="" onclick="event.preventDefault(); document.getElementById('re_clnt').submit();">Restore</a>

                                                <form action="{{ route('restoreClient') }}" id="re_clnt" method="post" class="d-none">

                                                    @csrf

                                                    <input type="hidden" name="rClient" value="{{ $cTrash->id }}">

                                                </form>    

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                            <table id="tTable" class="display">

                                <thead>

                                    <tr>

                                        <th style="display: none"></th>

                                        <th>Template Name</th>

                                        

                                        <th>Description  </th>

                                        <th></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($templatesT as $tTrash)

                                        <tr>

                                            <td style="display: none">{{ $tTrash->id }}</td>

                                            <td>{{ $tTrash->template_name }}  </td>

                                            

                                            <td>{{ $tTrash->description }}</td>

                                            

                                            <td>

                                                <a href="{{ route('restoreClient') }}" class="" onclick="event.preventDefault(); document.getElementById('re_clnt').submit();">Restore</a>

                                                <form action="{{ route('restoreClient') }}" id="re_clnt" method="post" class="d-none">

                                                    @csrf

                                                    <input type="hidden" name="rClient" value="{{ $tTrash->id }}">

                                                </form>    

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>



                        <div class="tab-pane fade" id="training-tab-pane" role="tabpanel" aria-labelledby="training-tab" tabindex="0">

                            <table id="trTable" class="display">

                                <thead>

                                    <tr>

                                        <th style="display: none"></th>

                                        <th>Training Topic</th>

                                        <th>Start Date</th>

                                        <th>Location  </th>

                                        <th>Amount  </th>



                                        <th></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($trainingsT as $train)

                                        <tr>

                                            <td style="display: none">{{ $train->id }}</td>

                                            <td>{{ $train->topic }}  </td>

                                            <td>{{ $train->audit_start_date }}</td>

                                            <td>{{ $train->location }}</td>

                                            <td>{{ $train->amount }}</td>

                                            

                                            <td>

                                                <a href="{{ route('restoreTraining') }}" class="" onclick="event.preventDefault(); document.getElementById('re_training').submit();">Restore</a>

                                                <form action="{{ route('restoreTraining') }}" id="re_training" method="post" class="d-none">

                                                    @csrf

                                                    <input type="hidden" name="rTraining" value="{{ $train->id }}">

                                                </form>    

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>



                        <div class="tab-pane fade" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0">

                            <table id="trTable" class="display">

                                <thead>

                                    <tr>

                                        <th style="display: none"></th>

                                        <th>Name</th>

                                        <th>Email</th>

                                        <th>Role  </th>

                                       



                                        <th></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($usersT as $train)

                                        <tr>

                                            <td style="display: none">{{ $train->id }}</td>

                                            <td>{{ $train->name }}  </td>

                                            <td>{{ $train->email }}</td>

                                            <td>@if($train->role === 0)

                                                User

                                                @else

                                                Admin

                                                @endif

                                            </td>

                                            

                                            

                                            <td>

                                                <a href="{{ route('restoreuser') }}" class="" onclick="event.preventDefault(); document.getElementById('re_user').submit();">Restore</a>

                                                <form action="{{ route('restoreuser') }}" id="re_user" method="post" class="d-none">

                                                    @csrf

                                                    <input type="hidden" name="ruser" value="{{ $train->id }}">

                                                </form>    

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



    

@endsection











@push('js')

    <script>

        $(document).ready( function(){

            $('#aTable').DataTable({

                order:[[0,'desc']]

            });



            $('#cTable').DataTable({

                order:[[0,'desc']]

            });



            $('#tTable').DataTable({

                order:[[0,'desc']]

            });

            $('#trTable').DataTable({

                order:[[0,'desc']]

            });

        });

        

    </script>
<script>
    // Add event listeners for back and forward buttons
    document.getElementById('backButton').addEventListener('click', function () {
        window.history.back(); // Navigate to the previous page in history
    });

    document.getElementById('forwardButton').addEventListener('click', function () {
        window.history.forward(); // Navigate to the next page in history
    });
</script>
@endpush


