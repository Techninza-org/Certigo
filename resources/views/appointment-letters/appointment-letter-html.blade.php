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
        .a4-height {
            height: 297mm;
            overflow: hidden;
            position: relative;
        }
    </style>
</head>

<body>


    <main>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-12 ">
                    <div class=" ">
                        <div class="">
                            <div class="a4-height">
                                <div class=" mb-3 ">
                                    <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;"
                                        alt="">
                                    <!-- <h6 class="fs-6" style="text-align: center;margin-top:0px;">
                                        APPOINTMENT LETTER
                                    </h6> -->
                                    <table style="border-collapse: collapse;width:100%;">
                                        <tr>
                                            <th style="width:100%;text-align:center;font-size:1.2rem">
                                                APPOINTMENT LETTER
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <p>Date: {{ $letter->created_at }}</p>

                                <p class='m-0'>
                                    Employee Name: {{ $letter->name }}
                                </p>
                                <p class='m-0'>
                                    Employee Code:{{ $letter->employee_code }}
                                </p>
                                <p>
                                    Employee Address:{{ $letter->employee_address }}
                                </p>
                                <p>
                                    Subject: Letter of Appointment for {{ $letter->name }}
                                </p>
                                <p>
                                    With reference to your acceptance of our offer letter, we are pleased to appoint you
                                    as
                                    “{{ $letter->designation }}” at CERTIGOQAS PRIVATE LIMITED. You will report
                                    to Human Resource Department .
                                </p>
                                <p>
                                    As discussed and agreed, you will receive annual CTC of Rs.
                                    {{ $letter->ctc_digits }}/- ({{ $letter->ctc_words }})
                                    from the date of joining. Please note that the variable salary component will be
                                    performance-based. Refer to the employment Terms and conditions enclosed.
                                </p>
                                {{-- vacation --}}
                                <!-- <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Vacation
                                        </th>
                                    </tr>
                                </table> -->
                                <!-- <p style="margin:0;padding:0">
                                    Even though we offer flexibility, you are expected to complete 8 hours a day excluding
                                    lunch break,
                                    <table style="border-collapse: collapse;width:100%;margin:0;padding:0">
                                        <tr style='margin:0;padding:0'>
                                            <th style="width:23%;margin:0;padding:0">
                                            40 hours per week
                                            </th>
                                            <td style="width:77%;margin:0;padding:0">
                                            . The working hours shall be from 9 am to 6 pm
                                        (Monday-Friday).
                                            </td>
                                        </tr>
                                    </table>
                                </p> -->
                                <p>
                                    Even though we offer flexibility, you are expected to complete 8 hours a day
                                    excluding
                                    lunch break, 40 hours per week. The working hours shall be from 9 am to 6 pm
                                    (Monday-Friday).
                                </p>
                                <p>
                                    The probation period is {{ $letter->probation_periods }} months from the date of
                                    joining. During this tenure, your
                                    performance, conduct and skills shall be evaluated. We follow a formal dress code
                                    and
                                    further information is available in the employee handbook.
                                </p>
                                <p>
                                    Please sign the enclosed Employee Agreement as your acceptance for the position and
                                    revert with a signed copy by
                                </p>
                                <p>
                                    Please carry all your documents like Aadhar Card, PAN Card, Educational
                                    certificates,
                                    testimonials, if any, etc. on your date of joining. If you have any query, please
                                    contact +91 8074937006 during office hours.
                                </p>
                                <p>
                                    Yours truly,
                                </p>
                                {{-- at-will --}}
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            For CERTIGOQAS PRIVATE LIMITED
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    Your position with CERTIGO QAS is “at will,” and thus you or the Company may
                                    terminate
                                    our employment relationship at any time, with or without cause or advance notice.
                                    CERTIGO QAS reserves the right, in its sole discretion, to change your compensation
                                    and/or employee benefits at any time on a prospective basis.
                                </p>
                                <p class='m-0'>
                                    {{ $letter->signing_authority }}
                                </p>
                                <p class='m-0'>
                                    {{ $letter->authority_name }}
                                </p>
                                <p class='m-0'>
                                    {{ $letter->authority_designation }}
                                </p>
                                <footer>
                                    <div style="text-align: center;margin-top:20px">
                                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px"
                                            alt="">
                                        <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>
                                        <p class="mb-2" style="font-size: 10px;">
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Email - </span>
                                            <a style="text-decoration: none"
                                                href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                            </span>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                            <a style="text-decoration: none"
                                                href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a>
                                        </p>
                                        <p style="font-size: 10px;color:rgb(106, 106, 106)">
                                            © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>

                                    </div>
                                </footer>
                            </div>


                            <div class="a4-height">
                                <div class=" mb-5 ">
                                    <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;"
                                        alt="">
                                    <!-- <h6 class="fs-6" style="text-align: center;margin-top:0px;">
                                        APPOINTMENT LETTER
                                    </h6> -->
                                    <table style="border-collapse: collapse;width:100%;">
                                        <tr>
                                            <th style="width:100%;text-align:center;font-size:1.2rem">
                                                APPOINTMENT LETTER
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            *T&C Annexure Attached*
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            EMPLOYMENT AGREEMENT
                                        </th>
                                    </tr>
                                </table>
                                <ul>
                                    <li>
                                        Your appointment is with effect from {{ $letter->date_of_appointment }}.
                                    </li>
                                    <li>
                                        Your Cost to Company (CTC) Package and Reimbursements (if any) shall be mentioned in
                                        the Annexure 1 of Appointment Letter or Employment Agreement whichever is applicable
                                    </li>
                                    <li>
                                        You will be posted at {{ $letter->reporting_authority }} and will be reporting to
                                        {{ $letter->reporting_name }}.
                                    </li>
                                    <li>
                                        You will be on probation for a period of six ({{ $letter->probation_periods }})
                                        months from the date of your
                                        joining, where after, your services if found satisfactory, will stand confirmed. Any
                                        decision to the contrary or to extend the probation period will be communicated to
                                        you by the Department Head. CERTIGO QAS PRIVATE LIMITED reserves the right to
                                        reduce/dispense with or
                                        extend your probation period at its absolute discretion.
                                    </li>
                                    <li>
                                        You are entitled to avail 1 casual/Sick leave (CSL) per month until your services
                                        are confirmed. After successful completion of the probation period, you will be
                                        entitled to 12 days earned leave (EL), which can be carried forward, if not availed
                                        in a calendar year.
                                    </li>
                                    <li>
                                        In case you decide to resign from your services, you will be required to serve 1
                                        month notice of physical presence in case you are under probation period AND three
                                        (3) months’ notice period of physical presence OR 1 month notice period of physical
                                        presence with one-month gross salary in lieu of the notice period in case you are
                                        confirmed on the payrolls of the company unless otherwise mentioned in the Service
                                        agreement. However, CERTIGO QAS PRIVATE LIMITED
                                        reserves the right to reduce/ dispense with or take any contrary decision at its
                                        absolute discretion.
                                    </li>
                                    <li>
                                        The Company reserves the right to terminate your services in case your performance
                                        is found to be unsatisfactory, by giving one-month notice in case you are under
                                        probation period and 3 months notice period / or one-month notice with one-month
                                        gross salary in case you are confirmed on the payrolls of the company.
                                        The Company also reserves the right to terminate your services without any notice or
                                        salary in lieu thereof on the grounds of misconduct, or even in the case of
                                        reasonable suspicion of misconduct, disloyalty, the commission of any act involving
                                        moral turpitude, or any act of indiscipline or inefficiency or for loss of
                                        confidence.
                                    </li>
                                    <li>
                                        Your assignments at work may be changed at any time depending on the business
                                        exigencies.
                                    </li>
                                    <li>
                                        You may be transferred at work in any of the company’s branches or client sites/
                                        offices across India or Abroad.
                                    </li>
                                    <li>
                                        You will be employed in the service of the company only as long as you are medically
                                        fit for employment in all aspects. Management has the right to get you medically
                                        examined by any qualified medical practitioner during the tenure of your service.
                                    </li>
                                    <li>
                                        In addition to the employment terms and conditions mentioned herein, all other
                                        standard and general rules, practices and policies of the Company as existing now
                                        and which may be amended from time to time shall be applicable to you.
                                    </li>
                                    
                                </ul>
                                <footer>
                                    <div style="text-align: center;margin-top:50px">
                                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px"
                                            alt="">
                                        <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>
                                        <p class="mb-2" style="font-size: 10px;">
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Email - </span>
                                            <a style="text-decoration: none"
                                                href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                            </span>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                            <a style="text-decoration: none"
                                                href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a>
                                        </p>
                                        <p style="font-size: 10px;color:rgb(106, 106, 106)">
                                            © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>

                                    </div>
                                </footer>
                            </div>
                                
                            <div class="a4-height">
                                <div class=" mb-3 ">
                                    <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;"
                                        alt="">
                                    <!-- <h6 class="fs-6" style="text-align: center;margin-top:0px;">
                                        APPOINTMENT LETTER
                                    </h6> -->
                                    <table style="border-collapse: collapse;width:100%;">
                                        <tr>
                                            <th style="width:100%;text-align:center;font-size:1.2rem">
                                                APPOINTMENT LETTER
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <ul>
                                    <li>
                                        You are required at all times to maintain the highest order of discipline and
                                        secrecy as regards to the work of the Company and/or its Subsidiaries or Associate
                                        Companies. All inventions, improvements, discoveries made by you either alone or
                                        with other persons, will become the sole property of the company. You will ensure
                                        that patent
                                        protections are obtained for such inventions/improvements and discoveries in India
                                        or elsewhere and assign the same to the company.
                                    </li>
                                    <li>
                                        You are required to dedicate your total attention and abilities exclusively for the
                                        business of the Company during working hours. You will respect, obey and conform to
                                        all the regulations framed and issued by the Company from
                                        time to time. You shall not, while in the employment of the Company, be engaged in
                                        any other employment, conduct business whatsoever or hold any office of profit or
                                        accept any other emoluments without the previous consent in writing of the Company.
                                    </li>
                                    <li>
                                        During the course of your employment and if the nature of your business requires it,
                                        the Company may send you for specialized training within India or overseas in order
                                        to enable you to perform more effectively. In such an event, you will be required to
                                        execute a training bond with the Company.
                                    </li>
                                    <li>
                                        You during the period of employment with the company plus 1 year after the ending of
                                        the employment shall desist from actively soliciting employment and desist from
                                        considering employment offers from any of the company’s
                                        existing or potential client’s partner, collaborators or any affiliates of the
                                        company, without obtaining written permission from the company.
                                    </li>
                                    <li>
                                        The emoluments/benefits due to you will be liable/subject to tax in accordance with
                                        the provisions of the Income Tax Act and Rules made there under as also other
                                        applicable laws, if any, as may be in force from time to time.
                                    </li>
                                    <li>
                                        The Company lays emphasis on all statutory compliances and you should ensure
                                        compliance with various statutes in your area of operations including Insider
                                        Trading Regulations.
                                    </li>
                                    <li>
                                        You shall retire from the services of the company on completion of 58 (fifty-eight)
                                        years of age.
                                    </li>
                                    <li>
                                        That jurisdiction of courts at Visakhapatnam shall only apply to any dispute arising
                                        out of these terms and conditions of employment.
                                    </li>
                                </ul>
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Acknowledgement by the Employee
                                        </th>
                                    </tr>
                                </table>
                                <p>
                                    I acknowledge receiving a copy of Appointment Letter and Employment Agreement relating
                                    to all incidents of my employment with the company and after having read and understood
                                    and comprehended the contents and implications therein, I am satisfied and agree to
                                    abide by them.
                                </p>
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Employee Name :{{ $letter->name }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Employee Signature :
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            For CERTIGO QAS PRIVATE LIMITED
                                        </th>
                                    </tr>
                                </table>
                                <p class="m-0">
                                    {{ $letter->signing_authority }}
                                </p>
                                <p class="m-0">
                                    {{ $letter->authority_name }}
                                </p>
                                <p class="m-0">
                                    {{ $letter->authority_designation }}
                                </p>
                                <footer>
                                    <div style="text-align: center;margin-top:20px">
                                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px"
                                            alt="">
                                        <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>
                                        <p class="mb-2" style="font-size: 10px;">
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Email - </span>
                                            <a style="text-decoration: none"
                                                href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                            </span>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                            <a style="text-decoration: none"
                                                href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a>
                                        </p>
                                        <p style="font-size: 10px;color:rgb(106, 106, 106)">
                                            © Copyright {{ $currentYear = date("Y") }} CERTIGO QAS® PRIVATE LIMITED</p>

                                    </div>
                                </footer>
                            </div>


                            <div class="a4-height">
                                <div class=" mb-3 ">
                                    <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px;"
                                        alt="">
                                    <!-- <h6 class="fs-6" style="text-align: center;margin-top:0px;">
                                        APPOINTMENT LETTER
                                    </h6> -->
                                    <table style="border-collapse: collapse;width:100%;">
                                        <tr>
                                            <th style="width:100%;text-align:center;font-size:1.2rem">
                                                APPOINTMENT LETTER
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;text-align:center">
                                            Annexure 1
                                        </th>
                                    </tr>
                                </table>
                                <p>Compensation break-up for “{{ $letter->name }}”, Employee Code –
                                    {{ $letter->employee_code }}</p>
                                <p>Salary Component Per Month (Rs.) {{ $letter->salary }}/- FIXED COMPONENT
                                    <br>BASIC-{{ $letter->basic }}/- <br>HRA -{{ $letter->hra }}/- <br>
                                    CONVEYANCE -{{ $letter->conveyance }}/- <br> SPECIAL ALLOWANCE
                                    -{{ $letter->special_allowance }}/- <br> MEDICAL -{{ $letter->medical }}/- <br>
                                    LTA - {{ $letter->lta }}/- <br>
                                    MONTHLY GROSS SALARY - {{ $letter->monthly_gross_salary }}/- <br> ANNUAL VARIABLE CTC -
                                    {{ $letter->annual_variable_ctc }}/- <br>
                                    ANNUAL CTC (FIXED)-{{ $letter->annual_fixed_ctc }}/-
                                </p>
                                <table style="border-collapse: collapse;width:100%;margin-bottom:20px;">
                                    <tr>
                                        <th style="width:100%;margin-bottom:20px;">
                                            Note:
                                        </th>
                                    </tr>
                                </table>
                                <p>*Medi-claim shall be effective once probation period completes and applicable to eligible
                                    employees. <br>
                                    The gross salary shall be subjected to TDS (tax deduction at source) depending on
                                    investments & tax declaration made by the employees. <br>
                                    Employee contribution to medi-claim shall be deducted from monthly gross salary (if &
                                    where applicable).
                                </p>
                                <footer>
                                    <div style="text-align: center;margin-top:20px">
                                        <img src="{{ url('') }}/images/certigoqas-logo.jpeg" style="width: 100px"
                                            alt="">
                                        <p class="mb-2" style="font-size: 10px;">{{ env('COMPANY_ADDRESS') }}</p>
                                        <p class="mb-2" style="font-size: 10px;">
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Email - </span>
                                            <a style="text-decoration: none"
                                                href="mailto:{{ env('CERTIGO_EMAIL') }}">{{ env('CERTIGO_EMAIL') }}</a>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)">Website address -
                                                <a

                                        href="https://certigoqa.com/" target="_blank"> www.certigoqa.com</a>
                                            </span>
                                            <span style="font-size: 10px;color:rgb(106, 106, 106)"> Contact us @ </span>
                                            <a style="text-decoration: none"
                                                href="tel:+918074937006">{{ env('COMPANY_MOBILE') }}</a>
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
