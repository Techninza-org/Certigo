<!DOCTYPE html>

<html lang="en">







<head>



    <meta charset="utf-8">



    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Certigo QAS Pvt. Ltd.</title>



    <link rel="shortcut icon" type="image/png" href="{{ url('') }}/images/certigoqas-logo.png">



    {{-- csrf token  --}}



    <meta name="csrf-token" content="{{ csrf_token() }}" />



    {{-- Custom stylesheet  --}}



    <link rel="stylesheet" href="{{ url('') }}/css/css-styles.min.css">



    {{-- Selectbox virtual  --}}



    <link rel="stylesheet" href="{{ url('') }}/css/virtual-select.min.css">







    {{-- Jquery  --}}



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



    {{-- Toastr  --}}



    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />



    {{-- Multi select 2  --}}



    {{-- bootstrap  --}}



    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"

        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="

        crossorigin="anonymous" referrerpolicy="no-referrer" />







    <style>

        * {



            color: black;



        }







        .templates-questions strong {



            color: inherit !important;



        }











        .modal {



            --bs-modal-width: 800px !important;



        }







        .form-label {



            margin-bottom: 0.5rem;



            font-weight: 600;



            color: #9b9b9b;



            font-size: small;



        }











        th {



            font-size: 14px;



        }







        td {



            font-size: 13px;



        }







        .templates-table td {



            border: 1px solid {{ $color_code }};



            padding-left: 5px;



        }







        .templates-questions td {



            vertical-align: text-top;



            border: 1px solid {{ $color_code }};



            padding-left: 5px;



        }







        .templates-questions td:nth-child(1) {



            font-weight: 800;



        }







        table>tbody>tr>td.td-seperator {



            width: 20px;



            text-align: center;



        }











        /* chart css */



        .highcharts-figure,



        .highcharts-data-table table {



            min-width: 310px;



            max-width: 800px;



            margin: 1em auto;



        }







        #container {



            height: 300px;



        }







        .highcharts-data-table table {



            font-family: Verdana, sans-serif;



            border-collapse: collapse;



            border: 1px solid #ebebeb;



            margin: 10px auto;



            text-align: center;



            width: 100%;



            max-width: 500px;



        }







        .highcharts-data-table caption {



            padding: 1em 0;



            font-size: 1.2em;



            color: #555;



        }







        .highcharts-data-table th {



            font-weight: 600;



            padding: 0.5em;



        }







        .highcharts-data-table td,



        .highcharts-data-table th,



        .highcharts-data-table caption {



            padding: 0.5em;



        }







        .highcharts-data-table thead tr,



        .highcharts-data-table tr:nth-child(even) {



            background: #f8f8f8;



        }







        .highcharts-data-table tr:hover {



            background: #f1f7ff;



        }







        .highcharts-legend.highcharts-no-tooltip {



            display: none !important;



        }



















        .progress-bar {



            width: 100%;



            height: 15px;

            /* Adjust the height as needed */



            background-color: #ccc;

            /* Background color of the progress bar container */



        }







        .progress {



            height: 100%;



            width: 0;

            /* Start with 0% width */



            background-color: #4caf50;

            /* Color of the progress bar */



            text-align: center;



            line-height: 20px;

            /* Should be the same as the height of the progress bar */



            color: white;

            /* Text color */



            font-weight: bold;



        }


        .highcharts-credits{
            display:none;
        }

    </style>



    @stack('css')



</head>







<body>



    <!--  Body Wrapper -->



    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"

        data-sidebar-position="fixed" data-header-position="fixed">



        <!-- Sidebar Start -->



        <div class=" m-3">







            <div class="row justify-content-center">



                <div class="col-lg-12 col-md-12">







                    <div class="">







                        <div class="d-flex justify-content-between">



                            <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 200px;height: 35px;" alt="">



                            <p style="font-size: 14px">Unit <i>fssai</i> license number : <br> {{ $client->fssai_no }}</p>



                        </div>



                        <div class="mb-2 text-center">



                            <strong class=""style="margin-top:0px;font-size:14px">{{ $audit->audit_name }} For



                                {{ $client->organisation_name }}</strong>



                        </div>



                        <p class="text-end" style=" font-size: 12px;">Date: {{ $todayDate }} {{ $todayTime }}

                            <br>Generated by: {{ $auth_user->name }}</p>















                        {{-- Audit Details  --}}



                        <div class="">







                            {{-- <p



                                style="    font-size: 15px; margin-bottom: 0px;padding: 7px;background-color:{{ $color_code }};margin-top: 10px;color: white;">



                                1. Audit Details</p> --}}



                            <table style="border-collapse: collapse;width:100%;">



                                <thead>



                                    <tr>



                                        <th colspan="6"

                                            style="    font-size: 15px; margin-bottom: 0px;padding: 7px;background-color:{{ $color_code }};margin-top: 10px;color: white;">



                                            1. Audit Details



                                        </th>



                                    </tr>



                                </thead>



                                <tbody>











                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Service Code</th>



                                        <td class="td-seperator">:</td>



                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $audit->audit_index }}</td>







                                    </tr>







                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Name of the Inspection</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $audit->audit_name }}</td>







                                    </tr>







                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Type of the Inspection</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $audit->audit_type }}</td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Inspected Company</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $client->organisation_name }}</td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Client representative name</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $client->title }}. {{ $client->fname }} {{ $client->lname }}

                                            ({{ $client->designation }})</td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Client ID</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $client->client_id }}</td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Name of the auditor</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $auditor->name }} </td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Consulting Organization</th>



                                        <td class="td-seperator">:</td>







                                        <td

                                            colspan="5"style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ env('COMPANY_SHORT_NAME') }} </td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Geolocation of the Company</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="5"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $client->organisation_location }}</td>







                                    </tr>







                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Audit start date </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            @php



                                                $date = date('d/m/Y ', strtotime($audit->start));



                                                echo $date;



                                            @endphp



                                        </td>







                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Date Completed </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $audit->end }}



                                        </td>











                                    </tr>







                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Time started </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">

                                            {{ $start_time }}







                                            {{-- <strong style="margin-left:110px;margin-right: 49px;">Time ended  </strong> <span> : </span><span style="margin-left:10px">12:41 pm(dummy)</span> --}}



                                        </td>







                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Time ended </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $audit->end_time }}



                                        </td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Score </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            @php



                                                $percent = ($actual_responses / $target_responses) * 100;



                                                echo round($percent, 2);



                                            @endphp %







                                            {{-- <strong style="margin-left:117px;margin-right: 31px;">Actual / Target  </strong> <span> : </span><span style="margin-left:10px">



                                           {{$total_positive_responses}} / 



                                            @php



                                                echo array_sum($total_qu_count);



                                            @endphp



                                        </span> --}}



                                        </td>







                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Actual / Target</th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $actual_responses }} / {{ $target_responses }}







                                        </td>







                                    </tr>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Result</th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            @php



                                                $percent = ($actual_responses / $target_responses) * 100;



                                                $finalPer = round($percent, 2);



                                                if ($finalPer < 85) {

                                                    echo "<p style='margin-bottom: 0;font-weight: 700;color: orange;'>Non-Compliance</p>";

                                                } else {

                                                    echo "<p style='margin-bottom: 0;font-weight: 700;color: green;'>Compliance</p>";

                                                }



                                            @endphp











                                            {{-- <strong style="margin-left:68px;margin-right: 68px;">Sections </strong> <span> : </span><span style="margin-left:10px">{{ $sectionCount }}</span> --}}



                                        </td>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Sections</th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $sectionCount }}



                                        </td>



                                    </tr>



                                </tbody>



                            </table>







                        </div>







                        {{-- Company and Contact details  --}}



                        <div class="mt-3">







                            {{-- <p



                                style="    font-size: 15px; margin-bottom: 0px;padding: 7px;background-color:{{ $color_code }};margin-top: 10px;color: white;">



                                2. Company and Contact details:</p> --}}



                            <table style="border-collapse: collapse;width:100%;">



                                <thead>



                                    <tr>



                                        <th colspan="6"

                                            style="    font-size: 15px;



                                        margin-bottom: 0px;



                                        padding: 7px;



                                        background-color:{{ $color_code }};



                                        margin-top: 10px;



                                        color: white;">







                                            2. Company and Contact details:



                                        </th>



                                    </tr>



                                </thead>



                                <tbody>



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Name of the Company</th>



                                        <td class="td-seperator">:</td>



                                        <td colspan="4"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $client->organisation_name }}</td>







                                    </tr>







                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">



                                            Address</th>



                                        <td class="td-seperator">:</td>







                                        <td colspan="4"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">



                                            {{ $client->organisation_location }}</td>







                                    </tr>



























                                    {{-- <tr>



                                        <th scope="row" style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">Contact No. </th>



                                        <td class="td-seperator">:</td>



                                        <td  style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;"> {{$client->comp_cont_no}}



                                       



                                            <strong style="margin-left: 114px; margin-right: 8px;">Pin Code  </strong> <span> : </span><span style="margin-left:10px">{{$client->pincode}}</span>



                                        </td>                                   



                                        



                                    </tr> --}}



                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Contact No. </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">

                                            {{ $client->comp_cont_no }}











                                        </td>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Pin-Code </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">

                                            {{ $client->pincode }}











                                        </td>



                                    </tr>







                                    {{-- <tr>



                                        <th scope="row" style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">E-Mail ID </th>



                                        <td class="td-seperator">:</td>



                                        <td  style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;"> {{$client->company_emailid}}



                                       



                                            <strong style="margin-left: 23px; margin-right: 16px;">Website </strong> <span> : </span><span style="margin-left:10px">{{$client->company_website}}</span>



                                        </td>                                   



                                        



                                    </tr> --}}







                                    <tr>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            E-Mail ID </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">

                                            {{ $client->company_emailid }}







                                        </td>



                                        <th scope="row"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;;font-size:14px">

                                            Website </th>



                                        <td class="td-seperator">:</td>



                                        <td style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;">

                                            {{ $client->company_website }}







                                        </td>



                                    </tr>



                                </tbody>















                            </table>







                        </div>



                        <div style='page-break-after: always;'> </div>







                        {{-- TEMPLATES NAME TABLE  --}}



                        <div class="mt-4">



                            <table style="border-collapse: collapse;width:100%;">



                                <thead>







                                    <tr>



                                        <th scope="col"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;background-color:{{ $color_code }}; color: white;">



                                            Section</th>



                                        <th scope="col"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;background-color:{{ $color_code }}; color: white;">



                                            Actual</th>



                                        <th scope="col"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;background-color:{{ $color_code }}; color: white;">



                                            Target</th>



                                        <th scope="col"

                                            style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;background-color:{{ $color_code }}; color: white;">



                                            %</th>







                                    </tr>



                                </thead>



                                <tbody>



                                    @foreach ($templatecoll as $t)

                                        <tr class="templates-table">



                                            <td>{{ $t['tempName'] }}</td>



                                            <td>



                                                {{ $t['positive_responses'] }}



                                            </td>



                                            <td>{{ $t['target_responses'] }}</td>



                                            <td>



                                                @php



                                                    $percen = ($t['positive_responses'] / $t['target_responses']) * 100;



                                                    echo round($percen, 2);



                                                @endphp



                                            </td>







                                        </tr>

                                    @endforeach



                                    {{-- <tr class="templates-table">



                                        <td>SERVICE AREA</td>



                                        <td>11</td>



                                        <td>18</td>



                                        <td>60.11</td>







                                    </tr> --}}



                                </tbody>







                            </table>



                        </div>





                        <div class="row">

                            <div class="col-lg-6">



                                @if ($type == 0)

                                    <div>

                                        <figure class="highcharts-figure">



                                            <div id="container"></div>



                                        </figure>



                                    </div>

                                    {{-- @endif --}}

                                @else

                                    <div>

                                        <figure class="highcharts-figure">

                                            <div id="container"></div>



                                        </figure>

                                    </div>

                                @endif

                            </div>

                            <div class="col-lg-5">



                                <div>

                                    <figure class="highcharts-figure">

                                        <div id="container-pie"></div>



                                    </figure>

                                </div>

                            </div>

                            

                        </div>





                        <div style='page-break-after: always;'> </div>



                        {{-- TEMPLATES QUESTION AND RESPONSES  --}}



                        @foreach ($templatecoll as $tq)

                            <div class="mt-4">



                                <div

                                    style="background-color:{{ $color_code }};display: flex; justify-content: space-between; align-items: center;">



                                    <p class="p-1 mb-0 text-white">{{ $tq['tempName'] }}</p>



                                    <p style="margin-bottom: 0; margin-right: 20px; color: white;">



                                        {{-- <span style="margin-bottom: 0; margin-right: 20px; color: white;">{{ $tq['positive_responses'] }}/{{ count($tq['tempQues']) }}</span> --}}







                                        @php



                                            // $percen = ($tq['positive_responses']/(count($tq['tempQues'])*2))*100;



                                            // echo round($percen,2);



                                            // echo '%';

                                        @endphp



                                    </p>



                                </div>



                                <table style="border-collapse: collapse;width:100%;">



                                    <thead>







                                        <tr>



                                            <th

                                                style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;">



                                                #</th>



                                            <th

                                                style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;">



                                                Question</th>



                                            <th

                                                style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;">



                                                Score</th>



                                            <th

                                                style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;">



                                                Current Response</th>



                                            <th

                                                style="padding: 5px;border: 1px solid {{ $color_code }};text-align: left;font-size:14px;">



                                                Previous</th>







                                        </tr>



                                    </thead>



                                    <tbody>



                                        @foreach ($tq['tempQues'] as $index => $q)

                                            <tr class="templates-questions">



                                                <td>{{ $index + 1 }}</td>



                                                <td>



                                                    {{ $q->question }}



                                                    <p class="mt-2 text-danger">{!! $q->answewrs->objective_evidences !!}</p>







                                                    <p class="mt-2 " style="color: #009b00;">{!! $q->answewrs->suggestions !!}

                                                    </p>



                                                    @foreach ($q->images as $image)

                                                        <img style="max-width: 130px;"

                                                            src="{{ url('') }}/{{ $image }}"

                                                            alt="">

                                                    @endforeach



                                                </td>



                                                <td>



                                                    @if ($q->res->response_score == 'null')

                                                        1

                                                    @else

                                                        @php



                                                            $values = explode(',', $q->res->response_score);



                                                            if (count($values) == 1) {

                                                                echo $q->res->response_score;

                                                            } else {

                                                                echo array_sum($values);

                                                            }



                                                        @endphp

                                                    @endif



                                                </td>



                                                <td>{{ $q->resp_text->name }}</td>







                                                <td>



                                                    @if ($q->pr_resp_text !== null)

                                                        {{ $q->pr_resp_text }}

                                                    @endif

                                                </td>



                                            </tr>

                                        @endforeach



                                        {{-- <tr class="templates-questions">



                                        <td>2</td>



                                        <td>



                                            <p>Are the cleaning and sanitization protocols in place and satisfactory?</p>



                                            <p>The cleaning in the specified areas was unsatisfactory, as there was visible oil sedimentation near the rice steamers, water tap knobs in the production area, and the exhaust hood.</p>



                                            <p>As per the guidelines set by the Food Safety and Standards Authority of India (FSSAI), it is essential for all food establishments to prioritize hygiene and safety. To comply with FSSAI regulations, food businesses should ensure regular cleaning and sanitization of all food preparation and storage areas, including surfaces near cooking equipment, water tap knobs, and exhaust hoods. Additionally, proper disposal of oil and grease buildup should be carried out to prevent sedimentation. Adhering to these guidelines not only ensures compliance but also guarantees the delivery of safe and hygienic food products to consumers, safeguarding public health and enhancing the reputation of the establishment.</p>



                                        </td>



                                        <td>0</td>



                                        <td>No</td>



                                        <td></td>



                                    </tr> --}}



                                    </tbody>







                                </table>



                            </div>

                        @endforeach











                        <div style='page-break-after: always;'> </div>



                        {{-- DECLARATION  --}}



                        <div style="margin-top: 20px;    border: rgb(188, 188, 188) 1px solid;">



                            <div

                                style="padding: 5px;background-color:{{ $color_code }};color:white;text-align: left;display:block">



                                Declaration



                            </div>



                            <table style="border-collapse: collapse;width:100%">











                                <tr>



                                    <td style="height: 150px;width:20%"><img

                                            style="    width: 10rem; padding-left: 18px;"

                                            src="{{ url('') }}/{{ $audit->auditor_sign }}" alt="">

                                    </td>



                                    <td style="height: 150px;">



                                        {{ $auth_user->name }} ({{ $auth_user->designation }}) <br>



                                        <p style="font-size: 13px">@php



                                            $date = date('d/m/Y ', strtotime($audit->start));



                                            echo $date;



                                        @endphp {{ $start_time }}</p>



                                    </td>



                                    <td style="height: 150px;width:20%"><img

                                            style="    width: 10rem; padding-left: 18px;"

                                            src="{{ url('') }}/{{ $audit->auditee_sign }}" alt="">

                                    </td>



                                    <td style="height: 150px;">{{ $client->title }}. {{ $client->fname }}



                                        {{ $client->lname }} ({{ $client->designation }}) <br>



                                        <p style="font-size: 13px">{{ $audit->end }} {{ $audit->end_time }}</p>



                                    </td>







                                </tr>











                            </table>



                        </div>







                        {{-- FOOTER  --}}



                        <div style="text-align: center;margin-top:50px">



                            <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 106px"

                                alt="">



                            <p class="mb-2" style="font-size: 12px;">{{ env('COMPANY_ADDRESS') }}</p>



                            <p class="mb-2" style="font-size: 12px;"><span

                                    style="font-size: 12px;color:rgb(106, 106, 106)">Email -



                                </span><a href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>

                                <span style="font-size: 12px;color:rgb(106, 106, 106)">Website address -<a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a></span> <span

                                    style="font-size: 12px;color:rgb(106, 106, 106)"> Contact us @ </span><a

                                    href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a> </p>



                            <p style="font-size: 12px;color:rgb(106, 106, 106)"> © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>







                        </div>











                    </div>







                </div>



            </div>



        </div>



    </div>



















    <script src="{{ url('') }}/js/dist-jquery.min.js"></script>



    {{-- <script src="{{ url('') }}/js/js-bootstrap.bundle.min.js"></script> --}}



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"

        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">

    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"

        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">

    </script>



    <script src="{{ url('') }}/js/js-sidebarmenu.js"></script>



    <script src="{{ url('') }}/js/js-app.min.js"></script>



    {{-- Select box virtual  --}}



    <script src="{{ url('') }}/js/virtual-select.min.js"></script>







    {{-- <script src="{{ url('') }}/js/dist-apexcharts.min.js"></script> --}}



    {{-- <script src="{{ url('') }}/js/dist-simplebar.js"></script> --}}



    {{-- <script src="{{ url('') }}/js/js-dashboard.js"></script> --}}



    <script src="https://kit.fontawesome.com/5f579897f0.js" crossorigin="anonymous"></script>



    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}



    {{-- Toastr  --}}



    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



    {{-- multi select2  --}}



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>











    <script src="https://code.highcharts.com/highcharts.js"></script>



    <script src="https://code.highcharts.com/modules/exporting.js"></script>



    <script src="https://code.highcharts.com/modules/export-data.js"></script>



    <script src="https://code.highcharts.com/modules/accessibility.js"></script>







    <script>



        document.addEventListener('contextmenu', event => event.preventDefault());

        toastr.options = {



            "positionClass": "toast-top-right",



            "showDuration": "300",



            "hideDuration": "1000",



            "timeOut": "5000",



            "extendedTimeOut": "1000",



            "showEasing": "swing",



            "hideEasing": "linear",



            "showMethod": "fadeIn",



            "hideMethod": "fadeOut"



        }

    </script>







    <script>

        // Data retrieved from: https://www.uefa.com/uefachampionsleague/history/

        @if($type == 0)

        Highcharts.chart('container', {



            chart: {



                type: 'bar'



            },



            title: {



                text: 'SCORE BY SECTION'



            },



            xAxis: {



                categories: {!! json_encode($templatenames) !!}



            },



            yAxis: {



                min: 0,



                max: 100,







                title: {



                    text: 'Percentage'



                }



            },



            legend: {



                reversed: true



            },



            plotOptions: {



                series: {


                    pointWidth: 25,
                    stacking: 'normal',



                    dataLabels: {



                        enabled: true



                    }



                }



            },



            series: [{







                data: {!! json_encode($roundPercen) !!}



            }]



        });



        @else





        Highcharts.chart('container', {



            chart: {



                type: 'column'



            },



            title: {



                text: 'SCORE BY SECTION'



            },



            xAxis: {



                categories: {!! json_encode($templatenames) !!}



            },



            yAxis: {



                min: 0,



                max: 100,







                title: {



                    text: 'Percentage'



                }



            },



            legend: {



                reversed: true



            },



            plotOptions: {



                series: {



                    stacking: 'normal',



                    dataLabels: {



                        enabled: true



                    }



                }



            },



            series: [{







                data: {!! json_encode($roundPercen) !!}



            }]



        });



        @endif







       

        // var sdgsArr = <?php echo $sdgs; ?>;        

        // var pieChartData = [];        

        // var total = sdgsArr.length;

        // for (var i = 0; i < sdgsArr.length; i++) {

        //     var percentage = 100 / total;

        //     pieChartData.push({

        //         name: sdgsArr[i].name,

        //         // y: parseFloat(sdgsArr[i].value) // Ensure value is a number

        //         y : percentage

        //     });

        // }









        // new code 

        // Parse the JSON data from PHP

        var sdgsArr = <?php echo $sdgs; ?>;

        



        // Create an object to hold the aggregated data

        var aggregatedData = {};

        var countData = {};

        // Calculate the total value for aggregation

        for (var i = 0; i < sdgsArr.length; i++) {

            var name = sdgsArr[i].name;

            var color = sdgsArr[i].color;



            var value = parseFloat(sdgsArr[i].value);





            if (name in aggregatedData) {

                aggregatedData[name] += value;

                countData[name] += 1;

                // countData[color] = color;



            } else {

                aggregatedData[name] = value;

                countData[name] = 1;

                // countData[color] = color;



            }

        }



       




        // Calculate the total sum of all values

        var total = Object.values(countData).reduce((acc, value) => acc + value, 0);



        // Calculate the percentage values for the pie chart

        var pieChartData = [];



        for (var name in countData) {

            var percentage = (countData[name] / total) * 100;

            var color = countData[color];

            var color = sdgsArr.find(function (s) {

                return s.name === name;

            }).color;

            pieChartData.push({

                name: name + " (x" + countData[name] + ")",

                y: percentage,

                color: color 

            });

        }






        Highcharts.chart('container-pie', {

            chart: {

                plotBackgroundColor: null,

                plotBorderWidth: null,

                plotShadow: false,

                type: 'pie'

            },

            title: {

                text: 'SDG SCORE',

                align: 'left'

            },

            tooltip: {

                pointFormat: '<b>{point.percentage:.1f}%</b>'

            },

            accessibility: {

                point: {

                    valueSuffix: '%'

                }

            },

            plotOptions: {

                pie: {

                    allowPointSelect: true,

                    cursor: 'pointer',

                    dataLabels: {

                        enabled: true,

                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'

                    }

                }

            },

            series: [{

                name: '',

                colorByPoint: false,

                data: pieChartData

            }]

        });



    </script>







    @stack('js')



</body>







</html>

