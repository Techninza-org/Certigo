@extends('layout.layout')

@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>Upload Signatures</h3>
                    @if (\Session::has('success')) 
                    <div class="alert alert-success"> 
                        <ul> 
                            <li>{!! \Session::get('success') !!} </li> 
                        </ul> 
                    </div> 
                    @endif
                    @if (\Session::has('error')) 
                    <div class="alert alert-danger"> 
                        <ul> 
                            <li>{!! \Session::get('error') !!} </li> 
                        </ul> 
                    </div> 
                    @endif
                    <form action="{{ route('sample.signatures') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="sampleId" value="{{ $sampleId }}">

                        <label >First Signature</label>
                        <input class="form-control mb-3" type="file" name="sample_bysign" >

                        <label >Second Signature </label>
                        <input class="form-control mb-3" type="file" name="sample_tosign" >

                        <button class="btn btn-sm btn-primary" type="submit">Upload</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
@endpush