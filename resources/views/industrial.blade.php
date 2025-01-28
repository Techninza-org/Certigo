<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Certigo QAS</title>
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
    {{-- 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            color: black;
        }

        .orange-color {
            background-color: {{ $color_code_ind }};
        }

        .border {
            border: 0.5px solid #3e3e3e !important;
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
            border: 1px solid {{ $color_code_ind }};
            padding-left: 5px;
        }

        .templates-questions td {
            vertical-align: text-top;
            border: 1px solid {{ $color_code_ind }};
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
            /* max-width: 800px; */
            margin: 1em auto;
        }

        #container {
            height: auto;
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

        .highcharts-credits {
            display: none;
        }
    </style>
    @stack('css')
</head>

<body>
    <div class="page-wrapper" id="contentToSave" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ env('APP_URL') }}/storage/clients-logo/{{ $client->client_logo }}"
                                style="width: 100px" alt="">
                            <div class="ms-3  text-center">
                                <strong class=""style="margin-top:0px;font-size:14px">{{ $audit->audit_name }} FOR
                                    {{ $client->organisation_name }}</strong>
                                <p>{{ $templatecoll[0]['temp_folder'] }} </p>
                            </div>
                        </div>
                        {{-- Audit Details  --}}
                        <div class="">
                            {{-- 
                  <p
                     style="    font-size: 15px; margin-bottom: 0px;padding: 7px;background-color: {{ $color_code_ind }};margin-top: 10px;color: white;">
                     1. Audit Details
                  </p>
                  --}}
                            <table style="border-collapse: collapse;width:100%;">
                                <thead>
                                    <tr>
                                        <th colspan="6"
                                            style="    font-size: 15px; margin-bottom: 0px;padding: 7px;background-color: {{ $color_code_ind }};margin-top: 10px;color: white;">
                                            1. Inspection Details
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px;   width: 300px;">
                                            Service Code
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                            {{ $audit->audit_index }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Name of the Inspection
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $audit->audit_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Inspected Company
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->organisation_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Place of the site
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->organisation_location }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Name of the consultant
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $auditor->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Designation
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $auditor->designation }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Consulting Organization
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ env('COMPANY_SHORT_NAME') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Name of the Company Representative along with consultant during site visit
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->title }}. {{ $client->fname }} {{ $client->lname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Designation of the Company Representative
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="5"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->designation }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Date of the Inspection
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            @php
                                                $date = date('d/m/Y ', strtotime($audit->start));
                                                echo $date;
                                            @endphp
                                        </td>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Date completed
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $audit->end }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Time started
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $start_time }}
                                        </td>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Time Ended
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $audit->end_time }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid #588377;text-align: left;;font-size:14px">
                                            Score
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td style="padding: 5px;border: 1px solid #588377;text-align: left;">
                                            @php
                                                $percent = ($actual_responses / $target_responses) * 100;
                                                echo round($percent, 2);
                                            @endphp
                                            %
                                            {{-- <strong style="margin-left:117px;margin-right: 31px;">Actual / Target  </strong> <span> : </span><span style="margin-left:10px">
                              {{$total_positive_responses}} / 
                              @php
                              echo array_sum($total_qu_count);
                              @endphp
                              </span> --}}
                                        </td>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid #588377;text-align: left;;font-size:14px">
                                            Actual / Target
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td style="padding: 5px;border: 1px solid #588377;text-align: left;">
                                            {{ $actual_responses }} / {{ $target_responses }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Result
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            @php
                                                $percent = ($actual_responses / $target_responses) * 100;
                                                $finalPer = round($percent, 2);
                                                if ($finalPer < 85) {
                                                    echo "
                              <p style='margin-bottom: 0;font-weight: 700;color: orange;'>Non-Compliance</p>
                              ";
                                                } else {
                                                    echo "
                              <p style='margin-bottom: 0;font-weight: 700;color: green;'>Compliance</p>
                              ";
                                                }
                                            @endphp
                                            {{-- <strong style="margin-left:68px;margin-right: 68px;">Sections </strong> <span> : </span><span style="margin-left:10px">{{ $sectionCount }}</span> --}}
                                        </td>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Sections
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $sectionCount }}
                                        </td>
                                    </tr>
                                    {{-- 
                        <tr>
                           <th scope="row"
                              style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                              Inspection status
                           </th>
                           <td class="td-seperator">:</td>
                           <td scope="row" style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                              Istatus
                           </td>
                           <th scope="row"
                              style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                              Information obtained
                           </th>
                           <td class="td-seperator">:</td>
                           <td scope="row" style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                              Iobtain
                           </td>
                        </tr>
                        --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- Company and Contact details  --}}
                        <div class="mt-3">
                            {{-- 
                  <p
                     style="    font-size: 15px; margin-bottom: 0px;padding: 7px;background-color: {{ $color_code_ind }};margin-top: 10px;color: white;">
                     2. Company and Contact details:
                  </p>
                  --}}
                            <table style="border-collapse: collapse;width:100%;">
                                <thead>
                                    <tr>
                                        <th colspan="6"
                                            style="    font-size: 15px;
                              margin-bottom: 0px;
                              padding: 7px;
                              background-color: {{ $color_code_ind }};
                              margin-top: 10px;
                              color: white;">
                                            2. Company and Contact details:
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Name of the Company
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="4"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->organisation_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Address
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td colspan="4"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->organisation_location }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Telephone No.
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->comp_cont_no }}
                                        </td>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Pin Code
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->pincode }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Email Id
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->company_emailid }}
                                        </td>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Website
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->company_website }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Director / CEO / Partner
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->director }}
                                        </td>
                                        <th scope=""
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Email
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->director_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                        </th>
                                        <td class="td-seperator"></td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                        </td>
                                        <th scope=""
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Mobile
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->director_mobile }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Food Safety Team Leader / MR
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->fstl }}
                                        </td>
                                        <th scope=""
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Email
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->food_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                        </th>
                                        <td class="td-seperator"></td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                        </td>
                                        <th scope=""
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px">
                                            Mobile
                                        </th>
                                        <td class="td-seperator">:</td>
                                        <td
                                            style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                            {{ $client->food_mobile }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
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
                            <div class="col-lg-12">
                                <div>
                                    <figure class="highcharts-figure">
                                        <div id="container-pie"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        {{-- Template question new  --}}
                        {{-- Audit Details  --}}
                        @foreach ($templatecoll as $tq)
                            @foreach ($tq['tempQues'] as $index => $q)
                                <div class="mt-5">
                                    <table style="border-collapse: collapse;width:100%;">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody style="    border: 1px solid black;">
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Ref Standard
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    {{ $tq['temp_folder'] }}
                                                </td>
                                                {{-- 
                           <th class="text-white orange-color"  colspan="5" style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                              Inspection Evidence 
                           </th>
                           --}}
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 250px;">
                                                    Clause Name
                                                </th>
                                                <td scope="row"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    {{ $tq['tempName'] }}
                                                </td>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 260px;">
                                                    Clause No.
                                                </th>
                                                <td scope="row"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    {{ $q->qName->question_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Requirement
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p>{{ $q->question }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Inspection Observation
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p style="color: red;">{{ $q->answewrs->objective_evidences }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Observation Area
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p>{{ $tq['tempName'] }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Suggestions
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p style="color: green;">{!! $q->answewrs->suggestions !!} </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 250px;">
                                                    Response
                                                </th>
                                                {{-- 
                           <td class="td-seperator"></td>
                           --}}
                                                <td scope="row"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                                    <p class=" ms-2 ">{{ $q->resp_text->name }} </p>
                                                </td>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;;font-size:14px;    width: 260px;">
                                                    Score
                                                </th>
                                                {{-- 
                           <td class="td-seperator"></td>
                           --}}
                                                <td scope="row"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left;">
                                                    <p class="ms-2 " style="font-size: 15px">
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
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Doc Ref
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p>{{ $q->answewrs->doc_ref }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Timeline to complete
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p>
                                                        @php
                                                            if ($q->answewrs->timeline != null) {
                                                                $date = date(
                                                                    'F j, Y  H:i A',
                                                                    strtotime($q->answewrs->timeline),
                                                                );
                                                                echo $date;
                                                            }
                                                        @endphp
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Personal Responsible
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <p>{{ $q->answewrs->person_responsible }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-white orange-color" scope="row"
                                                    style="padding: 5px;border: 1px solid #000000;text-align: left;;font-size:14px;   width: 300px;">
                                                    Evidences
                                                </th>
                                                <td colspan="5"
                                                    style="padding: 5px;border: 1px solid {{ $color_code_ind }};text-align: left; ">
                                                    <div class="col-md-3  d-flex">
                                                        @foreach ($q->images as $image)
                                                            <img class="mt-2" style="max-width: 125px;"
                                                                src="{{ url('') }}/{{ $image }}"
                                                                alt="">
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endforeach
                        <div style='page-break-after: always;'> </div>
                        {{-- DECLARATION  --}}
                        <div style="margin-top: 20px;    border: rgb(188, 188, 188) 1px solid;">
                            <div
                                style="padding: 5px;background-color:{{ $color_code_ind }};color:white;text-align: left;display:block">
                                Declaration
                            </div>
                            <table style="border-collapse: collapse;width:100%">
                                <tr>
                                    <td style="height: 150px;width:20%"><img
                                            style="    width: 13rem; padding-left: 18px;"
                                            src="{{ url('') }}/{{ $audit->auditor_sign }}" alt="">
                                    </td>
                                    <td style="height: 150px;">
                                        {{ $auth_user->name }} ({{ $auth_user->designation }}) <br>
                                        <p style="font-size: 13px">{{ $audit->end }} {{ $audit->end_time }}</p>
                                    </td>
                                    <td style="height: 150px;width:20%"><img
                                            style="    width: 13rem; padding-left: 18px;"
                                            src="{{ url('') }}/{{ $audit->auditee_sign }}" alt="">
                                    </td>
                                    <td style="height: 150px;">
                                        {{ $client->title }}. {{ $client->fname }}
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
                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a></span>
                                <span style="font-size: 12px;color:rgb(106, 106, 106)"> Contact us @ </span><a
                                    href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a>
                            </p>
                            <p style="font-size: 12px;color:rgb(106, 106, 106)"> © Copyright
                                {{ $currentYear = date('Y') }} CERTIGO QAS® PRIVATE LIMITED
                            </p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>
        window.onload = function() {
            setTimeout(function() {
                const element = document.getElementById('contentToSave');

                const options = {
                    margin: 10,
                    filename: 'rendered_page.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                html2pdf()
                    .from(element)
                    .set(options)
                    .toPdf()
                    .get('pdf')
                    .then(function(pdf) {
                        const pdfBlob = pdf.output('blob'); // Get the PDF as a Blob
                        const formData = new FormData();
                        formData.append('report_pdf', pdfBlob, 'audit-report.pdf'); // Append Blob as a file

                        // Get the CSRF token
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content');

                        const id = {{ $audit->id }};
                        console.log(id, 'id');

                        formData.append('_token', csrfToken);
                        formData.append('audit_id', id);

                        fetch('/certigo/audit-report-savepdf', {
                                method: 'POST',
                                body: formData,

                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Success:', data); 
                            })
                            .catch(error => {
                                console.error('Error:', error); 
                            });
                    });
            }, 2000);
        };
    </script>





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

        @if ($type == 0)

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

                        pointWidth: 12,


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

                        pointWidth: 12,


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



            // if (name in aggregatedData) {

            //     aggregatedData[name] += value;

            // } else {

            //     aggregatedData[name] = value;

            // }



            if (name in aggregatedData) {

                aggregatedData[name] += value;

                countData[name] += 1;

            } else {

                aggregatedData[name] = value;

                countData[name] = 1;

            }

        }









        // Calculate the total sum of all values

        var total = Object.values(countData).reduce((acc, value) => acc + value, 0);



        // Calculate the percentage values for the pie chart

        var pieChartData = [];



        for (var name in countData) {

            var percentage = (countData[name] / total) * 100;

            var color = sdgsArr.find(function(s) {

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
