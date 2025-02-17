<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Styled A4 Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom clip-path for cutting bottom-left to top-right */
        .clip-left-to-right {
            clip-path: polygon(0 100%, 100% 0, 100% 100%);
        }
    </style>
    <style>
        [contenteditable="true"] {
            border: 1px dashed #ddd;
            padding: 5px;
            outline: none;
            cursor: text;
        }
    </style>
</head>

<body class="flex  flex-col justify-center items-center min-h-screen bg-gray-100">
    {{-- {{ dd($data) }} --}}
    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>
            <h1 class="text-xl font-bold text-center">
                CONSULTING SERVICE AGREEMENT
            </h1>
            <h4 class="mt-5">THIS AGREEMENT is made this {{ \Carbon\Carbon::parse($data['date'])->format('jS') }} day
                of {{ \Carbon\Carbon::parse($data['date'])->format('F Y') }}
            </h4>

            <p class="mt-6 text-justify">
                <span class="font-bold"> CERTIGO QAS® PRIVATE LIMITED</span> a business incorporated in India with its
                registered office at <span class="font-bold">FLAT No.FF-2, FIRST FLOOR, DOOR No- 12-1-20/2,
                    SRINIVASA” KANNAYYAPETA, ABOVE SBI LIFE INSURANCE, NEAR GREEN PARK
                    HOTEL, OPP LANE TO HDRC BANK, VISAKHAPATNAM-530002, ANDHRA PRADESH
                    (“Provider”); </span>
                <br>
            <p>And</p>

            <p class="mt-4"> <b>{{ $data['company_name'] }}</b></span> a company incorporated
                in India with its registered address at<span class="font-bold"> {{ $data['company_address'] }}
                    (“Client”).</p> (each a
            “Party”, together the “Parties”).</span>
            </p>

            <div class="mt-2 description text-justify"></div>

            <div class="absolute bottom-0 left-2 right-2 p-4 text-center text-sm">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>


    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>



            <h1 class="mt-6 text-lg font-semibold">3. SERVICES AND FEES AND EXPENSES</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                @foreach ($data['service'] as $index => $service)
                    <li>{{ '3.' . ($index + 1) }}. {{ $service }}</li>
                @endforeach
            </ol>


            <h1 class="mt-6 text-lg font-semibold">4. TERM AND TERMINATION</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                @foreach ($data['term'] as $index => $term)
                    <li>{{ '4.' . ($index + 1) }}. {{ $term }}</li>
                @endforeach
            </ol>

            <h1 class="mt-6 text-lg font-semibold">5. RIGHT OF SUBSTITUTION</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>5.1. Except and otherwise provided in this Agreement, the Provider may, at the Provider’s
                    absolute discretion, engage a third party sub-contractor to perform some or all of the
                    obligations of the Provider under this Agreement and the client will not hire or engage
                    any third parties to assist with the provision of the service</li>
                <li>5.2. In the event that the Provider hires a sub-contractor:
                    <ol>
                        <li>5.2.1. The Provider shall pay the sub-contractor for its services and the compensation
                            will remain payable by the client to the Provider.</li>
                        <li>5.2.2. For the purpose of indemnification clause of this Agreement, the sub-contractor
                            is an agent of the Provider.</li>
                    </ol>
                </li>
            </ol>
            <h1 class="mt-6 text-lg font-semibold">6. AUTONOMY</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>6.1. Except as otherwise provided in this Agreement, the Provider will have full control over
                    working time, methods, and decision making in accordance with the Agreement. The
                    consultant will work autonomously and not at the direction of the client. However, the
                    Provider will be responsive to the reasonable needs and concerns of the Client.</li>

            </ol>






            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta,
                Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>
    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>


            <h1 class="mt-6 text-lg font-semibold">7. EQUIPMENT</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>7.1. Except as otherwise provided in this Agreement, the Provider will provide at the its own
                    expenses, software, materials and any other supplies necessary to deliver the services in
                    accordance with the Agreement.</li>

            </ol>

            <h1 class="mt-6 text-lg font-semibold">8. NO EXCULSIVITY</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>8.1. The parties acknowledge that this Agreement is non-exclusive and that either party will
                    be free, during and after term, to engage or contract with third parties for the provision
                    of service similar to the Services.</li>

            </ol>
            <h1 class="mt-6 text-lg font-semibold">9. PROPRIETARY RIGHTS: CONFIDENTIAL INFORMATION</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li> 9.1. Provider agrees that the work products from the services provided to the Client shall be
                    owned by Client. Nothing contained in this section 9.1 shall be construed as prohibiting
                    the Provider from utilizing in any manner, knowledge and experience of a general
                    nature acquired in the performance of services for the Client.</li>
                <li> 9.2. Confidential information includes all information identified by a disclosing party as
                    proprietary and confidential, which confidential information shall remain the sole
                    property of the disclosing party unless the ownership of such confidential information is
                    otherwise expressly set forth in the agreement. Items will not be considered confidential
                    information if: (a) available to public other than by a breach of an agreement by the
                    recipient; (b) rightfully received from a third party not in breach of any obligation of any
                    confidentiality; (c) independently developed by one party without access to the
                    confidential information of the other; or (d) rightly known to the recipient at the time of
                    disclosure as verified by its written records.
                </li>
                <li> 9.3. Each party agrees that it shall not use for any purpose or disclose to any third party any
                    confidential information of the other party without the express written consent of the
                    other party. Each party agrees to safeguard the confidential information of the other
                    party against use or disclosure other than as authorized by or pursuant to this
                    agreement through measures, and exercising a degree of care, which are at least as
                    protective as those, the Provider or the Client, as the case may be, exercises in
                    safeguarding the confidentiality of its own proprietary information, but no less than a
                    reasonable degree of care under the circumstances. Each party shall permit access to the
                    confidential information of the other party only to those individuals (a) who have
                    entered into a written nondisclosure agreement with the other party on terms equally as
                    restrictive as those set forth herein,
                </li>
            </ol>







            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>
    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>



            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>and (b) who require access in performance of their
                    duties to the other party in connection with the other party's rights under this
                    agreement</li>
                <li>9.4. Each party acknowledges that the wrongful use or disclosure of confidential information
                    of the other party may result in irreparable harm for which there will be no adequate
                    remedy at law. In the event of a breach by the other party or any of its officers, employees or
                    agents of its or their obligations under this Section 5, the non-breaching
                    party may immediately terminate this agreement without liability to the other party, and may bring
                    an appropriate legal action to enjoin such breach, and shall be entitled to
                    recover from the breaching party reasonable legal fees and cost in addition to other
                    appropriate relief.</li>

            </ol>

            <h1 class="mt-6 text-lg font-semibold">10. WARRANTIES</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>10.1. The Provider warrants that the services to be provided under this agreement shall be performed
                    in a professional manner conforming to generally accepted industry
                    standards and practices. The Client agrees that the Provider’s sole and exclusive
                    obligation with respect to the services covered by this limited warranty shall be, at the
                    Provider’s sole discretion, to correct the nonconformity or to refund the service fees
                    paid for the affected executive consulting services.
                <li>

            </ol>
            <h1 class="mt-6 text-lg font-semibold">11. GENERAL PROVISIONS</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>11.1. The relationship of the Client and the Provider is that of independent contractors. Personnel
                    of both parties are neither agents nor employees of the other party for federal
                    tax purposes or any other purpose whatsoever and are not entitled to any employee
                    benefits of the other party</li>
                <li> 11.2. No delay, failure or default in performance of any obligation by either party, excepting
                    all obligations to make payments hereunder, shall constitute a breach of this agreement
                    to the extent caused by force majeure.
                </li>
                <li> 11.3. Any assignment in violation of these terms is void.
                </li>
                <li>11.4. Any controversy or claim arising out of or relating to this agreement, or the breach
                    thereof, shall be conclusively resolved through binding arbitration under the
                    Commercial Arbitration Rules of the American Arbitration Association. Judgment on the
                    award rendered by the arbitrator(s) may be entered in any court having jurisdiction
                    thereof. Each party shall bear its own costs and attorney fees, unless the arbitration
                    award specifically provides otherwise.
                </li>
            </ol>

            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>
    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>



            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>11.5. All communications between the parties with respect to any of the provisions of this
                    agreement shall be in writing, and shall be sent by personal delivery, airmail or e-mail to
                    the Client or to the Provider as set forth in the preamble of this agreement, until such
                    time as either party provided the other not less than one (1) month prior written notice
                    of a change of address in accordance with these provisions.</li>
                <li>11.6. The validity of this agreement and the rights, obligations and relations of the parties
                    hereunder shall be construed and determined under and in accordance with the laws of
                    the state of [state]; provided, however, that if any provision of the agreement is
                    determined by a court of competent jurisdiction to be in violation of any applicable law
                    or otherwise invalid or unenforceable, such provision shall to such extent as it shall be
                    determined to be illegal, invalid or unenforceable under such law be deemed null and
                    void, but this agreement shall otherwise remain in full force. After arbitration, as
                    specified in Section 7.4, any suit to enforce any provision of this agreement, or any right, remedy
                    or other matter arising from the arbitration, will be brought exclusively in the
                    state or federal courts located in <b>{{ $data['state'] }}</b>. The Provider and the Client agree
                    and consent to the venue in and to the in-person jurisdiction of the aforementioned
                    courts.</li>
                <li>11.7. Any modification or amendment of any provision of this agreement must be in writing
                    and bear the signature of the duly authorized representatives of both parties. The failure
                    of any party to enforce any right it is granted herein, or to require the performance by
                    the other party hereto of any provision of this agreement, or the waiver by any party of any breach
                    of this agreement, shall not prevent a subsequent exercise or enforcement of
                    such provisions or be deemed a waiver of any subsequent breach of this agreement. All
                    provisions of this agreement which by their own terms take effect upon the termination
                    of this agreement or by their nature survive termination (including without limitation
                    the provisions of Sections 3, 9, 10, 11) shall survive such termination.</li>
                <li>11.8. This agreement, all attached schedules and all other agreements referred to herein or to
                    be delivered by the parties pursuant hereto, represents the entire understanding and
                    agreement between the parties with respect to the subject matter hereof, and merges all
                    prior discussions between them and supersedes and replaces any and every other
                    agreement or understanding which may have existed between the parties to the extent
                    that any such agreement or understanding relates to providing services to the Client. The Client
                    hereby acknowledges that it has not reasonable relied on any other
                    representation or statement that is not contained in this agreement or made by a person
                    or entity other than the Provider. To the extent, if any, that the terms and conditions of
                    Client’s orders or other correspondence are inconsistent with this agreement, this
                    agreement shall control.</li>

            </ol>


            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>
    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>




            <h1 class="mt-6 text-lg font-semibold">12. COMMUNICATION AND NOTICES</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>12.1. Any communication or notices given to a Party under or in connection with this
                    Agreement:
                    <ul>
                        <li>a) must be sent to the Party for the attention of the contact via the postal address
                            or email address listed in clause 12.2;</li>
                        <li>b) must be sent by a method listed in clause 12.3; and</li>
                        <li>c) unless proved otherwise will be deemed received as stated in clause 12.4 if
                            prepared and sent in accordance with this clause.</li>
                    </ul>
                </li>
                <li>12.2. The Parties' addresses and contacts are as stated in this table:
                    <table class="table-auto border w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Party</th>
                                <th class="border px-4 py-2">Contact</th>
                                <th class="border px-4 py-2">Address</th>
                                <th class="border px-4 py-2">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['party'] as $index => $party)
                                <tr>
                                    <td class="border px-4 py-2">{{ $party }}</td>
                                    <td class="border px-4 py-2">{{ $data['contact'][$index] }}</td>
                                    <td class="border px-4 py-2"><b>{{ $data['address'][$index] }}</b></td>
                                    <td class="border px-4 py-2">{{ $data['email'][$index] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </li>





            </ol>





            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa”
                Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra
                Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>

    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>





            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">

                <li>12.3. This table sets out:
                    <ul>
                        <li>a) delivery methods for sending a notice to a Party under this Agreement; and</li>
                        <li>b) for each delivery method, the corresponding delivery date and time when
                            delivery of the notice will be deemed to have taken place, on condition that all
                            other requirements in this clause have been satisfied, and subject to the
                            provisions in clause 12.4:</li>
                    </ul>
                    <table class="table-auto border w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Delivery method</th>
                                <th class="border px-4 py-2">Deemed delivery date and time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['delivery_method'] as $index => $method)
                                <tr>
                                    <td class="border px-4 py-2">{{ $method }}</td>
                                    <td class="border px-4 py-2">{{ $data['deemed_delivery'][$index] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </li>
                <li>12.4. For the purpose of clause 12.3 and calculating deemed receipt:
                    <ul>
                        <li>a) all references to time are to local time in the place of deemed receipt; and</li>
                        <li>b) if deemed receipt would occur in the place of deemed receipt on a Saturday or
                            Sunday or a public holiday when banks are not open for business, deemed
                            receipt will be deemed to take place at 9.00 am on the day when business next
                            starts in the place of receipt.</li>
                    </ul>
                </li>

                <h1 class="mt-6 text-lg font-semibold">13. Early Termination for Convenience Clause</h1>
                <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                    <li>13.1. In the event that the Client elects to terminate services without cause—that is, without
                        any
                        valid or justifiable reason as set forth herein—prior to the completion of the agreed
                        contractual
                        term, the Client shall be liable to pay all pending charges that would have accrued for the
                        remainder of the contract period. This provision is intended to compensate the Service Provider
                        for
                        the loss of anticipated revenue resulting from early termination. The Client acknowledges and
                        agrees
                        that such termination shall not be deemed a breach of contract only if terminating for valid
                        reasons
                        as defined under this Agreement; any termination without cause shall invoke the payment
                        obligations
                        specified herein.</li>
                </ol>




                <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                    <p>
                    <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                    Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta,
                    Above
                    SBI Life
                    Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                    Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                    “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                    </p>
                </div>
        </div>
    </div>
    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>

            <h1 class="mt-6 text-lg font-semibold">14. Termination for Cause Clause</h1>
            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>
                    Either Party may dissolve this Agreement for cause by providing the other Party with written
                    notice at least three (3) months in advance of the intended termination date. "For cause" shall
                    include, but is not limited to, any material breach of this Agreement, violation of applicable
                    laws or regulations, or any other condition that reasonably justifies termination. The
                    terminating Party must specify in the notice the grounds for termination and, if applicable,
                    allow the other Party a reasonable opportunity to remedy the breach within the notice period.
                </li>
            </ol>

            <li>IN WITNESS WHEREOF this Agreement has been entered into on the date stated at the
                beginning.
            </li>
            <div class="flex justify-between items-end mt-6">
                <div class="flex flex-col  items-start">
                    <div class="mb-2">Signed by</div>
                    <div>for and on behalf of</div>
                    <div class="font-bold">{{ $data['company_name'] }}</div>
                    <div>in the presence of</div>
                    <div>
                        --------------------
                        <p> Name: <b>{{ $data['signed_by'] }}</b>
                        </p>
                    </div>
                </div>
                <div>
                    -------------------------------------
                </div>
            </div>
            </ol>




            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">


                <div class="flex justify-between items-end">
                    <div class="flex flex-col  items-start">
                        <div class="mb-2">Signed by</div>
                        <div>Dr Sheela Bethapudi</div>
                        <div>for and on behalf of</div>
                        <div class="font-bold">CERTIGO QAS® PRIVATE LIMITED</div>
                        <div>in the presence of</div>
                        <div>Dr Sheela Bethapudi</div>
                        ---------------------------
                        <div>Name:</div>
                    </div>
                    <div>
                        -------------------------------------
                    </div>
                </div>
            </ol>



            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>

    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-4">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>

            <h1 class="text-md font-semibold text-center">Schedule 1</h1>
            <h1 class="mt-4  text-md font-semibold text-center">Scope of Services</h1>
            <p>This statement of work is made effective [ {{ \Carbon\Carbon::parse($data['date'])->format('jS') }} day
                of {{ \Carbon\Carbon::parse($data['date'])->format('F Y') }}] by and between the Provider and the
                Client.</p>
            <ol class=" flex flex-col gap-5 mb-6 text-justify">
                <li>1. The Client has agreed to carry on the suggestions as advised by the consultant in food
                    Safety and Hygiene for the improvement of the system.</li>
                <li>2. The Client hereby agrees to engage the consultant to provide the following service and
                    its pay all applicable fee (The “Service”)</li>
            </ol>
            <table class="table-auto border w-full mt-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">S. No.</th>
                        <th class="border px-4 py-2">Service Description</th>
                        <th class="border px-4 py-2">Quantity X frequency per year</th>
                        <th class="border px-4 py-2">Fees (Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($data['service_discription'] as $index => $description)
                        <tr>
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $description }}</td>
                            <td class="border px-4 py-2">{{ $data['quantity'][$index] }}</td>
                            <td class="border px-4 py-2">
                                {{ number_format($data['fees'][$index], 2) }}
                                @php $total += $data['fees'][$index]; @endphp
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="border px-4 py-2 font-bold" colspan="3">Total</td>
                        <td class="border px-4 py-2 font-bold">{{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>




            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>

    <div class="relative w-[210mm] h-[297mm] bg-white shadow-md border mb-5">
        <!-- Right Border -->
        <div class="absolute left-0 top-0 h-full w-2 bg-blue-900">
            <!-- Orange Accent -->
            <div class="absolute left-2 top-0 h-[20rem] w-3 bg-orange-500"></div>
        </div>
        <!-- Content -->
        <div class="p-12">
            <div class="flex justify-between items-center mb-6">
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
                <div class="h-10 w-40">
                    <img src="https://res.cloudinary.com/duajvpvod/image/upload/v1725715457/certigoqas-logo_ptxunj.jpg"
                        / class="h-ful w-full object-cover">
                </div>
            </div>





            <ol class="mt-6 flex flex-col gap-5 mb-6 text-justify">
                <li>3. The service will also include any other consulting tasks which the parties may agree on. The
                    consultant hereby agrees to provide such services to the client for a fee.</li>
                <li>4. Term rate
                    <ul>
                        @foreach ($data['term_rate'] as $rate)
                            <li>{{ $rate }}</li>
                        @endforeach
                    </ul>
                    This statement of work serves as an exhibit to the services agreement.
                </li>

                <li>5. The Fees are exclusive of and shall be subject to payment of goods and services tax (“GST”)
                    imposed under the prevailing legislation which shall be payable by Client. The applicable GST shall
                    be incorporated in the total amount in Provider’s invoice.</li>
                <div class="flex justify-between items-end">
                    <div class="flex flex-col  items-start">
                        <div class="mb-2">Signed by</div>
                        <div>for and on behalf of</div>
                        <div class="font-bold">{{ $data['company_name'] }}</div>
                        <div>in the presence of</div>
                    </div>
                    <div>

                        -------------------------------------
                    </div>
                </div>



                <div>
                    <p> Name: <b>{{ $data['signed_by'] }}</b>
                    </p>
                    --------------------

                </div>
                <div class="flex justify-between items-end">
                    <div class="flex flex-col  items-start">
                        <div class="mb-2">Signed by</div>
                        <div>Dr Sheela Bethapudi</div>
                        <div>for and on behalf of</div>
                        <div class="font-bold">CERTIGO QAS® PRIVATE LIMITED</div>
                        <div>in the presence of</div>
                        <div>Dr Sheela Bethapudi</div>
                        ---------------------------
                        <div>Name:</div>
                    </div>
                    <div>
                        -------------------------------------
                    </div>
                </div>
            </ol>



            <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-xs">
                <p>
                <div class="font-bold "> CERTIGO QAS® PRIVATE LIMITED </div>
                Registered Office Address-Flat No.FF-2, First floor, Door No- 12-1-20/2, Srinivasa” Kannayyapeta, Above
                SBI Life
                Insurance, Near Green Park Hotel, Opp Lane to HDFC bank, Visakhapatnam-530002, Andhra Pradesh.<br>
                Email: admin@certigoqa.com, Website address: www.certigoqa.com, Contact No: +91 8074937006.<br>
                “Your Trusted Partner-Ensuring Sustainability in Every Solution”
                </p>
            </div>
        </div>
    </div>



    <script>
        const data = [{
                heading: " Scope of Service",
                content: `
          <ol>
            <li>1.1. At CLIENT’s request, PROVIDER agrees to provide the services described in Schedule 1
            (“Services”) during the Term (as defined below) in accordance with the terms and
            conditions of this Agreement.</li>
            <li>1.2. The scope of the Services may be mutually reviewed by the Parties at any time and
            revised by mutual agreement.</li>
            <li>1.3. The parties contemplate that it may be desirable to make changes to the Services. Before
            performing any work associated with any such change, a written change order shall set
            forth the necessary revisions to the statement(s) of work, and the parties, shall agree in
            writing that such work constitutes a change from the original statement of work, as
            amended, and that they further agree to the change provisions set forth in the change
            order. Each change order shall be numbered serially and executed by both Parties.</li>
          </ol>`
            },
            {
                heading: " Obligations",
                content: `2.1. Client shall provide other support services as both the Client and Provider subsequently
agree.`
            },

        ];
        const container = document.querySelector(".description");

        data.forEach((item, index) => {
            const heading = document.createElement("h2");
            heading.className = "mt-6 text-lg font-semibold";
            heading.textContent = `${index + 1}. ${item.heading}`;

            const content = document.createElement("div");
            content.className = "mt-2 text-justify";
            content.innerHTML = item.content;

            container.appendChild(heading);
            container.appendChild(content);
        });
    </script>
</body>

</html>
