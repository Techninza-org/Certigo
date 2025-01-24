<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"
    integrity="sha512-v/wOVTkoU7mXEJC3hXnw9AA6v32qzpknvuUF6J2Lbkasxaxn2nYcl+HGB7fr/kChGfCqubVr1n2sq1UFu3Gh1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="row" style="width: 700px;height:1123px;margin-top:0px;padding-top:0px;">

    <div class="col-lg-12 d-flex align-items-strech">

        <div class=" " style="width:700px;">

            <div class="">



                <div>

                    <img src="{{ public_path('images/certigoqas-logo.jpeg') }}" style="width: 200px" alt="">

                    {{-- <p style="font-size: 12px;">Sector 12, MVP Colony <br> Visakhapatnam, Andhra Pradesh, India</p> --}}

                </div>

                <div class="mb-2 text-center">

                    <strong class=""
                        style="text-align: center;margin-top:0px;font-size:10px">{{ $audit->audit_name }} For
                        {{ $client->organisation_name }}</strong>

                </div>



                <div class="">



                    <p
                        style="font-size: 13px;text-decoration:underline;margin-bottom:0px; padding-bottom:0px;margin-top:10px">
                        Audit Details</p>

                    <table style="border-collapse: collapse;width:100%;">



                        {{-- <tr >

                              <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">NAME OF THE SAMPLE</th>

                              <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->name }}</td>

                             

                            </tr> 

                            <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">WEIGHT</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->weight }}</td>

                               

                            </tr> 

                            <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">TEMPERATURE COLLECTED AT (°C)</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->temperature }}</td>

                               

                            </tr> 

                            <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">QUANTITY</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->quantity }}</td>

                               

                            </tr> 

                            <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">SAMPLE TYPE</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">

                                    @if ($sample->type == 1)

                                    Food 

                                    @elseif($sample->type == 2)

                                    Water

                                    @else

                                    Swad 

                                    @endif

                                </td>

                               

                              </tr> 

                              <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">PARAMETERS</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">

                                   @foreach ($param as $p)

                                        <span >{{ $p->name }}

                                        @if ($p !== end($param))

                                            ,

                                        @endif

                                        </span>



                                    @endforeach



                                </td>

                               

                              </tr> 

                            <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">START DATE</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->date }}</td>

                               

                              </tr> 

                                <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">COMPLETED DATE</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px"></td>

                               

                              </tr> 

                              <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">CLIENT</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $client->title }}. {{ $client->fname }} {{ $client->lname }} ({{ $client->designation }})</td>

                               

                              </tr> 

                              <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">LOCATION</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->location }}</td>

                               

                              </tr>  --}}



                        <tr>

                            <th
                                style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">
                                SERVICE DONE BY</th>

                            <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">
                                {{ \Auth::user()->name }}</td>



                        </tr>





                    </table>

                    {{-- <tr >

                            <td style="padding: 5px;border: 1px solid #dddddd;"></td> --}}



                    <p style="padding: 5px;border: 1px solid #dddddd;text-align: right;font-size:13px;">
                        <strong>Generated date:</strong>{{ $todayDate }} {{ $todayTime }}</p>



                    {{-- </tr>  --}}

                    <table style="border-collapse: collapse;width:100%">



                        <tr>

                            <th
                                style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;text-transform:uppercase;font-weight:600;font-family:-webkit-body;font-size:12px">
                                CLIENT NAME</th>

                            <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">
                                {{ $client->organisation_name }}</td>



                        </tr>

                        <tr>

                            <th
                                style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">
                                MOBILE NUMBER</th>

                            <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px"></td>



                        </tr>

                        <tr>

                            <th
                                style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">
                                CLIENT REPRESENTATIVE NAME</th>

                            <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">
                                {{ $client->title }}. {{ $client->fname }} {{ $client->lname }}</td>



                        </tr>

                        <tr>

                            <th
                                style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">
                                DESIGNATION</th>

                            <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">
                                {{ $client->designation }}</td>



                        </tr>

                        <tr>

                            <th
                                style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">
                                DURATION</th>

                            {{-- <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">

                                    @php

                                    $date = date('F j, Y  H:i A', strtotime($sample->date));

                                    @endphp

                                    {{ $date }}</td> --}}



                            {{-- </tr>   

                                 <tr >

                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">GEOLOCATION</th>

                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->location }}</td>

                               

                              </tr>           --}}

                    </table>





                </div>





                <div style="margin-top: 20px;    border: rgb(188, 188, 188) 1px solid;">

                    <div style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">

                        Declaration

                    </div>

                    <table style="border-collapse: collapse;width:100%">





                        <tr>

                            <td style="height: 150px;width:20%"></td>

                            <td style="height: 150px;width:30%">{{ \Auth::user()->title }}. {{ \Auth::user()->name }}
                                (Micro-biologist/ Lab-Representative) <br>
                                <p style="font-size: 13px">{{ $todayDate }} {{ $todayTime }}</p>
                            </td>

                            <td style="height: 150px;width:20%"></td>

                            <td style="height: 150px;width:30%">{{ $client->title }}. {{ $client->fname }}
                                {{ $client->lname }} ({{ $client->designation }}) <br>
                                <p style="font-size: 13px">{{ $todayDate }} {{ $todayTime }}</p>
                            </td>



                        </tr>





                    </table>

                </div>



                <div style="text-align: center;margin-top:50px">

                    <img src="{{ public_path('images/certigoqas-logo.jpeg') }}" style="width: 100px" alt="">

                    <p style="font-size: 13px;">Sector 12, MVP Colony, Visakhapatnam, Andhra Pradesh, India</p>

                    <p style="font-size: 12px;"><span style="font-size: 12px;color:rgb(106, 106, 106)">Email - </span><a
                            href="mailto:admin@certigoqas.com">admin@certigoqas.com</a> <span
                            style="font-size: 12px;color:rgb(106, 106, 106)">Website address -</span> <span
                            style="font-size: 12px;color:rgb(106, 106, 106)"> Contact us @ </span><a
                            href="tel:+918074937006">+91 8074937006</a> </p>

                    <p style="font-size: 12px;color:rgb(106, 106, 106)">© Copyright 2023 Certigo Quality Assurance</p>



                </div>





            </div>

        </div>

    </div>

</div>
