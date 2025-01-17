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

                <form action="{{ route('post.serviceCode') }}" method="post">

                    @csrf

                    <div class="mb-3">

                      <label class="form-label">Enter Service-Code Name</label>

                      <input type="text" class="form-control" name="service_code">

                    </div>

                    

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>

      </div>

    </div>

    <div class="col-md-12">
      <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Service Code</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($codes as $index => $code)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $code->service_code }}</td>
                
            </tr>
          @endforeach
        </tbody>
    </table>
    </div>

</div>







@stop





@push('js')  
<script>
  let table = new DataTable('#myTable');
</script>
@endpush

