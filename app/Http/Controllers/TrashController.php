<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Audit;
use App\Models\Client;
use App\Models\Template;
use App\Models\Training;
use Illuminate\Http\Request;

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

        }

        $clientT = Client::onlyTrashed()->get();
        $templatesT = Template::onlyTrashed()->get();
        $trainingsT = Training::onlyTrashed()->get();
        $usersT = User::onlyTrashed()->get();




        return view("trash.all", ['auditTrash' => $auditT, 'clientT' => $clientT, 'templatesT' => $templatesT, 'trainingsT' => $trainingsT, 'usersT' => $usersT]);


    }

    public function r_audit(Request $request)
    {

        Audit::withTrashed()->where('id', $request->rAudit)->restore();
        return to_route("index");

    }

    public function r_client(Request $request)
    {

        Client::withTrashed()->where('id', $request->rClient)->restore();
        return to_route("index");

    }

    public function r_training(Request $request)
    {

        Training::withTrashed()->where('id', $request->rTraining)->restore();
        return to_route("get.trainings");

    }

    public function r_user(Request $request)
    {

        User::withTrashed()->where('id', $request->ruser)->restore();
        return to_route("get.users");

    }
}