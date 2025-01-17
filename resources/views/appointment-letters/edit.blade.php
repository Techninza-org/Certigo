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
                    <p class="text-success">{!! \Session::get('success') !!}</p>
                @endif

                @if(Session::has('error')) 
                    <p  class="text-danger">{!! \Session::get('error') !!}</p>
                
                @endif


                <div class=" d-block align-items-center justify-content-between mb-9">

               


                    <div class="row justify-content-center w-100">
    
    
                        <div class="col-md-12 col-lg-12 col-xxl-12">
    
                            <form method="POST" action="{{ route('post.edit.appointment.letter.page') }}">
    
    
                                @csrf

                                <input type="hidden" name="id" value="{{ $letter->id }}">
    
                                <div class='row'>
                                    <div class="col-md-12">
                                        <strong class="text-secondary">Employee Details</strong>
                                    </div>
    
                                    <div class="mb-3 col-md-4">
                                        <label for="name" class="form-label">Name of the employee</label>
                                        <input id="name" type="text" class="form-control " name="name" value="{{ $letter->name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
    
                                    <div class="mb-3 col-md-3">
                                        <label for="employee_code" class="form-label">Employee Code <span class="text-danger">*</span></label>
                                        <input id="employee_code" type="text" class="form-control" name="employee_code" value="{{ $letter->employee_code }}" required autocomplete="employee_code">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="employee_address" class="form-label">Employee Address <span class="text-danger">*</span></label>
                                        <input id="employee_address" type="text" class="form-control " name="employee_address" value="{{ $letter->employee_address }}" required autocomplete="employee_address">
                                    </div>
    
    
    
                                    <div class="mb-4 col-md-4">
                                        <label for="designation" class="form-label">Designation </label>
                                        <input id="designation" type="text" class="form-control" name="designation" value="{{ $letter->designation }}" required autocomplete="designation">
                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="ctc-digits" class="form-label">Salary in CTC ( in digits )</label>
                                        <input id="ctc-digits" type="number" class="form-control " name="ctc_digits" value="{{ $letter->ctc_digits }}" required autocomplete="ctc-digits">
                                        @error('ctc-digits')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="ctc_words" class="form-label">Salary in CTC ( in words )</label>
                                        <input id="ctc_words" type="text" class="form-control " name="ctc_words" value="{{ $letter->ctc_words }}" required autocomplete="ctc_words">
                                        @error('ctc_words')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="probation_periods" class="form-label">Probation period ( in months )</label>
                                        <input id="probation_periods" type="number" class="form-control " name="probation_periods" value="{{ $letter->probation_periods }}" required autocomplete="probation_periods">
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
                                        <input id="signing_authority" type="text" class="form-control " name="signing_authority" value="{{ $letter->signing_authority }}" required autocomplete="signing_authority">
                                        @error('signing_authority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="authority_name" class="form-label">Name</label>
                                        <input id="authority_name" type="text" class="form-control" name="authority_name" value="{{ $letter->authority_name }}" required autocomplete="authority_name">
                                        @error('authority_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="authority_designation" class="form-label">Designation</label>
                                        <input id="authority_designation" type="text" class="form-control" name="authority_designation" value="{{ $letter->authority_designation }}" required autocomplete="authority_designation">
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
                                        <input id="date_of_appointment" type="text" class="form-control" name="date_of_appointment" value="{{ $letter->date_of_appointment }}" required autocomplete="date_of_appointment">
                                        @error('date_of_appointment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="reporting_authority" class="form-label">Reporting Authority</label>
                                        <input id="reporting_authority" type="text" class="form-control" name="reporting_authority" value="{{ $letter->reporting_authority }}" required autocomplete="reporting_authority">
                                        @error('reporting_authority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="reporting_name" class="form-label">Name</label>
                                        <input id="reporting_name" type="text" class="form-control" name="reporting_name" value="{{ $letter->reporting_name }}" required autocomplete="reporting_name">
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
                                        <input id="salary" type="text" class="form-control" name="salary" value="{{ $letter->salary }}" required autocomplete="salary">
                                        @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                   
                                    <div class="mb-4 col-md-4">
                                        <label for="basic" class="form-label">Basic</label>
                                        <input id="basic" type="text" class="form-control" name="basic" value="{{ $letter->basic }}" required autocomplete="basic">
                                        @error('basic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="hra" class="form-label">HRA</label>
                                        <input id="hra" type="text" class="form-control" name="hra" value="{{ $letter->hra }}" required autocomplete="hra">
                                        @error('hra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="conveyance" class="form-label">Conveyance</label>
                                        <input id="conveyance" type="text" class="form-control" name="conveyance" value="{{ $letter->conveyance }}" required autocomplete="conveyance">
                                        @error('conveyance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="special_allowance" class="form-label">Special Allowance</label>
                                        <input id="special_allowance" type="text" class="form-control" name="special_allowance" value="{{ $letter->special_allowance }}" required autocomplete="special_allowance">
                                        @error('special_allowance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="medical" class="form-label">Medical</label>
                                        <input id="medical" type="text" class="form-control" name="medical" value="{{ $letter->medical }}" required autocomplete="medical">
                                        @error('medical')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="lta" class="form-label">LTA</label>
                                        <input id="lta" type="text" class="form-control" name="lta" value="{{ $letter->lta }}" required autocomplete="lta">
                                        @error('lta')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="monthly_gross_salary" class="form-label">Monthly Gross Salary</label>
                                        <input id="monthly_gross_salary" type="text" class="form-control" name="monthly_gross_salary" value="{{ $letter->monthly_gross_salary }}" required autocomplete="monthly_gross_salary">
                                        @error('monthly_gross_salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="annual_variable_ctc" class="form-label">Annual Variable CTC</label>
                                        <input id="annual_variable_ctc" type="text" class="form-control" name="annual_variable_ctc" value="{{ $letter->annual_variable_ctc }}" required autocomplete="annual_variable_ctc">
                                        @error('annual_variable_ctc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="annual_fixed_ctc" class="form-label">Annual CTC (Fixed) </label>
                                        <input id="annual_fixed_ctc" type="text" class="form-control" name="annual_fixed_ctc" value="{{ $letter->annual_fixed_ctc }}" required autocomplete="annual_fixed_ctc">
                                        @error('annual_fixed_ctc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                   
                                </div>
    
    
    
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Update</button>
    
    
    
    
    
                            </form>
    
    
    
    
    
    
    
    
    
                        </div>
    
    
                    </div>
    
                </div>
  
 

            </div>


        </div>


    </div>





</div>





@endsection




@push('js')


<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>


@endpush