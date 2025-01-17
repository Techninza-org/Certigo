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

    width: 13rem;

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

{{-- <p>{{ $myaudits}}</p> --}}

   





    <div class="card w-100">

      <div class="card-body">

        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

          Add Client

        </button> --}}

        <div class=" d-block align-items-center justify-content-between mb-9">

          <h2>Audits of client</h2>

        </div>

        <table id="myTable" class="display">

          <thead>

              <tr>

                  <th style="display: none"></th>

                  <th>Audit</th>

                  <th>Auditor</th>

                  <th>Budget </th>

                  <th>Completion </th>
                  <th>Final Score</th>

                <th></th>

                 

                 

                 



              </tr>

          </thead>

          <tbody>

              @foreach ($myaudits as $audit)

                  <tr>

                      <td style="display: none">{{ $audit->id }}</td>

                      <td>{{ $audit->audit_name }} {{ $audit->fname }} {{ $audit->lname }}</td>

                      <td>{{ $audit->auditors }}</td>

                      <td>{{ $audit->amount }}</td>


                      <td>{{ $audit->completion }}</td>

                      <td>{{ $audit->final_score }}</td>

                    <td>

                      <div style="    position: relative;">

                        <i class="fa-solid fa-ellipsis-vertical btn popupButton"></i>

                        <div id="popup" class="popup">

                            <div class="option d-flex p-2">

                                <a class="btn pt-0 pb-0" data-bs-toggle="modal" data-bs-target="#auditModal{{ $audit->id }}">

                                    <i class="fa-solid fa-book"></i> View more details </a>

                            </div>

                            <div class="option d-flex p-2">
                                @if ($audit->final_score != null)
                                      
                                <form action="{{route('audit.report.view')}}" method="get" id="auditReport{{ $audit->id }}" class="d-none">
                                    <input type="hidden" value="{{ $audit->id }}" name="auditId">
                                    <input type="hidden" value="{{ $audit->client_id }}" name="cid">
                                    <input type="hidden" value="client" name="auth_id">
                                </form>

                                <a class="btn pt-0 pb-0" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('auditReport{{ $audit->id }}').submit();">

                                    <i class="fa-solid fa-file-pdf"></i> View Report </a>

                                @else
                                    
                                   {{-- report not genrated yet --}}
                                    <a class="btn pt-0 pb-0" href="javascript:void(0)">
                                   <i class="fa-solid fa-file-pdf"></i> Report not genrated!</a>

                                @endif
                                    
                             
                                
                                    



                            </div>

                            

                        </div>

                    </div>

                    </td>

                      

                     



                  </tr>

              @endforeach

          </tbody>

      </table>

      </div>

    </div>

  </div>

  

</div>



@endsection



@push('js')



@foreach($myaudits as $audit)

<div class="modal fade" id="auditModal{{ $audit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

      <div class="modal-content">

          <div class="modal-header">

              <h1 class="modal-title fs-5" id="exampleModalLabel">Schedule Audit</h1>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body">

              <form >

                  @csrf

                  <div class="row">



                      <input type="hidden" name="audit_id" value="{{ $audit->id }}">



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Audit index </label>

                          <input type="text" class="form-control" name="audit_index"

                              placeholder="Enter subject shorthand" value="{{ $audit->audit_index }}" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Name of the Audit </label>

                          <input type="text" class="form-control" name="audit_name"

                              placeholder="Enter audit subject" value="{{ $audit->audit_name }}" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Start </label>

                          <input type="datetime-local" class="form-control" name="start" value="{{ $audit->start }}" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">End </label>

                          <input type="datetime-local" class="form-control" name="end" value="{{ $audit->end }}" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Type of Audit </label>

                          <input type="text" class="form-control" name="audit_type" value="{{ $audit->audit_type }}" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Location</label>

                          <input type="text" class="form-control" name="location" value="{{ $audit->location }}" disabled>

                      </div>                     



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Select Checklist(s) </label>

                          <input type="text" class="form-control" name="checklists" value="@foreach($audit->tempname as $tname){{ $tname->template_name }}/ @endforeach" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Select Auditor(s) </label>

                          <select class="form-select" name="auditors" id="" disabled>

                            @foreach($employes as $emp)

                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>

                            @endforeach

                        </select>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Amount</label>

                          <input type="text" class="form-control" name="amount" value="{{ $audit->amount }}" disabled>

                      </div>



                      <div class="mb-3 col-md-6">

                          <label class="form-label">Auditing for</label>

                          <select class="form-select" name="auditing_for" id="" disabled>

                              <option value="hygienicReport" {{ $audit->auditing_for == "hygienicReport" ? 'selected' : ''}}>Hygenic Report</option>

                              <option value="industrialReport" {{ $audit->auditing_for == "industrialReport" ? 'selected' : ''}}>Industrial Report</option>

                          </select>

                      </div>



                      <div class="modal-footer">

                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          

                      </div>



                  </div>

              </form>

          </div>



      </div>

  </div>

</div>

@endforeach





<script>

 



 $('#myTable').DataTable({

      order:[[0,'desc']]

  });



  $('table.dataTable tbody tr td:nth-child(2)').css({'white-space':'nowrap','font-weight':'600'});



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