<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <title>Offer Letter By CERTIGO QAS® Pvt Ltd</title>
    <style>

        body{
            text-align: justify;
        }
       
        .a4-height{
            height:297mm;
            overflow:hidden;
            position: relative;
        }
    </style>
</head>

<body>


    <main>
        <div class="container-fluid">
            <div class="row mt-5" >
                <div class="col-lg-12 ">
                    <div class=" " >
                        <div class="">
                            <div class="a4-height">
                                <div class=" mb-5 ">
                                    <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;" alt="">     
                                    <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                        <tr>
                                            <th style="text-align: center;width:100%;margin-bottom:20px;">
                                                EMPLOYEMENT OFFER LETTER
                                            </th>
                                        </tr>
                                       
                                    </table>                           
                                                           
                                </div>
                                <p>Date: {{ $letter->createdDate }}</p>
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="text-align: center;width:100%;margin-bottom:20px;">
                                            Private & Confidential
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;width:100%;">
                                            <span style="font-weight: 100">Dear</span> {{ $letter->title }}. {{ $letter->name }},
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    On behalf of CERTIGO QAS, I am pleased to offer you employment with CERTIGO QAS as
                                    a {{ $letter->designation }} starting on {{ $letter->startingDate }}. Please
                                    carefully review this document for important details about your compensation, benefits, and
                                    terms of your anticipated employment with CERTIGO QAS.
                                </p>
                                <p>
                                    Your first date of employment will be {{ $letter->startingDate }}. You will report directly to {{ $letter->report_to_dept }}.
                                </p>
                                {{-- compensation  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Compensation
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    During your employment, you will be paid a salaried rate of Rs.{{ $letter->ctc_digits }} ({{ $letter->ctc_words }}) CTC per annum subject to applicable statutory deductions and paid by direct
                                    deposit to your bank account on a monthly schedule. As an exempt employee, you will not
                                    be eligible for any overtime pay. This position is a full-time position.
                                </p>
                                {{-- trevel  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Travel Allowance
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    During this period, you are entitled for Rs.{{ $letter->travel_allowance }}/- as monthly travel conveyance applicable
                                    for local travel only (within 120km distance, which is already added in the salary).
                                </p>
                                {{-- vacation  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Vacation
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    All employees are required to wait until their six-month probationary period is complete
                                    before being eligible to take vacation time. In each calendar year, you will be entitled to
                                    3
                                    days vacation. This year your entitlement will be 3 days, which is pro-rated to your start
                                    date. All vacation time- off must be approved in writing in advance by your manager.
                                </p>
                                {{-- paid holiday  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Paid personal holiday
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    After 6 months of continuous service, you will be eligible for 12 paid personal holiday in
                                    each
                                    calendar year.
                                </p>
                                {{-- hours of work  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Hours of work
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    As a full-time or part-time employee, your normal work week will consist 45 hours.
                                </p>

                                <footer>
                                    <div style="text-align: center;margin-top:50px">
                                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px" alt="">            
                                        <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>            
                                        <p class="mb-2" style="font-size: 10px;">
                                            <span  style="font-size: 10px;color:rgb(106, 106, 106)">Email -  </span>
                                            <a style="text-decoration: none" href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>            
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                            </span> 
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                            <a style="text-decoration: none" href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a> 
                                        </p>
                                        <p style="font-size: 10px;color:rgb(106, 106, 106)">
                                            © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>
            
                                    </div>
                                </footer>
                            </div>


                            <div class="a4-height">
                                <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;" alt="">    
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="text-align: center;width:100%;margin-bottom:20px;">
                                            EMPLOYEMENT OFFER LETTER
                                        </th>
                                    </tr>
                                   
                                </table>    
                                {{-- probationary period  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Probationary period
                                        </th>
                                    </tr>
                                </table>
                                <p class="mb-4">
                                    Your employment will be probationary for a period of {{ $letter->probation_period }} months, during which time
                                    CERTIGO QAS will assess your suitability for the position. Following the successful
                                    completion of your probationary period, your performance and salary will be reviewed in
                                    conjunction with CERTIGO QAS annual time lines.
                                </p>
                                {{-- insurance  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Insurance Benefits
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    After 6 months of service, you will be eligible to CERTIGO QAS life insurance benefit plan.
                                    This plan includes the following coverage:(Life care) available to you on a cost-sharing basis.
                                    Please refer to the attached summary for details.
                                </p>
                                {{-- at-will  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            At-will Employment
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    Your position with CERTIGO QAS is “at will,” and thus you or the Company may terminate
                                    our employment relationship at any time, with or without cause or advance notice.
                                    CERTIGO QAS reserves the right, in its sole discretion, to change your compensation and/or
                                    employee benefits at any time on a prospective basis.
                                </p>
                                {{-- privacy  --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Privacy/Confidentiality
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    “I shall safeguard the confidential and personal information of CERTIGO QAS. I shall
                                    conform to all practices, procedures, standards and guidelines, which may be established
                                    from time to time by CERTIGO QAS including but not limited to confidential, personal and
                                    proprietary information as well as privacy.
                                </p>
                                <p>
                                    I shall protect CERTIGO QAS confidential and/or proprietary information from any
                                    unauthorized access, disclosure, reproduction, alteration and/or use, both during and after
                                    my employment with CERTIGO QAS. I shall not use confidential, personal or proprietary
                                    information gained by virtue of employment for personal gain or for any other purpose,
                                    which is not directly related to my employment.
                                </p>
                                <p>
                                    Upon the end of my employment with CERTIGO QAS immediately return company property
                                    and any other software or hardware materials, equipment immediately. I shall all personal,
                                    private and/or proprietary information (including any client detail books) and I will not
                                    disclose or make any use of personal, private and/or proprietary information of CERTIGO
                                    QAS after my employment with CERTIGO QAS.”
                                </p>
                                

                                <footer>
                                    <div style="text-align: center;margin-top:50px">
                                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px" alt="">            
                                        <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>            
                                        <p class="mb-2" style="font-size: 10px;">
                                            <span  style="font-size: 10px;color:rgb(106, 106, 106)">Email -  </span>
                                            <a style="text-decoration: none" href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>            
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                            </span> 
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                            <a style="text-decoration: none" href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a> 
                                        </p>
                                        <p style="font-size: 10px;color:rgb(106, 106, 106)">{{ env('COMPANY_COPYRIGHT') }}</p>
            
                                    </div>
                                </footer>
                            </div>
                            <div class="a4-height">
                                <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;" alt="">    
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="text-align: center;width:100%;margin-bottom:20px;">
                                            EMPLOYEMENT OFFER LETTER
                                        </th>
                                    </tr>
                                   
                                </table>    
                                <p>
                                    Please confirm your agreement with these terms and accept this offer by signing this
                                    agreement on or before {{ $letter->confirmDate }}. Please sign and date copy of this letter and return
                                    singed copy to CERTIGO QAS by {{ $letter->confirmDate }} on your reporting date to CERTIGO QAS.
                                </p>
                                
                                <p>We look forward to working together! Please don’t hesitate to reach out to {{ $letter->report_to_dept }} in the meantime. </p>
                                <br>
                                <p class="m-0">
                                    Sincerely
                                </p>
                                <p class="m-0">{{ $letter->report_to_name }}</p>
                                <p class="m-0">{{ $letter->report_to_dept }}</p>
                                <p >CQAS</p>
                                <p>I hereby agree to and accept employment with the Company on the terms and conditions
                                    set forth in this offer letter.</p>
                                    <p>{{ $letter->title }}. {{ $letter->name }} </p>
                                    <p class="m-0">Date:</p>
                                    <p>Signature:</p>

                                    <footer>
                                        <div style="text-align: center;margin-top:50px">
                                            <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px" alt="">            
                                            <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>            
                                            <p class="mb-2" style="font-size: 10px;">
                                                <span  style="font-size: 10px;color:rgb(106, 106, 106)">Email -  </span>
                                                <a style="text-decoration: none" href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>            
                                                <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                    <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                                </span> 
                                                <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                                <a style="text-decoration: none" href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a> 
                                            </p>
                                            <p style="font-size: 10px;color:rgb(106, 106, 106)">
                                                © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>
                
                                        </div>
                                    </footer>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"
        integrity="sha512-v/wOVTkoU7mXEJC3hXnw9AA6v32qzpknvuUF6J2Lbkasxaxn2nYcl+HGB7fr/kChGfCqubVr1n2sq1UFu3Gh1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
