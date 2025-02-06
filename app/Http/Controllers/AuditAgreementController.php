<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditAgreementController extends Controller
{
    public function index()
    {
        return view('agreement');
    }

    public function genrateAgreement()
    {
        return view('agreement.genrateagreement');
    }

    public function genrateAgreementPdf(Request $request)
    {
        $data = $request->all();
        return view('agreement.agreement', ['data' => $data]);
    }
}