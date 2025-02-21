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

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {}

        #container {

            height: 400px;

        }

        #container2 {

            height: 400px;

        }



        .highcharts-figure,

        .highcharts-data-table table {

            min-width: 310px;

            max-width: 800px;

            margin: 1em auto;

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



        .questions-row .box {

            background-color: blue;

            color: white;

        }
    </style>



    @stack('css')

</head>



<body>

    <!--  Body Wrapper -->

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->

        <div class="container mt-3">



            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-12">



                    <h3 class="text-center mt-5">CONSOLIDATED REPORT FOR “{{ $client->organisation_name }}” </h3>



                    <div class="row">

                        <div class="col-lg-6">

                            <figure class="highcharts-figure">

                                <div id="container"></div>



                            </figure>

                        </div>



                        <div class="col-lg-6">

                            <figure class="highcharts-figure">

                                <div id="container2"></div>



                            </figure>

                        </div>

                    </div>

                    <div class="d-flex text-center">

                        <p style="width: 50px;height:20px;">NC</p>



                        <p style="width: 55px;height:20px;background-color:red">Critical</p>

                        <p style="width: 55px;height:20px;background-color:#ffc900">Major</p>

                        <p style="width: 55px;height:20px;background-color:yellow">Minor</p>



                    </div>



                    <table style="border-collapse: collapse;width:100%;">

                        <thead>



                            <tr>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Sr No.</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Area/Location</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Observation</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Suggestion</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    NC</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Status</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Opening timeline</th>

                                <th
                                    style="padding: 5px;border: 1px solid #000000;text-align: left;font-size:13px;background-color:blue;color:white;">
                                    Closure time line</th>







                            </tr>

                        </thead>

                        <tbody>





                            @foreach ($negAnsArr as $one)
                                @foreach ($one as $key => $onee)
                                    <tr class="templates-questions">

                                        <td style="border: 1px solid #0c0c0c;font-size:13px">{{ $key += 1 }}</td>

                                        <td style="border: 1px solid #0c0c0c;font-size:13px">
                                            <p> {{ $onee->temname }}</p>
                                        </td>

                                        <td style="border: 1px solid #0c0c0c;font-size:12px">
                                            <p class="p-2">{!! $onee->objective_evidences !!}</p>

                                        </td>

                                        <td style="border: 1px solid #0c0c0c;font-size:12px;padding:5px;">
                                            <p >{!!$onee->suggestions !!}</p>
                                        </td>

                                        <td
                                            style="border: 1px solid #0c0c0c;font-size:13px;@if ($onee->nc == 0) background-color:yellow;@elseif($onee->nc == 1) background-color:#ffc900; @else background-color:red; @endif">
                                        </td>

                                        <td style="border: 1px solid #0c0c0c;font-size:11px;padding:5px;">Pending</td>

                                        <td style="border: 1px solid #0c0c0c;font-size:11px;padding:5px;">
                                            @foreach($onee->datess as $dt)
                                                @foreach($dt as $index=>$d)
                                                    {{-- {{ $d }} --}}
                                                    {{ \Carbon\Carbon::parse($d)->format('d-m-Y') }}
                                                @endforeach
                                            @endforeach
                                           

                                        </td>

                                        <td style="border: 1px solid #0c0c0c;font-size:11px;padding:5px;">Not Closed</td>

                                    </tr>
                                @endforeach
                            @endforeach





                        </tbody>



                    </table>

                </div>

            </div>

        </div>

    </div>



    {{-- FOOTER  --}}

    <div style="text-align: center;margin-top:50px">

        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 106px" alt="">

        <p class="mb-2" style="font-size: 12px;">{{ env('COMPANY_ADDRESS') }}</p>

        <p class="mb-2" style="font-size: 12px;"><span style="font-size: 12px;color:rgb(106, 106, 106)">Email -

            </span><a href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a> <span
                style="font-size: 12px;color:rgb(106, 106, 106)">Website address -<a

                href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a></span> <span style="font-size: 12px;color:rgb(106, 106, 106)"> Contact us
                @ </span><a href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a> </p>

        <p style="font-size: 12px;color:rgb(106, 106, 106)"> © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>



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
        document.addEventListener('keydown', function(event) {
            if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'p') {
                event.preventDefault();
            } else if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 's') {
                event.preventDefault();
            } else if (event.key === 'S' && event.shiftKey && event.metaKey) {
                event.preventDefault();
            } else if (event.code === 'PrintScreen') {
                event.preventDefault();
            }
        });
        
        let data = JSON.parse({!! json_encode($formattedData) !!});


        Highcharts.chart('container', {

            chart: {

                type: 'column'

            },

            title: {

                text: 'Overall Score'

            },

            subtitle: {

                text: ''

            },

            xAxis: {

                type: 'category',

                labels: {

                    rotation: -45,

                    style: {

                        fontSize: '13px',

                        fontFamily: 'Verdana, sans-serif'

                    }

                }

            },

            yAxis: {

                min: 0,

                title: {

                    text: 'Avg. Score (%)'

                }

            },

            legend: {

                enabled: false

            },

            tooltip: {

                pointFormat: 'Avg. % score : <b>{point.y:.1f} %</b>'

            },

            series: [{

                name: 'Population',

                colors: [

                    '#9b20d9', '#9215ac', '#861ec9'

                ],

                colorByPoint: true,

                groupPadding: 0,

                data: data





                    ,

                dataLabels: {

                    enabled: true,

                    rotation: -90,

                    color: '#FFFFFF',

                    align: 'right',

                    format: '{point.y:.1f}', // one decimal

                    y: 10, // 10 pixels down from the top

                    style: {

                        fontSize: '13px',

                        fontFamily: 'Verdana, sans-serif'

                    }

                }

            }]

        });
    </script>



    <script>
        // Data retrieved from: https://www.uefa.com/uefachampionsleague/history/

        Highcharts.chart('container2', {

            chart: {

                type: 'bar'

            },

            title: {

                text: 'Department Score'

            },

            xAxis: {

                categories: {!! json_encode($nameValuesArray) !!}

            },

            yAxis: {

                min: 0,

                title: {

                    text: 'Avg. (%) Score'

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



                data: {!! json_encode($avgValuesArray) !!}

            }]

        });
    </script>

    @stack('js')

</body>



</html>
