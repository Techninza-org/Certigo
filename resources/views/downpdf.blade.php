<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <div class="row" style="width: 700px;height:1123px">
        <div class="col-lg-12 d-flex align-items-strech justify-content-center">
            <div class="card " style="width:700px;margin-top:5px">
                <div class="card-body">
                    <div class="mb-5">
                        <h5 class="" style="text-align: center;margin-top:0px;">TRAINING ATTENDEES SHEET</h5>
                    </div>

                    <div>
                        {{-- <img src="{{ public_path('images/certigoqas-logo.jpeg') }}" style="width: 200px" alt=""> --}}
                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 200px" alt="">
                        {{-- <p style="font-size: 12px;">{{ env('COMPANY_ADDRESS') }}</p> --}}
                    </div>

                    <div style="display:grid;">
                      <div class="">
                          {{-- <tr >
                            <td style="padding: 5px;border: 1px solid #dddddd;"></td> --}}
                          <p style="padding: 5px;border: 1px solid #dddddd;text-align: right;font-size:13px;">
                              <strong>Generated date:</strong>{{ $todayDate }} {{ $todayTime }}
                          </p>
                      </div>
                      {{-- </tr>  --}}
                      <section style="margin-bottom:20px;">
                          <table style="border-collapse: collapse;width:100%">
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;text-transform:uppercase;font-weight:600;font-family:-webkit-body;font-size:14px">
                                      CLIENT NAME</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ $client->organisation_name }}</td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      MOBILE NUMBER</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ $client->comp_cont_no }}</td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      CLIENT REPRESENTATIVE NAME</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ $client->title }}. {{ $client->fname }} {{ $client->lname }}</td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      DESIGNATION</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ $client->designation }}</td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      DURATION</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      @php
                                          $s_date = date('d/m/Y  H:i a', strtotime($training->audit_start_date));
                                          $c_date = date('d/m/Y  H:i a', strtotime($training->completed_at));
                                      @endphp
                                       {{ $s_date }} to {{ $c_date }} </td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      GEOLOCATION</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ $training->location }}</td>
                              </tr>
                          </table>
                      </section>
                      <section style="margin-bottom:20px;">
                          <div class="mt-3"
                              style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">
                              General Information
                          </div>
                          <table style="border-collapse: collapse;width:100%">
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      TRAINING TOPIC</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ $training->topic }}</td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      START DATE</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                    @php
                                      $s_date = date('d/m/Y  H:i a', strtotime($training->audit_start_date));
                                      @endphp
                                      {{ $s_date }}
                                    
                                    </td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      COMPLETED DATE</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                    @php
                                    $c_date = date('d/m/Y  H:i a', strtotime($training->completed_at));
                                @endphp
                                {{ $c_date }}
                                      
                                    </td>
                              </tr>
                              <tr>
                                  <th
                                      style="padding: 5px;border: 1px solid #dddddd;text-align: left;width:50%;font-size:14px">
                                      NAME OF THE TRAINER</th>
                                  <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                      {{ \Auth::user()->name }}</td>
                              </tr>
                          </table>
                      </section>
                      <section style="margin-bottom:20px;">
                          <div class="mt-3"
                              style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">
                              Attendee List
                          </div>
                          <table style="border-collapse: collapse;width:100%">
                              <tr>
                                  <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;">#</th>
                                  <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;">Name</th>
                                  <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;">Email</th>
                                  <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;">Designation
                                  </th>
                                  <th style="padding: 5px;border: 1px solid #dddddd;text-align: left;">Mobile Number
                                  </th>
                              </tr>
                              @foreach ($atendis as $key => $atnd)
                                  <tr>
                                      <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                          {{ $key + 1 }}</td>
                                      <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                          {{ $atnd->fname }} {{ $atnd->lname }}</td>
                                      <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                          {{ $atnd->email }}</td>
                                      <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                          {{ $atnd->designation }}</td>
                                      <td style="padding: 5px;border: 1px solid #dddddd;text-align: left;">
                                          {{ $atnd->contact }}</td>
                                  </tr>
                              @endforeach
                          </table>
                      </section>
                      {{-- <div class="page-break"></div> --}}
                      {{-- <div style="display: flex">
                          @foreach ($images as $img)
                            <div class="" style="display: flex">
                              <img src="{{ $img }}" alt="" style="width: 100px;display:inline-block">
                            </div>
                          @endforeach
                        </div> --}}
                      <section style="margin-bottom:20px;margin-top:20px;">
                          <div style="margin-top: 30px">
                            @if ($images != null )
                                  <div  style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">
                                      Training Evidences
                                  </div>
                                  <table style="border-collapse: collapse;width:100%">
                                      <tr>
                                          @foreach ($images as $img)
                                              <td style="padding: 5px;border: 1px solid #dddddd;text-align: center;">
                                                  <img src="{{ url("") }}/{{ $img }}" alt=""
                                                      style="width: 100px;display:inline-block">
                                              </td>
                                          @endforeach
                                      </tr>
                                  </table>
                              
                            @endif
                          </div>
                      </section>
                      <section style="margin-bottom:20px;margin-top:20px;">
                          <div class="pb-3 mt-3" style=" border: rgb(188, 188, 188) 1px solid;">
                              <div class="mb-2"
                                  style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">
                                  Training Key Points
                              </div>
                              @if ($points !== null)
                                  @foreach ($points as $key => $p)
                                      @php
                                          $keyy = $key + 1;
                                      @endphp
                                      <p class=" ms-2 mb-0">{{ $keyy }}. {{ $p }}</p>
                                  @endforeach
                              @endif
                          </div>
                      </section>
                       <div class="page-break"></div>
                      <div style="margin-top: 20px;    border: rgb(188, 188, 188) 1px solid;">
                          <div style="padding: 5px;background-color:rgb(199, 199, 199);text-align: left;display:block">
                              Declaration
                          </div>
                          <table style="border-collapse: collapse;width:100%">
                              <tr>
                                  <td style="height: 150px;width:20%">
                                      {{-- <img src="{{ public_path().'/storage/signatures/'. $trainerSign }}" alt="" style="width: 8rem"> --}}
                                      <img src="{{ url('') }}/{{ $trainerSign }}" alt=""
                                          style="width: 8rem">
                                  </td>
                                  <td style="height: 150px;width:30%">{{ \Auth::user()->title }}
                                      {{ \Auth::user()->name }} (Trainer) <br>
                                      <p style="font-size: 13px">{{ $todayDate }} {{ $todayTime }}</p>
                                  </td>
                                  <td style="height: 150px;width:20%">
                                      {{-- <img src="{{ public_path().'/storage/signatures/'. $traineeSign }}" alt="" style="width: 8rem"> --}}
                                      <img src="{{ url('') }}/{{ $traineeSign }}" alt=""
                                          style="width: 8rem">
                                  </td>
                                  <td style="height: 150px;width:30%">{{ $client->title }} {{ $client->fname }}
                                      {{ $client->lname }} ({{ $client->designation }}) <br>
                                      <p style="font-size: 13px">{{ $todayDate }} {{ $todayTime }}</p>
                                  </td>
                              </tr>
                          </table>
                      </div>
                      <div style="text-align: center;margin-top:50px">
                          {{-- <img src="{{ public_path('images/certigoqas-logo.jpeg') }}" style="width: 100px" alt=""> --}}
                          <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px" alt="">
                          {{-- <img src="{{ url('') }}/{{ $traineeSign }}" alt="" style="width: 8rem"> --}}
                          <p style="font-size: 13px;">{{ env('COMPANY_ADDRESS') }}</p>
                          <p style="font-size: 12px;"><span style="font-size: 12px;color:rgb(106, 106, 106)">Email -
                              </span><a href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a> <span
                                  style="font-size: 12px;color:rgb(106, 106, 106)">Website address -</span> 
                                  <a  href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a> <span
                                  style="font-size: 12px;color:rgb(106, 106, 106)"> Contact us @ </span><a
                                  href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a> </p>
                          <p style="font-size: 12px;color:rgb(106, 106, 106)"> © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"  integrity="sha512-v/wOVTkoU7mXEJC3hXnw9AA6v32qzpknvuUF6J2Lbkasxaxn2nYcl+HGB7fr/kChGfCqubVr1n2sq1UFu3Gh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
