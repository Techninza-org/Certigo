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

            width: 8rem;

        }



        /* Styling for the popup options */

        .option {

            cursor: pointer;

            padding: 5px;

        }



        .option a {

            width: -webkit-fill-available;

        }
    </style>
@endpush

@section('content')
    <div class="row">

        <div class="col-lg-12 d-flex align-items-strech">

            <div class="card w-100">

                <div class="card-body">

                    <div>

                        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal"
                            data-bs-target="#templateAddModal">

                            <i class="fa-solid fa-circle-plus" style="color: #f9f9f9"></i>&nbsp; Add New folder

                        </button>

                        @if (\Session::has('success'))
                            <div class="alert alert-success">

                                <ul>

                                    <li>{!! \Session::get('success') !!}

                                    </li>

                                </ul>

                            </div>
                        @endif

                        @if (\Session::has('error'))
                            <div class="alert alert-danger">

                                <ul>

                                    <li>{!! \Session::get('error') !!}

                                    </li>

                                </ul>

                            </div>
                        @endif



                    </div>

                    <div class="row">

                        {{-- @if (\Session::has('s_msg'))

                        <div class="alert alert-success alert-dismissible" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                            <strong> Folder removed successfully ! </strong> 

                        </div>



                        @endif --}}

                        @foreach ($templates as $template)
                            <div class="col-md-2 text-center">



                                <div class="text-end" style="    position: relative;">

                                    <i class="fa-solid fa-ellipsis btn popupButton"></i>



                                    <div id="popup" class="popup">

                                        <div class="option d-flex p-2">

                                            <a class="btn pt-0 pb-0" href="{{ route('get_template_files') }}"
                                                onclick = "event.preventDefault(); document.getElementById('open-folder{{ $template->id }}').submit();">

                                                <i class="fa-solid fa-book" style="color: rgb(0, 94, 255)"></i> Open </a>

                                            <form id="open-folder{{ $template->id }}"
                                                action="{{ route('get_template_files') }}" method="get" class="d-none">





                                                <input type="hidden" name="folderid" value="{{ $template->id }}">

                                            </form>

                                        </div>

                                        <div class="option d-flex p-2">

                                            <a class="btn pt-0 pb-0" data-bs-toggle="modal"
                                                data-bs-target="#editTempModal{{ $template->id }}">

                                                <i class="fa-solid fa-pen-to-square"></i> Edit </a>

                                        </div>

                                        <div class="option d-flex p-2">

                                            <a class="btn pt-0 pb-0" href="{{ route('removeFolder') }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-folder{{ $template->id }}').submit();">

                                                <i class="fa-solid fa-trash-can" style="color: red"></i> Delete </a>

                                            <form id="delete-folder{{ $template->id }}" action="{{ route('removeFolder') }}"
                                                method="post" class="d-none">

                                                @csrf

                                                <input type="hidden" value="{{ $template->id }}" name="folderId">

                                            </form>

                                        </div>

                                        <div class="option d-flex p-2">
                                            {{-- copy folder --}}
                                            <a class="btn pt-0 pb-0" href="#"
                                                onclick="event.preventDefault(); document.getElementById('copy-folder{{ $template->id }}').submit();">
                                                <i class="fa-solid fa-copy" style="color: rgb(0, 94, 255)"></i> Copy
                                            </a>

                                            <form id="copy-folder{{ $template->id }}" action="{{ route('copyFolder') }}"
                                                method="post" class="d-none">
                                                @csrf
                                                <input type="hidden" value="{{ $template->id }}" name="folder_id">
                                            </form>
                                        </div>



                                    </div>

                                </div>

                                <i class="fa-solid fa-folder" style="color: #1d6d96;font-size:xx-large"></i> <br>

                                <b>{{ $template->title }}</b>

                                <p class="text-primary" style="    font-size: 12px;">Total Templates: {{ $template->tc }}
                                </p>

                            </div>
                        @endforeach

                    </div>

                </div>





            </div>

        </div>

    </div>
@endsection



<div class="modal fade" id="templateAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new folder</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">



                <form action="{{ route('folder.store') }}" method="post">

                    @csrf

                    <div class="row">



                        <div class="mb-3 ">

                            <label class="form-label">Folder name</label>

                            <input type="text" class="form-control" name="title">

                        </div>



                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary">ADD</button>

                        </div>

                    </div>

                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                </form>



            </div>



        </div>

    </div>

</div>





{{-- Edit template modal  --}}

@foreach ($templates as $template)
    <div class="modal fade" id="editTempModal{{ $template->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">



                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form action="{{ route('edittemplatename') }}" method="post">

                        @csrf

                        <div class="row">



                            <div class="mb-3 ">

                                <label class="form-label">Template name</label>

                                <input type="text" class="form-control" name="title"
                                    value="{{ $template->title }}">

                            </div>



                            <input type="hidden" value="{{ $template->id }}" name="template_id">

                        </div>

                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>

                    </form>

                </div>



            </div>

        </div>

    </div>
@endforeach







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



        toastr.options.timeOut = 10000;

        @if (Session::has('e_msg'))

            toastr.error('{{ Session::get('e_msg') }}');
        @elseif (Session::has('s_msg'))

            toastr.success('{{ Session::get('s_msg') }}');
        @endif
    </script>
@endpush
