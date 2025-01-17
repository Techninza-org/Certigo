<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Audit;
use App\Models\Template;
use App\Models\TempFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if(Auth::guard('webclient')->attempt($req->only(['company_emailid', 'password']))) 
        {
            // dd("qwertyui");
            // dd(Auth::guard('webclient')->user());
            $myaudits = Audit::where(['client_id'=> Auth::guard('webclient')->user()->id])->get();

            foreach($myaudits as $audit){          
                $auditor = User::where(['id'=>$audit->auditors])->first('name');
                $audit->auditor = $auditor->name;
    
                $templatesArr = $audit->checklists;
                $templatesjson = json_decode($templatesArr);
                $tempNames = [];
                foreach($templatesjson as $tArr){
                    $template = Template::where(['id'=>$tArr])->first();
                    $tempNames[] = $template;
                }
    
                $audit->tempname = $tempNames;
            }

            $folders = TempFolder::all();

        $employes = User::all();
            // dd($myaudits);
            return view('client.home',['myaudits'=>$myaudits,'folders'=>$folders,'employes'=>$employes]);
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('webclient')->logout();

        return redirect()->route('client.login');
    }
}
