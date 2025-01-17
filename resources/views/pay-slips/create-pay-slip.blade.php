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
                    Create Pay Slip
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
                        @foreach($slips as $one)
                        <tr>
                            <td>{{ $one->employee_name }}</td>
                            <td>{{ $one->designation }}</td>
                            <td>
                                <a class="view-btn bg-primary" href="{{ route('view.paySlip.pdf',['id'=> $one->id]) }}">View</a>

                                <a class="edit-btn" href="{{ route('edit.paySlip',['id'=> $one->id]) }}">Edit</a>

                                <a class="delete-btn" href="#" onclick="return confirmAndSubmit('{{ route('delete.paySlip') }}', '{{ $one->id }}')">Delete</a>
                                <form id="payslip-delete{{ $one->id }}" action="{{ route('delete.paySlip') }}" method="post" class="d-none">
                                    @csrf
                                    <input type="hidden" value="{{ $one->id }}" name="payslip_id">                                    
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





@endsection


 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Pay Slip</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class=" d-block align-items-center justify-content-between mb-9">
                <div class="row justify-content-center w-100">
                    <div class="col-md-12 col-lg-12 col-xxl-12">

                        <form method="POST" action="{{ route('post.payslip.page') }}" enctype="multipart/form-data">
                            @csrf
                            <div class='row'>                                

                                <div class="mb-4 col-md-4">
                                    <label for="month" class="form-label">Month</label>
                                    <input id="month" type="text" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}" required autocomplete="month">
                                    @error('month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="year" class="form-label">Year</label>
                                    <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year">
                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="employee_name" class="form-label">Employee Name</label>
                                    <input id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" value="{{ old('employee_name') }}" required autocomplete="employee_name">
                                    @error('employee_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="employee_number" class="form-label">Employee ID</label>
                                    <input id="employee_number" type="text" class="form-control @error('employee_number') is-invalid @enderror" name="employee_number" value="{{ old('employee_number') }}" required autocomplete="employee_number">
                                    @error('employee_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="joined_date" class="form-label">Date of Joining</label>
                                    <input id="joined_date" type="date" class="form-control @error('joined_date') is-invalid @enderror" name="joined_date" value="{{ old('joined_date') }}" required autocomplete="joined_date">
                                    @error('joined_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="mb-4 col-md-4">
                                    <label for="department" class="form-label">Department</label>
                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department">
                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>                                

                                <div class="mb-4 col-md-4">
                                    <label for="designation" class="form-label">Designation </label>
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation">
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>                             

                                <div class="mb-4 col-md-4">
                                    <label for="bank" class="form-label">Bank Name </label>
                                    <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{ old('bank') }}" required autocomplete="bank">
                                    @error('bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>                              

                                <div class="mb-4 col-md-4">
                                    <label for="bank_account" class="form-label">Bank A/C No. </label>
                                    <input id="bank_account" type="number" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" value="{{ old('bank_account') }}" required autocomplete="bank_account">
                                    @error('bank_account')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="mb-4 col-md-4">
                                    <label for="uan" class="form-label">UAN </label>
                                    <input id="uan" type="text" class="form-control @error('uan') is-invalid @enderror" name="uan" value="{{ old('uan') }}"  autocomplete="uan">
                                    @error('uan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="pf_number" class="form-label">PF No. </label>
                                    <input id="pf_number" type="text" class="form-control @error('pf_number') is-invalid @enderror" name="pf_number" value="{{ old('pf_number') }}"  autocomplete="pf_number">
                                    @error('pf_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="esi_no" class="form-label">ESI No. </label>
                                    <input id="esi_no" type="text" class="form-control @error('esi_no') is-invalid @enderror" name="esi_no" value="{{ old('esi_no') }}" required autocomplete="esi_no">
                                    @error('esi_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="esi_value" class="form-label">ESI/Health Insurance </label>
                                    <input id="esi_value" type="text" class="form-control @error('esi_value') is-invalid @enderror" name="esi_value" value="{{ old('esi_value') }}" required autocomplete="esi_value">
                                    @error('esi_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- <div class="mb-4 col-md-4">
                                    <label for="medical_allowance" class="form-label">ESI/Medical Insurance</label>
                                    <input id="medical_allowance" type="text" class="form-control @error('medical_allowance') is-invalid @enderror" name="medical_allowance" value="{{ old('medical_allowance') }}" required autocomplete="medical_allowance">
                                    @error('medical_allowance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="apd" class="form-label">Actual Payable days</label>
                                    <input id="apd" type="text" class="form-control @error('apd') is-invalid @enderror" name="apd" value="{{ old('apd') }}" required autocomplete="apd">
                                    @error('apd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <div class="mb-4 col-md-4">
                                    <label for="twd" class="form-label">Total working days</label>
                                    <input id="twd" type="text" class="form-control @error('twd') is-invalid @enderror" name="twd" value="{{ old('twd') }}" required autocomplete="twd">
                                    @error('twd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="lpd" class="form-label">Loss of pay days </label>
                                    <input id="lpd" type="text" class="form-control @error('lpd') is-invalid @enderror" name="lpd" value="{{ old('lpd') }}" required autocomplete="lpd">
                                    @error('lpd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="dp" class="form-label">Leaves Taken </label>
                                    <input id="dp" type="text" class="form-control @error('dp') is-invalid @enderror" name="dp" value="{{ old('dp') }}" required autocomplete="dp">
                                    @error('dp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="gross_salary" class="form-label">Gross Salary</label>
                                    <input id="gross_salary" type="text" class="form-control @error('gross_salary') is-invalid @enderror" name="gross_salary" value="{{ old('gross_salary') }}" required autocomplete="gross_salary">
                                    @error('gross_salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="basic" class="form-label">Basic pay</label>
                                    <input id="basic" type="text" class="form-control @error('basic') is-invalid @enderror" name="basic" value="{{ old('basic') }}" required autocomplete="basic">
                                    @error('basic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="hra" class="form-label">HRA </label>
                                    <input id="hra" type="text" class="form-control @error('hra') is-invalid @enderror" name="hra" value="{{ old('hra') }}" required autocomplete="hra">
                                    @error('hra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->
                                
                                <!-- <div class="mb-4 col-md-4">
                                    <label for="conveyance_allowance" class="form-label">Conveyance Allowance </label>
                                    <input id="conveyance_allowance" type="text" class="form-control @error('conveyance_allowance') is-invalid @enderror" name="conveyance_allowance" value="{{ old('conveyance_allowance') }}" required autocomplete="conveyance_allowance">
                                    @error('conveyance_allowance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="adhoc_allowance" class="form-label">Other Allowance</label>
                                    <input id="adhoc_allowance" type="text" class="form-control @error('adhoc_allowance') is-invalid @enderror" name="adhoc_allowance" value="{{ old('adhoc_allowance') }}" required autocomplete="adhoc_allowance">
                                    @error('adhoc_allowance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->
                                
                                <!-- <div class="mb-4 col-md-4">
                                    <label for="pf_value" class="form-label">EPF </label>
                                    <input id="pf_value" type="text" class="form-control @error('pf_value') is-invalid @enderror" name="pf_value" value="{{ old('pf_value') }}" required autocomplete="pf_value">
                                    @error('pf_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="esi_value" class="form-label">ESI/Health Insurance </label>
                                    <input id="esi_value" type="text" class="form-control @error('esi_value') is-invalid @enderror" name="esi_value" value="{{ old('esi_value') }}" required autocomplete="esi_value">
                                    @error('esi_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <div class="mb-4 col-md-4">
                                    <label for="professional_tax" class="form-label">Professional Tax</label>
                                    <input id="professional_tax" type="text" class="form-control @error('professional_tax') is-invalid @enderror" name="professional_tax" value="{{ old('professional_tax') }}" required autocomplete="professional_tax">
                                    @error('professional_tax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="loan_recovery" class="form-label">Loan Recovery</label>
                                    <input id="loan_recovery" type="text" class="form-control @error('loan_recovery') is-invalid @enderror" name="loan_recovery" value="{{ old('loan_recovery') }}" required autocomplete="loan_recovery">
                                    @error('loan_recovery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="total_earnings" class="form-label">Total Earnings</label>
                                    <input id="total_earnings" type="text" class="form-control @error('total_earnings') is-invalid @enderror" name="total_earnings" value="{{ old('total_earnings') }}" required autocomplete="total_earnings">
                                    @error('total_earnings')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="total_deductions" class="form-label">Total Deductions</label>
                                    <input id="total_deductions" type="text" class="form-control @error('total_deductions') is-invalid @enderror" name="total_deductions" value="{{ old('total_deductions') }}" required autocomplete="total_deductions">
                                    @error('total_deductions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

                                <!-- <div class="mb-4 col-md-4">
                                    <label for="net_salary" class="form-label">Net Salary</label>
                                    <input id="net_salary" type="text" class="form-control @error('net_salary') is-invalid @enderror" name="net_salary" value="{{ old('net_salary') }}" required autocomplete="net_salary">
                                    @error('net_salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->
                                
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
function confirmAndSubmit(deleteUrl, payslipId) {
    // Show a confirmation dialog
    if (confirm("Are you sure you want to delete this payslip?")) {
        // If user confirms, submit the form
        document.getElementById('payslip-delete' + payslipId).submit();
    }
    // If user cancels, return false to prevent default action
    return false;

}
</script>

@endpush