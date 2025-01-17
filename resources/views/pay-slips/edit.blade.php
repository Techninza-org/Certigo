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


                <!-- @if(Session::has('success')) 
                    <p class="text-success">{!! \Session::get('success') !!}</p>
                @endif

                @if(Session::has('error')) 
                    <p  class="text-danger">{!! \Session::get('error') !!}</p>
                
                @endif -->



                <div class=" d-block align-items-center justify-content-between mb-9">              
                    <div class="d-flex align-items-center">
                        <a href="{{ route('get.payslip.page') }}" class="btn"><i class="fa-regular fa-circle-left" style="font-size: x-large;" aria-hidden="true"></i></a>
                            <h3>Edit Pay-slip</h3>
                    </div>
                    <div class="row justify-content-center w-100">


                        <div class="col-md-12 col-lg-12 col-xxl-12">

                            <form method="POST" action="{{ route('post.edit.paySlip') }}" enctype="multipart/form-data">


                                @csrf

                                <div class='row'>
                                
                                    <input type="hidden" value="{{ $slip->id }}" name="id">
                                    <div class="mb-4 col-md-4">
                                        <label for="month" class="form-label">Month</label>
                                        <input id="month" type="text" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ $slip->month }}" required autocomplete="month">
                                        @error('month')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="year" class="form-label">Year</label>
                                        <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $slip->year }}" required autocomplete="year">
                                        @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="employee_name" class="form-label">Employee Name</label>
                                        <input id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" value="{{ $slip->employee_name }}" required autocomplete="employee_name">
                                        @error('employee_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="employee_number" class="form-label">Employee ID</label>
                                        <input id="employee_number" type="text" class="form-control @error('employee_number') is-invalid @enderror" name="employee_number" value="{{ $slip->employee_number }}" required autocomplete="employee_number">
                                        @error('employee_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="joined_date" class="form-label">Date of Joining</label>
                                        <input id="joined_date" type="date" class="form-control @error('joined_date') is-invalid @enderror" name="joined_date" value="{{ $slip->joined_date }}" required autocomplete="joined_date">
                                        @error('joined_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="department" class="form-label">Department</label>
                                        <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ $slip->department }}" required autocomplete="department">
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    
    
                                    <div class="mb-4 col-md-4">
                                        <label for="designation" class="form-label">Designation </label>
                                        <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $slip->designation }}" required autocomplete="designation">
                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                  
    
                                    <div class="mb-4 col-md-4">
                                        <label for="bank" class="form-label">Bank Name </label>
                                        <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{ $slip->bank }}" required autocomplete="bank">
                                        @error('bank')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                  
    
                                    <div class="mb-4 col-md-4">
                                        <label for="bank_account" class="form-label">Bank A/C No. </label>
                                        <input id="bank_account" type="number" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" value="{{ $slip->bank_account }}" required autocomplete="bank_account">
                                        @error('bank_account')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    
                                    <div class="mb-4 col-md-4">
                                        <label for="uan" class="form-label">UAN </label>
                                        <input id="uan" type="text" class="form-control @error('uan') is-invalid @enderror" name="uan" value="{{ $slip->uan }}"  autocomplete="uan">
                                        @error('uan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="pf_number" class="form-label">PF No. </label>
                                        <input id="pf_number" type="text" class="form-control @error('pf_number') is-invalid @enderror" name="pf_number" value="{{ $slip->pf_number }}"  autocomplete="pf_number">
                                        @error('pf_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="esi_no" class="form-label">ESI No. </label>
                                        <input id="esi_no" type="text" class="form-control @error('esi_no') is-invalid @enderror" name="esi_no" value="{{ $slip->esi_value }}"  autocomplete="esi_no">
                                        @error('esi_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="esi_value" class="form-label">ESI/Health Insurance </label>
                                        <input id="esi_value" type="numnber" class="form-control @error('esi_value') is-invalid @enderror" name="esi_value" value="{{ $slip->esi_value }}" required autocomplete="esi_value">
                                        @error('esi_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <!-- <div class="mb-4 col-md-4">
                                        <label for="apd" class="form-label">Actual Payable days</label>
                                        <input id="apd" type="number" class="form-control @error('apd') is-invalid @enderror" name="apd" value="{{ $slip->apd }}" required autocomplete="apd">
                                        @error('apd')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div> -->
                                    <div class="mb-4 col-md-4">
                                        <label for="twd" class="form-label">Total working days</label>
                                        <input id="twd" type="number" class="form-control @error('twd') is-invalid @enderror" name="twd" value="{{ $slip->twd }}" required autocomplete="twd">
                                        @error('twd')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="lpd" class="form-label">Loss of pay days </label>
                                        <input id="lpd" type="number" class="form-control @error('lpd') is-invalid @enderror" name="lpd" value="{{ $slip->lpd }}" required autocomplete="lpd">
                                        @error('lpd')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="dp" class="form-label">Leaves Taken </label>
                                        <input id="dp" type="numnber" class="form-control @error('dp') is-invalid @enderror" name="dp" value="{{ $slip->dp }}" required autocomplete="dp">
                                        @error('dp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="gross_salary" class="form-label">Gross Salary</label>
                                        <input id="gross_salary" type="numnber" class="form-control @error('gross_salary') is-invalid @enderror" name="gross_salary" value="{{ $slip->gross_salary }}" required autocomplete="gross_salary">
                                        @error('gross_salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <!-- <div class="mb-4 col-md-4">
                                        <label for="basic" class="form-label">Basic pay</label>
                                        <input id="basic" type="numnber" class="form-control @error('basic') is-invalid @enderror" name="basic" value="{{ $slip->basic }}" required autocomplete="basic">
                                        @error('basic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="hra" class="form-label">HRA </label>
                                        <input id="hra" type="numnber" class="form-control @error('hra') is-invalid @enderror" name="hra" value="{{ $slip->hra }}" required autocomplete="hra">
                                        @error('hra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="conveyance_allowance" class="form-label">Conveyance Allowance </label>
                                        <input id="conveyance_allowance" type="numnber" class="form-control @error('conveyance_allowance') is-invalid @enderror" name="conveyance_allowance" value="{{ $slip->conveyance_allowance }}" required autocomplete="conveyance_allowance">
                                        @error('conveyance_allowance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div> -->
                                    <!-- <div class="mb-4 col-md-4">
                                        <label for="medical_allowance" class="form-label">Medical Allowance</label>
                                        <input id="medical_allowance" type="numnber" class="form-control @error('medical_allowance') is-invalid @enderror" name="medical_allowance" value="{{ $slip->medical_allowance }}" required autocomplete="medical_allowance">
                                        @error('medical_allowance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div> -->
                                    <!-- <div class="mb-4 col-md-4">
                                        <label for="adhoc_allowance" class="form-label">Other Allowance</label>
                                        <input id="adhoc_allowance" type="numnber" class="form-control @error('adhoc_allowance') is-invalid @enderror" name="adhoc_allowance" value="{{ $slip->adhoc_allowance }}" required autocomplete="adhoc_allowance">
                                        @error('adhoc_allowance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    
                                    <div class="mb-4 col-md-4">
                                        <label for="pf_value" class="form-label">EPF </label>
                                        <input id="pf_value" type="numnber" class="form-control @error('pf_value') is-invalid @enderror" name="pf_value" value="{{ $slip->pf_value }}" required autocomplete="pf_value">
                                        @error('pf_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="esi_value" class="form-label">ESI/Health Insurance </label>
                                        <input id="esi_value" type="numnber" class="form-control @error('esi_value') is-invalid @enderror" name="esi_value" value="{{ $slip->esi_value }}" required autocomplete="esi_value">
                                        @error('esi_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div> -->
                                    <div class="mb-4 col-md-4">
                                        <label for="professional_tax" class="form-label">Professional Tax</label>
                                        <input id="professional_tax" type="numnber" class="form-control @error('professional_tax') is-invalid @enderror" name="professional_tax" value="{{ $slip->professional_tax }}" required autocomplete="professional_tax">
                                        @error('professional_tax')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="loan_recovery" class="form-label">Loan Recovery</label>
                                        <input id="loan_recovery" type="numnber" class="form-control @error('loan_recovery') is-invalid @enderror" name="loan_recovery" value="{{ $slip->loan_recovery }}" required autocomplete="loan_recovery">
                                        @error('loan_recovery')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <!-- <div class="mb-4 col-md-4">
                                        <label for="total_earnings" class="form-label">Total Earnings</label>
                                        <input id="total_earnings" type="numnber" class="form-control @error('total_earnings') is-invalid @enderror" name="total_earnings" value="{{ $slip->total_earnings }}" required autocomplete="total_earnings">
                                        @error('total_earnings')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="total_deductions" class="form-label">Total Deductions</label>
                                        <input id="total_deductions" type="numnber" class="form-control @error('total_deductions') is-invalid @enderror" name="total_deductions" value="{{ $slip->total_deductions }}" required autocomplete="total_deductions">
                                        @error('total_deductions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="net_salary" class="form-label">Net Salary</label>
                                        <input id="net_salary" type="numnber" class="form-control @error('net_salary') is-invalid @enderror" name="net_salary" value="{{ $slip->net_salary }}" required autocomplete="net_salary">
                                        @error('net_salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div> -->
                                    
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