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

                <div style="margin-bottom: 15px;">
                    <div class="d-flex justify-content-between items-center">
                    <button id="backButton" class="btn btn-primary">Back</button>
                    <button id="forwardButton" class="btn btn-secondary">Forward</button>
                    </div>
                </div>


                @if(Session::has('success')) 
                    <p class="text-success">{!! \Session::get('success') !!}</p>
                @endif

                @if(Session::has('error')) 
                    <p  class="text-danger">{!! \Session::get('error') !!}</p>
                
                @endif


                <div class=" d-block align-items-center justify-content-between mb-9">

               


                    <div class="row justify-content-center w-100">
    
    
                        <div class="col-md-12 col-lg-12 col-xxl-12">
    
                            <form method="POST" action="{{ route('post.edit.offer.letter.page') }}">
    
    
                                @csrf

                                <input type="hidden" name="id" value="{{ $letter->id }}">
    
                                <div class='row'>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <select class="form-select" name="title" id="">
                                            <option value="Mr" {{ $letter->title == 'Mr'? 'selected' : '' }}>Mr</option>
                                            <option value="Mrs" {{ $letter->title == 'Mrs'? 'selected' : '' }}>Mrs</option>
                                            <option value="Ms" {{ $letter->title == 'Ms'? 'selected' : '' }}>Ms</option>
                                            <option value="Dr" {{ $letter->title == 'Dr'? 'selected' : '' }}>Dr</option>
                                            <option value="Professor" {{ $letter->title == 'Professor'? 'selected' : '' }}>Professor</option>
                                            <option value="Sir" {{ $letter->title == 'Sir'? 'selected' : '' }}>Sir</option>
                                            <option value="Madam" {{ $letter->title == 'Madam'? 'selected' : '' }}>Madam</option>
                                        </select>
                                    </div>
    
    
                                    <div class="mb-3 col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $letter->name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
    
    
    
    
                                    <div class="mb-4 col-md-4">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $letter->designation }}" required autocomplete="designation">
                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="starting_date" class="form-label">Starting Date</label>
                                        <input id="starting_date" type="date" class="form-control @error('starting_date') is-invalid @enderror" name="starting_date" value="{{ $letter->starting_date }}" required autocomplete="starting_date">
                                        @error('starting_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="report_to_name" class="form-label">Report To ( Name )</label>
                                        <input id="report_to_name" type="text" class="form-control @error('report_to_name') is-invalid @enderror" name="report_to_name" value="{{ $letter->report_to_name }}" required autocomplete="report_to_name">
                                        @error('report_to_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="report_to_dept" class="form-label">Report To ( Department )</label>
                                        <input id="report_to_dept" type="text" class="form-control @error('report_to_dept') is-invalid @enderror" name="report_to_dept" value="{{ $letter->report_to_dept }}" required autocomplete="report_to_dept">
                                        @error('report_to_dept')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="ctc-digits" class="form-label">CTC ( in digits )</label>
                                        <input id="ctc-digits" type="number" class="form-control @error('ctc-digits') is-invalid @enderror" name="ctc_digits" value="{{ $letter->ctc_digits }}" required autocomplete="ctc-digits">
                                        @error('ctc-digits')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
                                    <div class="mb-4 col-md-4">
                                        <label for="ctc_words" class="form-label">CTC ( in words )</label>
                                        <input id="ctc_words" type="text" class="form-control @error('ctc_words') is-invalid @enderror" name="ctc_words" value="{{ $letter->ctc_words }}" required autocomplete="ctc_words">
                                        @error('ctc_words')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="travel_allowance" class="form-label">Travel Allowance ( monthly )</label>
                                        <input id="travel_allowance" type="number" class="form-control @error('travel_allowance') is-invalid @enderror" name="travel_allowance" value="{{ $letter->travel_allowance }}" required autocomplete="travel_allowance">
                                        @error('travel_allowance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="probation_period" class="form-label">Probationary period ( months )</label>
                                        <input id="probation_period" type="number" class="form-control @error('probation_period') is-invalid @enderror" name="probation_period" value="{{ $letter->probation_period }}" required autocomplete="probation_period">
                                        @error('probation_period')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
    
                                    </div>
    
                                    <div class="mb-4 col-md-4">
                                        <label for="confirmation" class="form-label">Confirmation date ( last date to sign the letter )</label>
                                        <input id="confirmation" type="date" class="form-control @error('confirmation') is-invalid @enderror" name="confirmation" value="{{ $letter->confirmation }}" required autocomplete="confirmation">
                                        @error('confirmation')
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