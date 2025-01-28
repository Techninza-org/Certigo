<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Audit;
use App\Models\Template;
use App\Models\TempFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AuditAgreement;
use App\Models\Client;

class ClientAuthController extends Controller
{

    public function index()
    {
        return view('client.audit');
    }

    public function login()
    {
        // $pass =Hash::make("123456789");
        // dd($pass);
        return view('client.login');
    }

    public function handleLogin(Request $req)
    {
        if (Auth::guard('webclient')->attempt($req->only(['company_emailid', 'password']))) {
            // dd("qwertyui");
            // dd(Auth::guard('webclient')->user());
            $myaudits = Audit::where(['client_id' => Auth::guard('webclient')->user()->id])->get();

            foreach ($myaudits as $audit) {

               // get audit details
               $audit->
            }

            $folders = TempFolder::all();

            $employes = User::all();
            // dd($myaudits);
            return view('client.home', ['myaudits' => $myaudits, 'folders' => $folders, 'employes' => $employes]);
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('webclient')->logout();

        return redirect()->route('client.login');
    }





    public function uploadSignatures()
    {
        return view('client.uploadsignatures');
    }


    public function uploadSignaturesClient(Request $request)
    {
        // Get the currently authenticated user's ID
        $userid = Auth::guard('webclient')->user()->id;

        // Validate the request
        $request->validate([
            'client_signature' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', // Ensures it's a valid file type
        ]);

        // Get the uploaded file
        $signature = $request->file('client_signature');

        // Define the folder path for saving the file
        $folderPath = public_path('images/');

        // Generate a unique filename to avoid collisions
        $fileName = uniqid() . '_' . $signature->getClientOriginalName();

        // Move the file to the folder
        $signature->move($folderPath, $fileName);

        // Find the client in the database
        $client = Client::where('id', $userid)->first();

        if ($client) {
            // Save the file path in the database
            $client->signature = 'images/' . $fileName;
            $client->save();

            return back()->with('success', 'Signature uploaded successfully');
        }

        return back()->with('error', 'Client not found.');
    }




}