@extends('layout.layout')


@push('css')


<style>








</style>


@endpush


@section('content')


<div class="row">


    <div class="col-lg-12 d-flex align-items-strech">


        <div class="card w-100">


            <div class="card-body">


                @if(Session::has('success')) 
                    <p class="text-green">{!! \Session::get('success') !!}</p>
                @endif

                @if(Session::has('error')) 
                    <p  class="text-red">{!! \Session::get('error') !!}</p>
                
                @endif


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create Appointment Letter
                </button>
  
 

                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($letters as $one)
                        <tr>
                            <td>{{ $one->name }}</td>
                            <td>{{ $one->designation }}</td>
                            <td>
                                <a class="bg-success text-white ps-1 pe-1 pt-2 pb-2" href="{{ route('edit.appointment.letter.page',['id'=> $one->id]) }}">Edit</a>

                                <a href="javascript:void(0)" class="view-appointment-btn" data-id="{{ $one->id }}">View</a>

                                <a class="bg-danger text-white ps-1 pe-1 pt-2 pb-2" href="{{ route('view.appointment.pdf',['id'=> $one->id]) }}">Download</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                





            </div>


        </div>


    </div>





</div>



<!-- Modal -->
<div class="modal fade" id="appointmentLetterModal" tabindex="-1" aria-labelledby="appointmentLetterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentLetterModalLabel">Appointment Letter Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="appointmentLetterContent">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>
</div>

@endsection


 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Appointment Letter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class=" d-block align-items-center justify-content-between mb-9">

               


                <div class="row justify-content-center w-100">


                    <div class="col-md-12 col-lg-12 col-xxl-12">

                        <form method="POST" action="{{ route('postappointmentLetter') }}">


                            @csrf

                            <div class='row'>
                                <div class="col-md-12">
                                    <strong class="text-secondary">Employee Details</strong>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">Name of the employee</label>
                                    <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="employee_code" class="form-label">Employee Code <span class="text-danger">*</span></label>
                                    <input id="employee_code" type="text" class="form-control" name="employee_code" value="{{ old('employee_code') }}" required autocomplete="employee_code">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="employee_address" class="form-label">Employee Address <span class="text-danger">*</span></label>
                                    <input id="employee_address" type="text" class="form-control " name="employee_address" value="{{ old('employee_address') }}" required autocomplete="employee_address">
                                </div>



                                <div class="mb-4 col-md-4">
                                    <label for="designation" class="form-label">Designation </label>
                                    <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" required autocomplete="designation">
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="ctc-digits" class="form-label">Salary in CTC ( in digits )</label>
                                    <input id="ctc-digits" type="number" class="form-control " name="ctc_digits" value="{{ old('ctc-digits') }}" required autocomplete="ctc-digits">
                                    @error('ctc-digits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="ctc_words" class="form-label">Salary in CTC ( in words )</label>
                                    <input id="ctc_words" type="text" class="form-control " name="ctc_words" value="{{ old('ctc_words') }}" required autocomplete="ctc_words">
                                    @error('ctc_words')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="probation_periods" class="form-label">Probation period ( in months )</label>
                                    <input id="probation_periods" type="number" class="form-control " name="probation_periods" value="{{ old('probation_periods') }}" required autocomplete="probation_periods">
                                    @error('probation_periods')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>


                               <div class="col-md-12">
                                <strong class="text-secondary">Signing Authority</strong>
                               </div>
                               <div class="mb-4 col-md-4">
                                    <label for="signing_authority" class="form-label">Signing Authority</label>
                                    <input id="signing_authority" type="text" class="form-control " name="signing_authority" value="{{ old('signing_authority') }}" required autocomplete="signing_authority">
                                    @error('signing_authority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="authority_name" class="form-label">Name</label>
                                    <input id="authority_name" type="text" class="form-control" name="authority_name" value="{{ old('authority_name') }}" required autocomplete="authority_name">
                                    @error('authority_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="authority_designation" class="form-label">Designation</label>
                                    <input id="authority_designation" type="text" class="form-control" name="authority_designation" value="{{ old('authority_designation') }}" required autocomplete="authority_designation">
                                    @error('authority_designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="col-md-12">
                                    <strong class="text-secondary">Employment Aggrement</strong>
                                </div>
                                
                                <div class="mb-4 col-md-4">
                                    <label for="date_of_appointment" class="form-label">Date of Appointment</label>
                                    <input id="date_of_appointment" type="text" class="form-control" name="date_of_appointment" value="{{ old('date_of_appointment') }}" required autocomplete="date_of_appointment">
                                    @error('date_of_appointment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="reporting_authority" class="form-label">Reporting Authority</label>
                                    <input id="reporting_authority" type="text" class="form-control" name="reporting_authority" value="{{ old('reporting_authority') }}" required autocomplete="reporting_authority">
                                    @error('reporting_authority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="reporting_name" class="form-label">Name</label>
                                    <input id="reporting_name" type="text" class="form-control" name="reporting_name" value="{{ old('reporting_name') }}" required autocomplete="reporting_name">
                                    @error('reporting_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="col-md-12">
                                    <strong class="text-secondary">Compensation break-up</strong>
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="salary" class="form-label">Salary (Fixed)</label>
                                    <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required autocomplete="salary">
                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                               
                                <div class="mb-4 col-md-4">
                                    <label for="basic" class="form-label">Basic</label>
                                    <input id="basic" type="text" class="form-control" name="basic" value="{{ old('basic') }}" required autocomplete="basic">
                                    @error('basic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="hra" class="form-label">HRA</label>
                                    <input id="hra" type="text" class="form-control" name="hra" value="{{ old('hra') }}" required autocomplete="hra">
                                    @error('hra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="conveyance" class="form-label">Conveyance</label>
                                    <input id="conveyance" type="text" class="form-control" name="conveyance" value="{{ old('conveyance') }}" required autocomplete="conveyance">
                                    @error('conveyance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="special_allowance" class="form-label">Special Allowance</label>
                                    <input id="special_allowance" type="text" class="form-control" name="special_allowance" value="{{ old('special_allowance') }}" required autocomplete="special_allowance">
                                    @error('special_allowance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="medical" class="form-label">Medical</label>
                                    <input id="medical" type="text" class="form-control" name="medical" value="{{ old('medical') }}" required autocomplete="medical">
                                    @error('medical')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="lta" class="form-label">LTA</label>
                                    <input id="lta" type="text" class="form-control" name="lta" value="{{ old('lta') }}" required autocomplete="lta">
                                    @error('lta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="monthly_gross_salary" class="form-label">Monthly Gross Salary</label>
                                    <input id="monthly_gross_salary" type="text" class="form-control" name="monthly_gross_salary" value="{{ old('monthly_gross_salary') }}" required autocomplete="monthly_gross_salary">
                                    @error('monthly_gross_salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="annual_variable_ctc" class="form-label">Annual Variable CTC</label>
                                    <input id="annual_variable_ctc" type="text" class="form-control" name="annual_variable_ctc" value="{{ old('annual_variable_ctc') }}" required autocomplete="annual_variable_ctc">
                                    @error('annual_variable_ctc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="annual_fixed_ctc" class="form-label">Annual CTC (Fixed) </label>
                                    <input id="annual_fixed_ctc" type="text" class="form-control" name="annual_fixed_ctc" value="{{ old('annual_fixed_ctc') }}" required autocomplete="annual_fixed_ctc">
                                    @error('annual_fixed_ctc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                               
                            </div>



                            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Create</button>





                        </form>









                    </div>


                </div>

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
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.view-appointment-btn');
        const modal = new bootstrap.Modal(document.getElementById('appointmentLetterModal'));
        const content = document.getElementById('appointmentLetterContent');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');

                // Clear previous content
                content.innerHTML = '<p>Loading...</p>';

                // Fetch the HTML for the appointment letter
                fetch("{{ route('view.appointment.pdf') }}?id=" + id)
                    .then(response => response.text())
                    .then(html => {
                        // Inject the HTML into the modal
                        content.innerHTML = html;

                        // Show the modal
                        modal.show();
                    })
                    .catch(error => {
                        console.error('Error loading appointment letter:', error);
                        content.innerHTML = '<p>Error loading content. Please try again.</p>';
                    });
            });
        });

        // Clear modal content on close
        document.getElementById('appointmentLetterModal').addEventListener('hidden.bs.modal', function () {
            content.innerHTML = '';
        });
    });
</script>

@endpush