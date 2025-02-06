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
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
          @foreach($codes as $index => $code)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $code->service_code }}</td>
                <th>
                  <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $code->id }}" data-service-code="{{ $code->service_code }}">
                      <i class="fa fa-edit"></i>
                  </a>
              </th>
              <th>
                <a href="{{ route('delete.serviceCode', $code->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service code?')">
                    <i class="fa fa-trash"></i>
                </a>
            </th>
            
            </tr>
          @endforeach
        </tbody>
    </table>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="editForm" method="POST" action="{{ route('update.serviceCode') }}">
              @csrf
              <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Service Code</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="id" id="serviceCodeId" value="">
                  <div class="mb-3">
                      <label for="serviceCode" class="form-label">Service Code</label>
                      <input type="text" name="service_code" id="serviceCode" class="form-control" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
      </div>
  </div>
</div>




@stop





@push('js')  
<script>
  // Set up the modal to populate data when opened
  document.addEventListener('DOMContentLoaded', function () {
      const editModal = document.getElementById('editModal');
      
      editModal.addEventListener('show.bs.modal', function (event) {
          const button = event.relatedTarget; // Button that triggered the modal
          const codeId = button.getAttribute('data-id'); // Extract service code ID
          const serviceCode = button.getAttribute('data-service-code'); // Extract service code

          // Populate the form fields
          document.getElementById('serviceCodeId').value = codeId;
          document.getElementById('serviceCode').value = serviceCode;
      });
  });
</script>
<script>
  let table = new DataTable('#myTable');
</script>
@endpush

