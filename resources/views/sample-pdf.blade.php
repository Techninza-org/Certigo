<!doctype html>



<html lang="en">



<head>



  <meta charset="utf-8">



  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>



  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">







  <title>Training Report By CERTIGO QAS® Pvt Ltd</title>







  <style>



    .page-break {



        page-break-after: always;



    }



  </style>



</head>







<body>



    <div class="row" style="width: 595px;height:1123px">



        <div class="col-lg-12 d-flex align-items-strech" >



            <div class="card " style="width:700px;margin-top:5px">



                <div class="card-body">



                    <div class="mb-5" >



                        <h6 class="fs-6" style="text-align: center;margin-top:0px;">SAMPLE RECEIPT</h6>



                    </div>



                    <div>



                        {{-- <img src="{{ public_path('images/certigoqas-logo.jpeg') }}" style="width: 200px" alt=""> --}}

                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 200px" alt="">





                        <p style="font-size: 12px;">{{ env('COMPANY_ADDRESS') }}</p>



                    </div>







                    <div class="" >



                        {{-- <tr >



                            <td style="padding: 5px;border: 1px solid #dddddd;"></td> --}}







                            <p style="padding: 5px;border: 1px solid #dddddd;text-align: right;font-size:13px;"><strong>Generated date:</strong>{{ $todayDate }} {{ $todayTime }}</p>



                           



                        {{-- </tr>  --}}



                        <table style="border-collapse: collapse;width:100%">



                           



                            <tr >



                              <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;text-transform:uppercase;font-weight:600;font-family:-webkit-body;font-size:12px">CLIENT NAME</th>



                              <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $client->organisation_name }}</td>



                             



                            </tr> 



                            <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">MOBILE NUMBER</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $client->comp_cont_no }}</td>



                               



                              </tr> 



                                <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">CLIENT REPRESENTATIVE NAME</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $client->title }}. {{ $client->fname }} {{ $client->lname }}</td>



                               



                              </tr> 



                                <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">DESIGNATION</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $client->designation }}</td>



                               



                              </tr>  



                               <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">DURATION</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">



                                  @php



                                  $s_date = date('d/m/Y  H:i a', strtotime($sample->date));



                                  $c_date = date('d/m/Y  H:i a', strtotime($sample->completed_date));



                                  @endphp



                                  {{ $s_date }} to {{ $c_date }}</td>



                               



                              </tr>   



                                 <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">GEOLOCATION</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->location }}</td>



                               



                              </tr>          



                        </table>  



                        



                        <div class="mt-3" style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">



                          General Information



                        </div>



                        <table style="border-collapse: collapse;width:100%;">



                            



                            <tr >



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



                                    @if($sample->type == 1)



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



                                   @foreach($param as $p)



                                        <span >{{ $p->name }}



                                        @if($p !== end($param))



                                            ,



                                        @endif



                                        </span>







                                    @endforeach







                                </td>



                               



                              </tr> 



                            <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">START DATE</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">@php



                                  $s_date = date('d/m/Y  H:i a', strtotime($sample->date));



                                 



                                  @endphp



                                  {{ $s_date }}</td>



                               



                              </tr> 



                                <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">COMPLETED DATE</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">@php



                                 



                                  $c_date = date('d/m/Y  H:i a', strtotime($sample->completed_date));



                                  @endphp



                                   {{ $c_date }}</td>



                               



                              </tr> 



                              <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">CLIENT</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $client->title }}. {{ $client->fname }} {{ $client->lname }} ({{ $client->designation }})</td>



                               



                              </tr> 



                              <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">LOCATION</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ $sample->location }}</td>



                               



                              </tr> 



                              



                                <tr >



                                <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:12px">SERVICE DONE BY</th>



                                <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;font-size:12px">{{ \Auth::user()->name }}</td>



                               



                              </tr>  



                               



                                        



                        </table>



                    </div>









                    @if($images !== null)

                    <div style="margin-top: 30px">







                      



                      <div style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">



                        Sample Evidences



                      </div>



                        <table style="border-collapse: collapse;width:100%">



                            



                          <tr >



                            @foreach($images as $img)



                              



                              <td style="padding: 5px;border: 1px solid #dddddd;text-align: center;"> <img src="{{ url('') }}/{{ $img }}" alt="" style="width: 100px;display:inline-block"></td>



                            



                              @endforeach      



                          </tr>                             



                      </table> 



                            



                    </div>



                    @endif



                    <div class="page-break"></div>





                    @if($points !== null)



                    <div class="pb-3 mt-3" style=" border: rgb(188, 188, 188) 1px solid;">



                      <div class="mb-2" style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">



                        Sample Key Points



                      </div>



                      



                      @foreach($points as $key => $p)



                      @php



                      $keyy = $key+1;



                      @endphp



                      



                      <p class=" ms-2 mb-0">{{ $keyy }}. {{ $p }}</p>



                      @endforeach



                      



                    </div>



                    @endif





                    <div style="margin-top: 20px;    border: rgb(188, 188, 188) 1px solid;">



                        <div style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">



                            Declaration



                        </div>



                        <table style="border-collapse: collapse;width:100%">



                            



                            



                            <tr >



                                <td style="height: 150px;width:20%"> <img src="{{ url('') }}/{{ $sample_by_sign }}" alt="" style="width: 8rem"></td>



                                <td style="height: 150px;width:30%">{{ \Auth::user()->title }} {{ \Auth::user()->name }} (Micro-biologist/ Lab-Representative) <br><p style="font-size: 13px">

                                @php



                                  $s_date = date('d/m/Y  H:i a', strtotime($sample->date));



                                  $c_date = date('d/m/Y  H:i a', strtotime($sample->completed_date));



                                  @endphp</p>

                                  {{ $c_date }}

                                </td>



                                <td style="height: 150px;width:20%"><img src="{{ url('') }}/{{ $sample_to_sign }}" alt="" style="width: 8rem"></td>



                                <td style="height: 150px;width:30%">{{ $client->title }} {{ $client->fname }} {{ $client->lname }} ({{ $client->designation }}) <br><p style="font-size: 13px"> @php



                                  $s_date = date('d/m/Y  H:i a', strtotime($sample->date));



                                  $c_date = date('d/m/Y  H:i a', strtotime($sample->completed_date));



                                  @endphp</p>

                                  {{ $c_date }}</p></td>







                            </tr>  



                               



                                        



                        </table>



                    </div>







                    <div style="text-align: center;margin-top:50px">



                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px" alt="">



                        <p style="font-size: 13px;">{{ env('COMPANY_ADDRESS') }}</p>



                        <p style="font-size: 12px;">
                          <span style="font-size: 12px;color:rgb(106, 106, 106)">Email - </span>
                          <a href="mailto:admin@certigoqas.com">admin@certigoqas.com</a> 
                          <span style="font-size: 12px;color:rgb(106, 106, 106)">Website address -</span>
                          <a  href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a> 
                          <span style="font-size: 12px;color:rgb(106, 106, 106)"> Contact us @ </span>
                          <a href="tel:+918074937006">+91 8074937006</a> 
                        </p>



                        <p style="font-size: 12px;color:rgb(106, 106, 106)">{{ env('COMPANY_COPYRIGHT') }}</p>







                    </div>







                    



                </div>



            </div>



        </div>



    </div>











<script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js" integrity="sha512-v/wOVTkoU7mXEJC3hXnw9AA6v32qzpknvuUF6J2Lbkasxaxn2nYcl+HGB7fr/kChGfCqubVr1n2sq1UFu3Gh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>











</body>







</html>











