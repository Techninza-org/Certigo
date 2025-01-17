<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <title>Pay Slip By CERTIGO QAS® Pvt Ltd</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }

        th,td{
            padding: 2px;
        }
    </style>
</head>

<body>



    <main>
        <div class="container-fluid m-0 p-0" style="border: 1px solid black;">
            <div>
                <table style="border-collapse: collapse;width:100%;">
                    <tr>
                        <th style="text-align: center;width:100%;font-size:25px">
                            CERTIGO QAS PRIVATE LIMITED
                        </th>
                    </tr>
                </table>
            </div>
            <div class="d-flex justify-content-between">
                <div class="p-1">
                    
                    <strong >Registered Address- </strong>
                    <p class="m-o pb-1 pe-5" style="width: 400px:font-size:18px">
                        Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa Kannayaapeta, Above SBI Life Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra pradesh.
                    </p>
                </div>
                <div class="p-4" style="align-self: center;">
                    {{-- <img src="{{ env('APP_URL') }}/storage/pay-slips/{{ $slip->company_logo }}" alt="image" style="width: 200px"> --}}
                    <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 200px;height: 35px;" alt="">

                </div>
            </div>
            <div>
                <table style="border-collapse: collapse;width:100%;">
                    <tr>
                        <th style="text-align: center;width:100%;font-size:20px">
                            <span style="font-size: 20px">PAYSLIP for</span>&nbsp;<span style="font-size: 20px">{{ $slip->month }} {{ $slip->year }}</span>
                        </th>
                    </tr>
                </table>
            </div>

            <table style=" table-layout: fixed;width: 100%;  ">
                <tr>
                    <td>
                       Name of the Employee
                    </td>
                    <td>
                        {{ $slip->employee_name }}
                    </td>
                    <td>
                        UAN
                     </td>
                     <td>
                         {{ $slip->uan }}
                     </td>
                </tr>
                <tr>
                    <td>
                       Employee ID
                    </td>
                    <td>
                        {{ $slip->employee_number }}
                    </td>
                    <td>
                        PF No.
                     </td>
                     <td>
                         {{ $slip->pf_number }}
                     </td>
                </tr>
                <tr>
                    <td>
                        Designation
                    </td>
                    <td>
                         {{ $slip->designation }}
                    </td>
                    <td>
                       ESI No.
                    </td>
                    <td>
                        {{ $slip->esi_no }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Department
                    </td>
                    <td>
                         {{ $slip->department }}
                    </td>
                    <td>
                      Bank Name
                    </td>
                    <td>
                        {{ $slip->bank }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        DOJ
                    </td>
                    <td>
                         {{ $slip->joined_date }}
                    </td>
                    <td>
                      Bank A/C No.
                    </td>
                    <td>
                        {{ $slip->bank_account }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Gross Wage
                    </td>
                    <td>
                       ₹ {{ $slip->gross_salary }}
                    </td>
                    <td>
                      
                    </td>
                    <td>
                       
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Total Working Days
                    </td>
                    <td>
                        {{ $slip->twd }}
                    </td>
                    <td>
                      Paid Days
                    </td>
                    <td>
                        {{ $slip->apd }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        LOP Days
                    </td>
                    <td>
                        {{ $slip->lpd }}
                    </td>
                    <td>
                      Leaves Taken
                    </td>
                    <td>
                        {{ $slip->dp }}
                    </td>
                    
                </tr>
            </table>

            {{-- <div class="">
                <strong>{{ $slip->employee_name }}</strong>
                <hr style="    border: 1.5px solid black;opacity:1">
                <div class="d-flex justify-content-between">
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">Employee Number</p>
                        {{ $slip->employee_number }}
                    </div>
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">Date Joined</p>
                        {{ $slip->joined_date }}
                    </div>
                    <div class="" style="    width: 20%;">
                        <p class="m-0 text-secondary">Department</p>
                        {{ $slip->department }}
                    </div>
                    <div class="" style="    width: 30%;">
                        <p class="m-0 text-secondary">Sub Department</p>
                        {{ $slip->sub_department }}
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class=""  style="    width: 25%;">
                        <p class="m-0 text-secondary">Designation</p>
                        {{ $slip->designation }}
                    </div>
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">Payment Mode</p>
                        {{ $slip->payment_mode }}
                    </div>
                    <div class="" style="    width: 20%;">
                        <p class="m-0 text-secondary">Bank</p>
                        {{ $slip->bank }}
                    </div>
                    <div class="" style="    width: 30%;">
                        <p class="m-0 text-secondary">Bank IFSC</p>
                        {{ $slip->ifsc }}
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">Bank Account</p>
                        {{ $slip->bank_account }}
                    </div>
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">PAN</p>
                        {{ $slip->pan }}
                    </div>
                    <div class="" style="    width: 20%;">
                        <p class="m-0 text-secondary">UAF</p>
                        {{ $slip->uan }}
                    </div>
                    <div class="" style="    width: 30%;">
                        <p class="m-0 text-secondary">PF Number</p>
                        <p class="m-0" style="width: 200px">{{ $slip->pf_number }}</p>
                    </div>
                </div>
            </div> --}}

            {{-- <hr  style="    border: 1.5px solid black;opacity:1"> --}}

            {{-- <div class="mt-4">
                <strong>Salary Details</strong>
                <hr  style="    border: 1.5px solid black;opacity:1">
                <div class="d-flex justify-content-between">
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">Actual Payable Days</p>
                        {{ $slip->apd }}
                    </div>
                    <div class="" style="    width: 25%;">
                        <p class="m-0 text-secondary">Total Working Days</p>
                        {{ $slip->twd }}
                    </div>
                    <div class="" style="    width: 20%;">
                        <p class="m-0 text-secondary">Loss of Pay Days</p>
                        {{ $slip->lpd }}
                    </div>
                    <div class="" style="    width: 30%;">
                        <p class="m-0 text-secondary">Days Payable</p>
                        {{ $slip->dp }}
                    </div>
                </div>
            </div> --}}
            {{-- <hr> --}}

            <table class="mt-4" style=" table-layout: fixed;width: 100%;  ">
                <tr>
                    <th class="text-center" colspan="2">
                      Earnings
                    </th>
                    
                    <th class="text-center" colspan="2">
                        Deductions
                    </th>
                    
                </tr>
                <tr>
                    <td>
                       Basic Wage
                    </td>
                    <td>
                       ₹ {{ $slip->basic }}
                    </td>
                    <td>
                        EPF
                     </td>
                     <td>
                        ₹ {{ $slip->pf_value }}
                     </td>
                </tr>
                <tr>
                    <td>
                        HRA
                    </td>
                    <td>
                        ₹ {{ $slip->hra }}
                    </td>
                    <td>
                       ESI/Health Insurance
                    </td>
                    <td>
                        ₹ {{ $slip->esi_value }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Conveyance Allowances
                    </td>
                    <td>
                        ₹ {{ $slip->conveyance_allowance }}
                    </td>
                    <td>
                        Professional Tax
                    </td>
                    <td>
                       ₹ {{ $slip->professional_tax }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Medical Allowances
                    </td>
                    <td>
                        ₹ {{ $slip->medical_allowance }}
                    </td>
                    <td>
                      Loan Recovery
                    </td>
                    <td>
                       ₹ {{ $slip->loan_recovery }}
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Other Allowances
                    </td>
                    <td>
                    ₹ {{ $slip->adhoc_allowance }}
                    </td>
                    <td>
                      Loss of pay days
                    </td>
                    <td>
                    ₹ {{ $slip->loss_of_pay_days }}
                    </td>
                    
                </tr>
                <tr>
                    <th>
                        Total Earnings
                    </th>
                    <th>₹
                        {{ $slip->total_earnings }}
                    </th>
                    <th>
                        Total Deductions
                    </th>
                    <td>
                        ₹ {{ $slip->total_deductions }}
                    </td>
                    
                </tr>
                <tr>
                    <th class="text-center" colspan="3">
                        Net Salary
                    </th>
                    <th>
                        ₹ 
                        {{ $slip->net_salary }}
                    </th>
                    
                    
                </tr>
            </table>
            <div class="d-flex justify-content-between align-items-end" style="height: 70px">
                <div>
                    <p class="ps-2 m-0">Employer Signature</p>
                </div>
                <div>
                    <p  class="pe-2 m-0">Employee Signature</p>

                </div>
            </div>

            {{-- <div class="mt-4 row">
                <div class="col col-md-6">
                    <strong>Earnings</strong>
                    <div class="row">
                        <div class="col col-md-6" >
                            <p class="m-0">Basic</p>
                            <p class="m-0">HRA</p>
                            <p class="m-0">Medical Allowance</p>
                            <p class="m-0">Adhoc Allowance</p>
                            <p class="m-0"><strong>Total Earnings (A)</strong></p>

                        </div>
                        <div class="col col-md-6" >
                            <p class="m-0">{{ $slip->basic }}</p>
                            <p class="m-0">{{ $slip->hra }}</p>
                            <p class="m-0">{{ $slip->medical_allowance }}</p>
                            <p class="m-0">{{ $slip->adhoc_allowance }}</p>
                            <p class="m-0">
                                @php 
                                    $total_earnings = $slip->basic+$slip->hra+$slip->medical_allowance+$slip->adhoc_allowance;
                                    echo $total_earnings;
                                @endphp
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <strong>Contributions</strong>
                    <div class="d-flex justify-content-between">
                        <p>PF Employee</p><p class="m-0">{{ $slip->pf_value }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="m-0"><strong style="font-size: 15px">Total Contributions (B)</strong></p><p class="m-0">{{ $slip->pf_value }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="m-0"><strong style="font-size: 15px"> TAXES & DEDUCTIONS</strong></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="m-0"> Professional Tax</p><p class="m-0">{{ $slip->professional_tax }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="m-0"><strong style="font-size: 15px">Total Deductions (C)</strong></p><p class="m-0">{{ $slip->professional_tax }}</p>
                    </div>
                   
                </div>
            </div> --}}

            {{-- <div class="mt-4 d-flex justify-content-between">
                <div>
                    <strong>Earnings</strong>
                    <div class="d-flex justify-content-evenly">
                        <div style="    margin: 0 20px 0 0;    padding: 0 20px 0 0;">
                            <p>Basic</p>
                            <p>HRA</p>
                            <p>Medical Allowance</p>
                            <p>Adhoc Allowance</p>
                            <p>Total Earnings (A)</p>

                        </div>
                        <div style="    margin: 0 20px 0 0;    padding: 0 20px 0 0;">
                            <p>37000</p>
                            <p>18025</p>
                            <p>1250.25</p>
                            <p>17500</p>
                            <p>75000</p>

                        </div>

                    </div>
                </div>
                <div>
                    <strong>Contributions</strong>
                    <div class="d-flex justify-content-evenly">
                        <div style="    margin: 0 20px 0 0;    padding: 0 20px 0 0;">
                            <p>PF Employee</p>
                            <p>Total Contributions (B)</p>

                            <p> TAXES & DEDUCTIONS</p>
                            <p> Professional Tax</p>
                            <strong>Total Deductions (C)</strong>
                        </div>
                        <div style="    margin: 0 20px 0 0;    padding: 0 20px 0 0;">
                            <p>37000</p>
                            <p>18025</p>
                            <p> </p>
                            <p>208</p>
                            <p>208</p>
                            
                        </div>

                    </div>
                </div>
            </div> --}}
            {{-- <hr  style="    border: 1.5px solid black;opacity:1"> --}}

            {{-- <div class="row">
                <div class="col col-md-6">
                    <p>Net Salary Payable ( A - B - C )</p>
                </div>
                <div class="col col-md-6">
                    <p>₹ 
                     @php 
                        $net_salary = $total_earnings - $slip->pf_value -  $slip->professional_tax;
                        echo $net_salary;
                    @endphp
                    </p>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col col-md-6">
                    <p>Net Salary in words</p>
                </div>
                <div class="col col-md-6">
                    <strong>{{ $slip->net_salary_in_words }}</strong>
                </div>
            </div> --}}

        </div>
        <p class="text-center mt-4"> This is system generated Pay Slip</p>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"
        integrity="sha512-v/wOVTkoU7mXEJC3hXnw9AA6v32qzpknvuUF6J2Lbkasxaxn2nYcl+HGB7fr/kChGfCqubVr1n2sq1UFu3Gh1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    window.onload = window.print();

    </script>
</body>

</html>
