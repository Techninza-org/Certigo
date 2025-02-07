@extends('layout.layout')

@push('css')
    <style>
        /* Styling for the popup */
        .popup {
            display: none;
            position: absolute;
            right: 30px;
            background-color: #f9f9f9;
            padding: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            z-index: 1;
            border-radius: 8px;
            width: 15rem;
        }

        /* Styling for the popup options */
        .option {
            cursor: pointer;
            padding: 8px 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            color: #333;
            transition: background-color 0.3s;
        }

        .option:hover {
            background-color: #f0f0f0;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>My Agreements</h2>
                    </div>
                    {{-- <p> hy{{ $agreements }}</p> --}}
                    <div class="row">
                        @if ($agreements != null)
                            @foreach ($agreements as $agreement)
                                <div class="col-md-3 text-center mb-4">
                                    <div class="position-relative">
                                        <i class="fa-solid fa-ellipsis btn popupButton" aria-hidden="true"></i>
                                        <!-- Trigger Button -->
                                        <!-- Trigger Button -->
                                        <!-- Trigger Button -->
                                        <div class="popup">
                                            <div class="option" onclick="openPdfInModal('{{ $agreement->client_id }}')">
                                                <i class="fa-solid fa-file-pdf"></i> View Agreement
                                            </div>
                                        </div>
                                    </div>
                                    <i class="fa-solid fa-folder" style="color: #1d6d96; font-size: xx-large;"></i><br>
                                    <p>{{ \Carbon\Carbon::parse($agreement->created_at)->format('d-m-Y') }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="pdfModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 9999;">
        <div
            style="position: relative; width: 80%; height: 90%; margin: 5% auto; background: white; padding: 20px; border-radius: 10px;">
            <button onclick="closeModal()"
                style="position: absolute; top: 10px; right: 10px; background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">Close</button>
            <iframe id="pdfViewer" src="" style="width: 100%; height: 100%; border: none;"></iframe>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.popupButton').on('click', function() {
                var popup = $(this).next('.popup');
                $('.popup').not(popup).hide(); // Hide all other popups
                popup.toggle(); // Toggle the display of the current popup
            });

            $(window).on('click', function(event) {
                if (!$(event.target).closest('.popup, .popupButton').length) {
                    $('.popup').hide();
                }
            });
        });
    </script>
    <script>
        function openPdfInModal(clientId) {
            // Generate the route URL dynamically
            const url = `{{ route('client.myAgreementgetbyid', ':id') }}`.replace(':id', clientId);

            // Directly load the rendered page inside the iframe
            document.getElementById('pdfViewer').src = url;
            document.getElementById('pdfModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('pdfModal').style.display = 'none';
            document.getElementById('pdfViewer').src = ''; // Clear the iframe content
        }
    </script>
@endpush
