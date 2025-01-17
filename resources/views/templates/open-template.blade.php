@extends('layout.layout')
@push('css')
<style>
    /* Styling for the popup */
    .popup {
            display: none;
            position: absolute;
            right: 30px;
            background-color: #f9f9f9;
            padding: 5px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            z-index: 1;
            border-radius: 8px;            
            width: 9rem;
        }

        /* Styling for the popup options */
        .option {
            cursor: pointer;
            padding: 5px;
        }

        label {
            display: inline-block;
            padding-top: 10px;
            font-size: 15px;
        }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card w-100 mb-2">
        <div class="card-body p-0">
          <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('get.templates') }}">  Folders</a>
          <a class="btn btn-md text-secondary text-decoration-underline" href="{{ route('get_template_files') }}" onclick="event.preventDefault(); document.getElementById('back-client-audits{{ $folderid }}').submit();">  Templates</a>
          <form id="back-client-audits{{ $folderid }}" action="{{ route('get_template_files') }}" method="get" class="d-none">                                                       
            <input type="hidden" value="{{ $folderid }}" name="folderid">
        </form>
        </div>
      </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    
                    
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                @foreach($details as $key => $temp_d)
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link {{$key === 0 ? ' active' : ''}}" id="pills-tab{{ $temp_d->id }}" data-bs-toggle="pill" data-bs-target="#pills{{ $temp_d->id }}" type="button" role="tab" aria-controls="pills{{ $temp_d->id }}" aria-selected="true" >{{ $firstLetter }}{{ $letterAfterSpace }}-{{ $key+1 }}</button>
                                </li>
                                @endforeach

                                {{-- <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                </li> --}}
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @foreach($details as $key => $temp_d)
                                <div class="tab-pane fade show {{$key === 0 ? ' active' : ''}}" id="pills{{ $temp_d->id }}" role="tabpanel" aria-labelledby="pills-tab{{ $temp_d->id }}" tabindex="0">
                                    {{ $firstLetter }}{{ $letterAfterSpace }}-{{ $key+1 }}  .  {{ $temp_d->question }}

                                    <div class="mb-3 " id="response-box">
                                        @foreach($temp_d->respGrp as $resp)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $resp->score }}"  style="font-size: x-large;" name="{{ $temp_d->score_f }}">
                                                <label class="form-check-label" > {{ $resp->name }} </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    
            
                                    <div class="mb-3 ">
                                        <label class="form-label">Objective evidences:</label>
                                        <input type="text" class="form-control" name="remarks" >
                                    </div>
            
                                    <div class="mb-3 ">
                                        <label class="form-label">Give a Suggestion:</label>
                                        <input type="text" class="form-control" name="suggestions" >
                                    </div>

                                    <div class="mb-3 ">
                                        <label class="form-label">Upload evidences:</label>
                                        <input type="file" class="form-control" name="evidences" >
                                    </div>
                                </div>                                
                                @endforeach

                                
                               
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
        $('.popupButton').on('click', function() {
              var popup = $(this).next('.popup');
              // Hide all other popups
              $('.popup').not(popup).hide();
              // Toggle the display of the corresponding popup
              popup.toggle();
            });

            // Close the popup when clicking outside of it
            $(window).on('click', function(event) {
              if (!$(event.target).hasClass('popupButton') && !$(event.target).hasClass('popup')) {
                $('.popup').hide();
              }
            });
    </script>
@endpush
