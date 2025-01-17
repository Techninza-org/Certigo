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

              <ul> 

                  <li>{!! \Session::get('success') !!} </li> 

              </ul> 

          </div> 

          @endif

          @if (Session::has('error')) 

          <div class="alert alert-danger"> 

              <ul> 

                  <li>{!! \Session::get('error') !!} </li> 

              </ul> 

          </div> 

          @endif

            <div>

                <form action="{{ route('set.graph.page') }}" method="post">

                    @csrf

                    <div class="mb-3">

                      <label class="form-label">Set your graph orientation</label>

                      <select name="type" id="" class="form-select">
                        <option value="0" {{ $color->type == 0 ? 'selected' : '' }}>Horizontal</option>
                        <option value="1" {{ $color->type == 1 ? 'selected' : '' }}>Vertical</option>

                      </select>

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>

      </div>

    </div>

</div>







@stop





@push('js')  

@endpush

