@extends('layout.layout')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Generated Agreements</h2>
                        </div>
                        {{-- {{ dd($agreement) }} --}}
                        <div class="row">
                            @foreach ($agreement as $ag)
                                <div class="col-md-3 text-center mb-4">
                                    <a href="{{ route('client.myAgreementgetbyid', ['id' => $ag->client_id]) }}">
                                        <i class="fa-solid fa-folder"
                                            style="color: #1d6d96; font-size: xx-large;"></i></a><br>
                                    <p>{{ $ag->client_fname }} {{ $ag->client_lname }}</p>
                                    <p>{{ $ag->created_at }}
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h2 class="mb-4">Generate Agreement</h2>
        <form id="dynamicForm" method="post" action="{{ route('genrate.agreement.pdf') }}">
            @csrf


            <div class="mb-3">
                <label class="form-label">Select Client</label>
                <select class="form-control" name="client_id" required>
                    <option value="">Select a Client</option>
                    @foreach (json_decode($clients) as $client)
                        <option value="{{ $client->id }}">{{ $client->fname }} {{ $client->lname }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Basic Fields -->
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control" name="company_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Company Address</label>
                <input type="text" class="form-control" name="company_address" required>
            </div>

            {{-- SERVICES AND FEES AND EXPENSES --}}

            <div class="mb-3">
                <label class="form-label">SERVICES AND FEES AND EXPENSES</label>
                <div id="serviceFields">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="service[]" required>
                        <button type="button" class="btn btn-danger remove-service">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addServiceField()">Add</button>
            </div>

            <!-- TERM AND TERMINATION -->
            <div class="mb-3">
                <label class="form-label">TERM AND TERMINATION</label>
                <div id="termFields">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="term[]" required>
                        <button type="button" class="btn btn-danger remove-term">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addTermField()">Add</button>
            </div>

            <!-- GENERAL PROVISIONS -->
            <div class="mb-3">
                <label class="form-label">GENERAL PROVISIONS - State</label>
                <select class="form-select" name="state" required>
                    <option value="">Select State</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <!-- Add more states here -->
                </select>
            </div>

            <!-- COMMUNICATION AND NOTICES -->
            <div class="mb-3">
                <h5>COMMUNICATION AND NOTICES</h5>
                <div id="communicationFields">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="party[]" placeholder="Party" required>
                        <input type="text" class="form-control" name="contact[]" placeholder="Contact" required>
                        <input type="text" class="form-control" name="address[]" placeholder="Address" required>
                        <input type="email" class="form-control" name="email[]" placeholder="Email" required>
                        <button type="button" class="btn btn-danger remove-comm">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addCommunicationField()">Add</button>
            </div>

            <!-- Delivery method & Deemed delivery date and time -->
            <div class="mb-3">
                <h5>Delivery Details</h5>
                <div id="deliveryFields">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="delivery_method[]"
                            placeholder="Delivery Method" required>
                        <input type="text" class="form-control" name="deemed_delivery[]"
                            placeholder="Deemed delivery date and time" required>
                        <button type="button" class="btn btn-danger remove-delivery">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addDeliveryField()">Add</button>
            </div>

            <!-- Scope of Services -->
            <div class="mb-3">
                <h5>Scope of Services</h5>
                <div id="scopeFields">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="service_discription[]"
                            placeholder="Service Description" required>
                        <input type="text" class="form-control" name="quantity[]"
                            placeholder="Quantity X
frequency per year" required>
                        <input type="number" class="form-control" name="fees[]" placeholder="Fees(Rs.)" required>

                        <button type="button" class="btn btn-danger remove-scope">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addScopeField()">Add</button>
            </div>

            <!-- Term rate -->

            <div class="mb-3">
                <label class="form-label">Term Rate</label>
                <div id="termRateFields">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="term_rate[]"
                            placeholder="PHASE I of 150000/- Exclusive of GST." required>
                        <button type="button" class="btn btn-danger remove-term-rate">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addTermRateField()">Add</button>
            </div>


            <!-- Signed by -->
            <div class="mb-3">
                <label class="form-label">Signed by in the presence of</label>
                <input type="text" class="form-control" name="signed_by" required>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script>
        function addTermField() {
            let div = document.createElement("div");
            div.classList.add("input-group", "mb-2");
            div.innerHTML = `<input type="text" class="form-control" name="term[]" required>
                            <button type="button" class="btn btn-danger remove-term">Remove</button>`;
            document.getElementById("termFields").appendChild(div);
            div.querySelector(".remove-term").addEventListener("click", () => div.remove());
        }

        function addCommunicationField() {
            let div = document.createElement("div");
            div.classList.add("input-group", "mb-2");
            div.innerHTML = `<input type="text" class="form-control" name="party[]" placeholder="Party" required>
                            <input type="text" class="form-control" name="contact[]" placeholder="Contact" required>
                            <input type="text" class="form-control" name="address[]" placeholder="Address" required>
                            <input type="email" class="form-control" name="email[]" placeholder="Email" required>
                            <button type="button" class="btn btn-danger remove-comm">Remove</button>`;
            document.getElementById("communicationFields").appendChild(div);
            div.querySelector(".remove-comm").addEventListener("click", () => div.remove());
        }

        function addDeliveryField() {
            let div = document.createElement("div");
            div.classList.add("input-group", "mb-2");
            div.innerHTML = `<input type="text" class="form-control" name="delivery_method[]" placeholder="Delivery Method" required>
                            <input type="text" class="form-control" name="deemed_delivery[]" required>
                            <button type="button" class="btn btn-danger remove-delivery">Remove</button>`;
            document.getElementById("deliveryFields").appendChild(div);
            div.querySelector(".remove-delivery").addEventListener("click", () => div.remove());
        }

        function addScopeField() {
            let div = document.createElement("div");
            div.classList.add("input-group", "mb-2");
            div.innerHTML = `<input type="text" class="form-control" name="service_discription[]"
                            placeholder="Service Description" required>
                        <input type="text" class="form-control" name="quantity[]"
                            placeholder="Quantity X
frequency per year" required>
                        <input type="text" class="form-control" name="fees[]" placeholder="Fees(Rs.)" required>
                            <button type="button" class="btn btn-danger remove-scope">Remove</button>`;
            document.getElementById("scopeFields").appendChild(div);
            div.querySelector(".remove-scope").addEventListener("click", () => div.remove());
        }

        function addTermRateField() {
            let div = document.createElement("div");
            div.classList.add("input-group", "mb-2");
            div.innerHTML = `<input type="text" class="form-control" name="term_rate[]" required>
                            <button type="button" class="btn btn-danger remove-term-rate">Remove</button>`;
            document.getElementById("termRateFields").appendChild(div);
            div.querySelector(".remove-term-rate").addEventListener("click", () => div.remove());
        }

        function addServiceField() {
            let div = document.createElement("div");
            div.classList.add("input-group", "mb-2");
            div.innerHTML = `<input type="text" class="form-control" name="service[]" required>
                            <button type="button" class="btn btn-danger remove-service">Remove</button>`;
            document.getElementById("serviceFields").appendChild(div);
            div.querySelector(".remove-service").addEventListener("click", () => div.remove());
        }
    </script>
@endpush
