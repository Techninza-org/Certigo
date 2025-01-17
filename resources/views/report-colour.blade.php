@extends('layout.layout')

@push('css')

   

@endpush

@section('content')





<div class="row">

    <div class="col-lg-12 col-md-12">

      <div class="card w-100 mb-2">

        <div class="card-body p-5">

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
              <div class="col-lg-6">
                  <form action="{{ route('set.color.page') }}" method="post">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label">Set color for Hygiene Report</label>
                        <input type="color" class="form-control" name="color" value="{{ $color->color }}" style="    height: 42px;">
                      </div>
              
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
              <div class="col-lg-6">
                <form action="{{ route('set.color.ind.page') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Set color for Industrial Report</label>
                      <input type="color" class="form-control" name="color" value="{{ $colorInd->color }}" style="    height: 42px;">
                    </div>
              
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              
                        </div>
            </div>

        </div>

      </div>

    </div>

</div>







@stop





@push('js')  

@endpush

