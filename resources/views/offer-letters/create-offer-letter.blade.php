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
                    Create Offer Letter
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
                                <a class="ps-1 pe-1 pt-2 pb-2 bg-success text-white" href="{{ route('edit.offer.letter.page',['id'=> $one->id]) }}">Edit</a>

                                <a href="{{ route('view.pdf',['id'=> $one->id]) }}">View</a>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Offer Letter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class=" d-block align-items-center justify-content-between mb-9">

               


                <div class="row justify-content-center w-100">


                    <div class="col-md-12 col-lg-12 col-xxl-12">

                        <form method="POST" action="{{ route('postOfferLetter') }}">


                            @csrf

                            <div class='row'>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <select class="form-select" name="title" id="">
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Professor">Professor</option>
                                        <option value="Sir">Sir</option>
                                        <option value="Madam">Madam</option>
                                    </select>
                                </div>


                                <div class="mb-3 col-md-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>





                                <div class="mb-4 col-md-4">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation">
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="starting_date" class="form-label">Starting Date</label>
                                    <input id="starting_date" type="date" class="form-control @error('starting_date') is-invalid @enderror" name="starting_date" value="{{ old('starting_date') }}" required autocomplete="starting_date">
                                    @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="report_to_name" class="form-label">Report To ( Name )</label>
                                    <input id="report_to_name" type="text" class="form-control @error('report_to_name') is-invalid @enderror" name="report_to_name" value="{{ old('report_to_name') }}" required autocomplete="report_to_name">
                                    @error('report_to_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="report_to_dept" class="form-label">Report To ( Department )</label>
                                    <input id="report_to_dept" type="text" class="form-control @error('report_to_dept') is-invalid @enderror" name="report_to_dept" value="{{ old('report_to_dept') }}" required autocomplete="report_to_dept">
                                    @error('report_to_dept')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="ctc-digits" class="form-label">CTC ( in digits )</label>
                                    <input id="ctc-digits" type="number" class="form-control @error('ctc-digits') is-invalid @enderror" name="ctc_digits" value="{{ old('ctc-digits') }}" required autocomplete="ctc-digits">
                                    @error('ctc-digits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="ctc_words" class="form-label">CTC ( in words )</label>
                                    <input id="ctc_words" type="text" class="form-control @error('ctc_words') is-invalid @enderror" name="ctc_words" value="{{ old('ctc_words') }}" required autocomplete="ctc_words">
                                    @error('ctc_words')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="travel_allowance" class="form-label">Travel Allowance ( monthly )</label>
                                    <input id="travel_allowance" type="number" class="form-control @error('travel_allowance') is-invalid @enderror" name="travel_allowance" value="{{ old('travel_allowance') }}" required autocomplete="travel_allowance">
                                    @error('travel_allowance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="probation_period" class="form-label">Probationary period ( months )</label>
                                    <input id="probation_period" type="number" class="form-control @error('probation_period') is-invalid @enderror" name="probation_period" value="{{ old('probation_period') }}" required autocomplete="probation_period">
                                    @error('probation_period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="confirmation" class="form-label">Confirmation date ( last date to sign the letter )</label>
                                    <input id="confirmation" type="date" class="form-control @error('confirmation') is-invalid @enderror" name="confirmation" value="{{ old('confirmation') }}" required autocomplete="confirmation">
                                    @error('confirmation')
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


@endpush