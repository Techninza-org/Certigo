<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\OfferLetter;
use App\Models\AppointmentLetter;
use Carbon\Carbon;
use App\Models\PaySlip;
use Auth;
use App\Models\User;



class HrController extends Controller
{

    public function getOfferLetter()
    {

        $letters = OfferLetter::all();
        return view('offer-letters.create-offer-letter', ['letters' => $letters]);

    }

    public function postOfferLetter(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'starting_date' => 'required',
            'report_to_name' => 'required',
            'report_to_dept' => 'required',
            'ctc_digits' => 'required',
            'ctc_words' => 'required',
            'travel_allowance' => 'required',
            'probation_period' => 'required',
            'confirmation' => 'required',


        ]);

        $data = $request->all();

        $letter = OfferLetter::create($data);

        if ($letter) {
            return redirect()->back()->with('success', 'Offer letter created successfully');
        }

        return redirect()->back()->with('error', 'Letter not created, please try again!');

    }



    // delete offder letter

    public function deleteOfferLetterPdf($id)
    {

        $letter = OfferLetter::where(['id' => $id])->delete();
        if ($letter) {
            return redirect()->back()->with('success', 'Offer Letter deleted successfully');
        }
        return redirect()->back()->with('error', 'Removing offer letter failed');

    }


    public function viewOfferLetterPdf(Request $request)
    {
        $letter = OfferLetter::findOrFail($request->id);

        $letter->confirmDate = Carbon::parse($letter->confirmation)->format("d.m.Y");
        $letter->startingDate = Carbon::parse($letter->starting_date)->format("d.m.Y");
        $letter->createdDate = Carbon::parse($letter->created_at)->format("d/m/Y");

        view()->share('letter', $letter);

        $pdf = PDF::loadView('offer-letters.offer-letter-html');
        return $pdf->stream('offer_letter.pdf');
    }


    public function geteditofferLetter(Request $request)
    {

        $letter = OfferLetter::where(['id' => $request->id])->first();

        return view('offer-letters.edit', ['letter' => $letter]);
    }
    public function posteditofferLetter(Request $request)
    {

        $request->validate([
            'title' => 'nullable',
            'name' => 'nullable',
            'designation' => 'nullable',
            'starting_date' => 'nullable',
            'report_to_name' => 'nullable',
            'report_to_dept' => 'nullable',
            'ctc_digits' => 'nullable',
            'ctc_words' => 'nullable',
            'travel_allowance' => 'nullable',
            'probation_periods' => 'nullable',
            'confirmation' => 'nullable',


        ]);

        $data = $request->all();
        $appLetter = OfferLetter::where(['id' => $request->id])->first();
        // dd($appLetter);

        $appLetterUpdate = $appLetter->update($data);

        if ($appLetterUpdate) {
            return redirect()->back()->with('success', 'Offer letter updated successfully');
        }

        return redirect()->back()->with('error', 'Letter not updated, please try again!');

    }
    public function getPayslipPage()
    {

        $user_role = Auth::user()->role;
        if ($user_role == 0) {
            $slips = PaySlip::where('user_id', Auth::user()->id)->get();
            return view('pay-slips.create-pay-slip', ['slips' => $slips]);
        } else {
            $slips = PaySlip::all();
            $users = User::all();
            return view('pay-slips.create-pay-slip', ['slips' => $slips, 'users' => $users]);
        }

    }

    public function postPayslipPage(Request $request)
    {

        $data = $request->all();
        // dd($data);
        // Client logo 
        if ($request->file('company_logo') !== null) {
            $image = request()->file(key: 'company_logo')->getClientOriginalName();
            $image_name = date('YmdHis') . $image;
            $request->file('company_logo')->storeAs('public/pay-slips', $image_name);
            $data['company_logo'] = $image_name;
        }

        // calculations

        $data['apd'] = $request->twd - $request->lpd;
        // Basic wage 
        $data['basic'] = ($request->gross_salary / $request->twd) * $request->twd * 0.45;

        $data['basic'] = (int) ceil(number_format((float) $data['basic'], 2, '.', ''));

        // $data['basic'] = (float) $data['basic'];
        // dd($data['basic']);

        // EPF 
        if ($request->uan == null) {
            $data['pf_value'] = 0;
        } else {
            if ($data['basic'] >= 15000) {
                $data['pf_value'] = 15000 * (12 / 100);
                $data['pf_value'] = (int) ceil(number_format((float) $data['pf_value'], 2, '.', ''));
            } else {
                $data['pf_value'] = $data['basic'] * (12 / 100);
                $data['pf_value'] = (int) ceil(number_format((float) $data['pf_value'], 2, '.', ''));
            }
        }

        // HRA 
        $data['hra'] = $data['basic'] * (40 / 100);
        $data['hra'] = (int) ceil(number_format((float) $data['hra'], 2, '.', ''));
        // conveyance allowance
        $data['conveyance_allowance'] = (1600 / $request->twd) * $request->twd;
        $data['conveyance_allowance'] = (int) ceil(number_format((float) $data['conveyance_allowance'], 2, '.', ''));
        // professional tex
        // $data['professional_tax'] = 0;

        // medical allowances 
        $data['medical_allowance'] = (1250 / $request->twd) * $request->twd;
        $data['medical_allowance'] = (int) ceil(number_format((float) $data['medical_allowance'], 2, '.', ''));

        // loan recovery
        // $data['loan_recovery'] = 0;

        // other allowances 
        $data['adhoc_allowance'] = ($request->gross_salary / $request->twd) * $request->twd - ($data['basic'] + $data['hra'] + $data['conveyance_allowance'] + $data['medical_allowance']);
        $data['adhoc_allowance'] = (int) ceil(number_format((float) $data['adhoc_allowance'], 2, '.', ''));

        // total earnings
        $data['total_earnings'] = $data['basic'] + $data['hra'] + $data['conveyance_allowance'] + $data['medical_allowance'] + $data['adhoc_allowance'];
        $data['total_earnings'] = (int) ceil(number_format((float) $data['total_earnings'], 2, '.', ''));



        // ESI
        // $data['esi_value']  = 0;
        // if($request->gross_salary <= 21000){
        //     $data['esi_value'] = $data['total_earnings']*(0.75/100);
        //          $data['esi_value'] = (int) ceil(number_format((float)$data['esi_value'], 2, '.', ''));
        // }else{
        //     $data['esi_value'] = 0;
        //      $data['esi_value'] = (int) ceil(number_format((float)$data['esi_value'], 2, '.', ''));
        // }

        // loss in pay days 
        $data['loss_of_pay_days'] = ($request->gross_salary / $request->twd) * $request->lpd;
        $data['loss_of_pay_days'] = (int) ceil(number_format((float) $data['loss_of_pay_days'], 2, '.', ''));
        // total deductions
        $data['total_deductions'] = $data['pf_value'] + $request->esi_value + $request->professional_tax + $request->loan_recovery + $data['loss_of_pay_days'];
        $data['total_deductions'] = (int) ceil(number_format((float) $data['total_deductions'], 2, '.', ''));

        $data['net_salary'] = $data['total_earnings'] - $data['total_deductions'];
        $data['net_salary'] = (int) ceil(number_format((float) $data['net_salary'], 2, '.', ''));

        $slips = PaySlip::create($data);

        if ($slips) {
            return redirect()->back()->with('success', 'Pay Slip created successfully');
        }
        return redirect()->back()->with('error', 'Pay Slip not created, please try again!');
    }



    public function viewPaySlipPdf(Request $request)
    {
        $slip = PaySlip::findOrFail($request->id);

        // Return the rendered view as a string
        return view('pay-slips.pay_slip', ['slip' => $slip])->render();
    }




    public function paySlip(Request $request)
    {
        $pdf = PDF::loadView('pay-slips.pay-slip-pdf');
        return $pdf->stream('pay_slip.pdf');
    }

    public function editPaySlipPdf(Request $request)
    {

        $slip = PaySlip::where(['id' => $request->id])->first();
        // dd($slip);
        return view('pay-slips.edit', ['slip' => $slip]);
    }

    public function deletePaySlipPdf(Request $request)
    {
        $request->validate([
            'payslip_id' => 'required|integer',
        ]);

        $slip = PaySlip::where(['id' => $request->payslip_id])->delete();
        // dd($slip);
        if ($slip) {
            return redirect()->back()->with('success', 'Pay Slip deleted successfully');
        }
        return redirect()->back()->with('error', 'Removing pay slip failed');

    }


    public function posteditPaySlipPdf(Request $request)
    {

        $request->validate([
            'company_name' => 'nullable',
            'company_logo' => 'nullable',

            'company_address' => 'nullable',
            'month' => 'nullable',
            'year' => 'nullable',
            'employee_name' => 'nullable',
            'employee_number' => 'nullable',
            'joined_date' => 'nullable',
            'department' => 'nullable',
            'sub_department' => 'nullable',
            'designation' => 'nullable',
            'payment_mode' => 'nullable',
            'bank' => 'nullable',
            'ifsc' => 'nullable',
            'bank_account' => 'nullable',
            'pan' => 'nullable',
            'uan' => 'nullable',
            'pf_number' => 'nullable',
            'apd' => 'nullable',
            'twd' => 'nullable',
            'lpd' => 'nullable',
            'dp' => 'nullable',



        ]);


        $slip = PaySlip::where(['id' => $request->id])->first();
        $data = $request->all();
        // dd($data);
        // Client logo 

        if ($request->file('company_logo') !== null) {
            $image = request()->file(key: 'company_logo')->getClientOriginalName();
            $image_name = date('YmdHis') . $image;
            $request->file('company_logo')->storeAs('public/pay-slips', $image_name);
            $data['company_logo'] = $image_name;
        }

        // calculations

        $data['apd'] = $request->twd - $request->lpd;
        // Basic wage 
        $data['basic'] = ($request->gross_salary / $request->twd) * $request->twd * 0.45;

        $data['basic'] = (int) ceil(number_format((float) $data['basic'], 2, '.', ''));

        // $data['basic'] = (float) $data['basic'];
        // dd($data['basic']);
        // EPF 
        if ($request->uan == null) {
            $data['pf_value'] = 0;
        } else {

            if ($data['basic'] >= 15000) {
                $data['pf_value'] = 15000 * (12 / 100);
                $data['pf_value'] = (int) ceil(number_format((float) $data['pf_value'], 2, '.', ''));
            } else {
                $data['pf_value'] = $data['basic'] * (12 / 100);
                $data['pf_value'] = (int) ceil(number_format((float) $data['pf_value'], 2, '.', ''));
            }
        }

        // HRA 
        $data['hra'] = $data['basic'] * (40 / 100);
        $data['hra'] = (int) ceil(number_format((float) $data['hra'], 2, '.', ''));
        // conveyance allowance
        $data['conveyance_allowance'] = (1600 / $request->twd) * $request->twd;
        $data['conveyance_allowance'] = (int) ceil(number_format((float) $data['conveyance_allowance'], 2, '.', ''));
        // professional tex
        // $data['professional_tax'] = 0;

        // medical allowances 
        $data['medical_allowance'] = (1250 / $request->twd) * $request->twd;
        $data['medical_allowance'] = (int) ceil(number_format((float) $data['medical_allowance'], 2, '.', ''));

        // loan recovery
        // $data['loan_recovery'] = 0;

        // other allowances 
        $data['adhoc_allowance'] = ($request->gross_salary / $request->twd) * $request->twd - ($data['basic'] + $data['hra'] + $data['conveyance_allowance'] + $data['medical_allowance']);
        $data['adhoc_allowance'] = (int) ceil(number_format((float) $data['adhoc_allowance'], 2, '.', ''));

        // total earnings
        $data['total_earnings'] = $data['basic'] + $data['hra'] + $data['conveyance_allowance'] + $data['medical_allowance'] + $data['adhoc_allowance'];
        $data['total_earnings'] = (int) ceil(number_format((float) $data['total_earnings'], 2, '.', ''));



        // ESI
        // if($request->gross_salary <= 21000){
        //     $data['esi_value'] = $data['total_earnings']*(0.75/100);
        //          $data['esi_value'] = (int) ceil(number_format((float)$data['esi_value'], 2, '.', ''));
        // }else{
        //     $data['esi_value'] = 0;
        //      $data['esi_value'] = (int) ceil(number_format((float)$data['esi_value'], 2, '.', ''));
        // }

        // loss in pay days 
        $data['loss_of_pay_days'] = ($request->gross_salary / $request->twd) * $request->lpd;
        $data['loss_of_pay_days'] = (int) ceil(number_format((float) $data['loss_of_pay_days'], 2, '.', ''));
        // total deductions
        $data['total_deductions'] = $data['pf_value'] + $request->esi_value + $request->professional_tax + $request->loan_recovery + $data['loss_of_pay_days'];
        $data['total_deductions'] = (int) ceil(number_format((float) $data['total_deductions'], 2, '.', ''));

        $data['net_salary'] = $data['total_earnings'] - $data['total_deductions'];
        $data['net_salary'] = (int) ceil(number_format((float) $data['net_salary'], 2, '.', ''));

        $slipupdate = $slip->update($data);

        if ($slipupdate) {
            // return redirect()->back()->with('success','Pay Slip updated successfully');
            return redirect()->route('get.payslip.page')->with('success', 'Pay Slip updated successfully');
        }

        return redirect()->back()->with('error', 'Pay Slip not updated, please try again!');

    }

    public function getappointmentLetter()
    {

        $letters = AppointmentLetter::all();
        return view('appointment-letters.create-appointment-letter', ['letters' => $letters]);

    }

    public function postappointmentLetter(Request $request)
    {

        // $request->validate([
        //     'title'=>'required',
        //     'name'=>'required',
        //     'designation'=>'required',
        //     'starting_date'=>'required',
        //     'report_to_name'=>'required',
        //     'report_to_dept'=>'required',
        //     'ctc_digits'=>'required',
        //     'ctc_words'=>'required',
        //     'travel_allowance'=>'required',
        //     'probation_periods'=>'required',
        //     'confirmation'=>'required',


        // ]);

        $data = $request->all();
        // dd($data);

        $letter = AppointmentLetter::create($data);

        if ($letter) {
            return redirect()->back()->with('success', 'Appointment letter created successfully');
        }

        return redirect()->back()->with('error', 'Letter not created, please try again!');

    }


    public function geteditappointmentLetter(Request $request)
    {

        $letter = AppointmentLetter::where(['id' => $request->id])->first();

        return view('appointment-letters.edit', ['letter' => $letter]);
    }
    public function posteditappointmentLetter(Request $request)
    {

        $request->validate([
            'title' => 'nullable',
            'name' => 'nullable',
            'designation' => 'nullable',
            'starting_date' => 'nullable',
            'report_to_name' => 'nullable',
            'report_to_department' => 'nullable',
            'ctc_digits' => 'nullable',
            'ctc_words' => 'nullable',
            'travel_allowance' => 'nullable',
            'probation_periods' => 'nullable',
            'confirmation' => 'nullable',


        ]);

        $data = $request->all();
        $appLetter = AppointmentLetter::where(['id' => $request->id])->first();
        // dd($appLetter);

        $appLetterUpdate = $appLetter->update($data);

        if ($appLetterUpdate) {
            return redirect()->back()->with('success', 'Appointment letter updated successfully');
        }

        return redirect()->back()->with('error', 'Letter not updated, please try again!');

    }

    public function viewappointmentLetterPdf(Request $request)
    {
        $letter = AppointmentLetter::findOrFail($request->id);

        // Return the rendered HTML
        return view('appointment-letters.appointment-letter-html', compact('letter'))->render();
    }

}