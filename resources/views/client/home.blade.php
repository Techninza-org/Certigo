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
                    <h2>View Audit Report</h2>
                </div>

                <div class="row">
                    @foreach ($myaudits as $audit)
                        @if ($audit->final_score != null)
                            <div class="col-md-3 text-center mb-4">
                                <div class="position-relative">
                                    <i class="fa-solid fa-ellipsis btn popupButton" aria-hidden="true"></i>
                                    <div class="popup">
                                        <div class="option" onclick="document.getElementById('auditReport{{ $audit->id }}').submit();">
                                            <i class="fa-solid fa-file-pdf"></i> View Report
                                        </div>
                                        <form id="auditReport{{ $audit->id }}" action="{{ route('audit.report.view') }}" method="GET" class="d-none">
                                            <input type="hidden" name="auditId" value="{{ $audit->id }}">
                                            <input type="hidden" name="cid" value="{{ $audit->client_id }}">
                                            <input type="hidden" name="auth_id" value="client">
                                        </form>
                                    </div>
                                </div>

                                <i class="fa-solid fa-folder" style="color: #1d6d96; font-size: xx-large;"></i><br>
                                <b>{{ $audit->audit_name }} {{ $audit->fname }} {{ $audit->lname }}</b>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function () {
    $('.popupButton').on('click', function () {
        var popup = $(this).next('.popup');
        $('.popup').not(popup).hide(); // Hide all other popups
        popup.toggle(); // Toggle the display of the current popup
    });

    $(window).on('click', function (event) {
        if (!$(event.target).closest('.popup, .popupButton').length) {
            $('.popup').hide();
        }
    });
});
</script>
@endpush
