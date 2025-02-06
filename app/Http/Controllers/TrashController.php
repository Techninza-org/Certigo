<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Audit;
use App\Models\Client;
use App\Models\Template;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrashController extends Controller
{
    public function allTrash()
    {


        $auditT = Audit::onlyTrashed()->get();

        // add clint name from clietn id and organisation_name
        foreach ($auditT as $audit) {
            $client = Client::where('id', $audit->client_id)->first();
            $audit->client_name = $client ? $client->fname . " " . $client->lname : '';
            $audit->organisation_name = $client ? $client->organisation_name : '';
            $audit->audit_start = date('d-m-Y', strtotime($audit->start));

        }

        $clientT = Client::onlyTrashed()->get();
        $templatesT = Template::onlyTrashed()->get();
        $trainingsT = Training::onlyTrashed()->get();
        $usersT = User::onlyTrashed()->get();

        foreach ($trainingsT as $training) {
            $client = Client::where('id', $training->client)->first();
            $training->client_name = $client ? $client->fname . " " . $client->lname : '';
            $training->organisation_name = $client ? $client->organisation_name : '';
        }

        return view("trash.all", ['auditTrash' => $auditT, 'clientT' => $clientT, 'templatesT' => $templatesT, 'trainingsT' => $trainingsT, 'usersT' => $usersT]);


    }

    public function r_audit(Request $request)
    {

        Audit::withTrashed()->where('id', $request->rAudit)->restore();
        return redirect()->back()->with('success', 'Audit restored successfully!');

    }
    public function delete_audit(Request $request)
    {
        $audit = Audit::withTrashed()->find($request->dAudit);

        if ($audit) {
            $audit->forceDelete(); 
            return redirect()->back()->with('success', 'Audit permanently deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Audit not found!');
        }
        
    }


    public function r_client(Request $request)
    {

        Client::withTrashed()->where('id', $request->rClient)->restore();
        return redirect()->back()->with('success', 'Client restored successfully!');

    }
    
    public function d_client(Request $request)
    {
        $client = Client::withTrashed()->find($request->dClient);
        $client->forceDelete();
        return redirect()->back()->with('success', 'Client deleted successfully');

    }

    public function r_training(Request $request)
    {

        Training::withTrashed()->where('id', $request->rTraining)->restore();
        return redirect()->back()->with('success', 'Training restored successfully!');

    }

    public function d_training(Request $request)
    {

        $training = Training::withTrashed()->find($request->dTraining);
        $training->forceDelete();
        return redirect()->back()->with('success', 'Training deleted successfully');

    }

    public function r_user(Request $request)
    {

        User::withTrashed()->where('id', $request->ruser)->restore();
        return redirect()->back()->with('success', 'User restored successfully!');

    }

    public function d_user(Request $request)
    {

        $user = User::withTrashed()->find($request->duser);
        $user->forceDelete();
        return redirect()->back()->with('success', 'User deleted successfully');

    }

    public function r_template(Request $request)
    {

        Template::withTrashed()->where('id', $request->rTemplate)->restore();
        return redirect()->back()->with('success', 'Template restored successfully!');

    }

    public function d_template(Request $request)
    {

        $temp = Template::withTrashed()->find($request->dTemplate);
        $temp->forceDelete();
        return redirect()->back()->with('success', 'Template deleted successfully');

    }
}