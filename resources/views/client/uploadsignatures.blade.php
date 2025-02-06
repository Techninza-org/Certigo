@extends('layout.layout')

@push('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">


@endpush

@section('content')


<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">Upload Signatures</h4>
                <div class="d-block align-items-center justify-content-between mb-9">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{route('client.uploadSignaturesClient')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label for="client_signature">Client Signature</label>
                                <input type="file" class="form-control" id="client_signature" name="client_signature">
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                
                               <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
                        





@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>

@endpush