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
                        <h2>Audit Reports for  {{date('F', mktime(0, 0, 0, $month, 1))}}</h2>
                    </div>

                    <div class="row">
                        @foreach ($audits as $audit)
                            @if ($audit->report_path != null)
                                <div class="col-md-3 text-center mb-4">
                                    <div class="position-relative">
                                        <i class="fa-solid fa-file-pdf btn popupButton" aria-hidden="true"></i>
                                        <div class="popup">
                                            <div class="option"
                                                onclick="openpdfinmodal('{{ asset($audit->report_path) }}')">
                                                <i class="fa-solid fa-file-pdf"></i> View Report
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $audit->audit_name }}</p>
                                    <p>{{ $audit->start }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- PDF Preview Modal -->
    <div class="modal fade" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="pdfPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfPreviewModalLabel">PDF Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfPreviewIframe" src="" frameborder="0" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
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
        function openpdfinmodal(pdfPath) {
            const modalIframe = document.getElementById('pdfPreviewIframe');
            modalIframe.src = pdfPath; // Set the PDF URL in the iframe
            const modal = new bootstrap.Modal(document.getElementById('pdfPreviewModal')); // Initialize Bootstrap modal
            modal.show(); // Show the modal
        }
    </script>
@endpush
