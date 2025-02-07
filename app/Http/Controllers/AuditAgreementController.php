<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditAgreement;
use App\Models\Client;
use DB;
use PDF;


class AuditAgreementController extends Controller
{
    public function index()
    {
        return view('agreement');
    }

    public function genrateAgreement()
    {
        // Fetch all agreements along with their associated clients
        $agreements = DB::table('agreements')
            ->join('clients', 'agreements.client_id', '=', 'clients.id')
            ->select('agreements.*', 'clients.fname as client_fname', 'clients.lname as client_lname')
            ->get();

        // Get all clients with their id and name
        $clients = Client::all();



        return view('agreement.genrateagreement', ['clients' => $clients, 'agreement' => $agreements]);
    }

    public function genrateAgreementPdf(Request $request)
    {
        $data = $request->all();

        try {
            // Convert arrays to delimiter-separated strings
            $terms = isset($data['term']) ? implode('||', $data['term']) : null;
            $parties = isset($data['party']) ? implode('||', $data['party']) : null;
            $contacts = isset($data['contact']) ? implode('||', $data['contact']) : null;
            $addresses = isset($data['address']) ? implode('||', $data['address']) : null;
            $emails = isset($data['email']) ? implode('||', $data['email']) : null;
            $deliveryMethods = isset($data['delivery_method']) ? implode('||', $data['delivery_method']) : null;
            $deemedDeliveries = isset($data['deemed_delivery']) ? implode('||', $data['deemed_delivery']) : null;
            $serviceDescriptions = isset($data['service_discription']) ? implode('||', $data['service_discription']) : null;
            $quantities = isset($data['quantity']) ? implode('||', $data['quantity']) : null;
            $fees = isset($data['fees']) ? implode('||', $data['fees']) : null;
            $termRates = isset($data['term_rate']) ? implode('||', $data['term_rate']) : null;

            // Save data in the agreements table
            DB::table('agreements')->insert([
                'client_id' => $data['client_id'],
                'date' => $data['date'],
                'company_name' => $data['company_name'],
                'company_address' => $data['company_address'],
                'terms' => $terms,
                'state' => $data['state'],
                'parties' => $parties,
                'contacts' => $contacts,
                'addresses' => $addresses,
                'emails' => $emails,
                'delivery_methods' => $deliveryMethods,
                'deemed_deliveries' => $deemedDeliveries,
                'service_descriptions' => $serviceDescriptions,
                'quantities' => $quantities,
                'fees' => $fees,
                'term_rates' => $termRates,
                'signed_by' => $data['signed_by'],
                'created_at' => now(),
            ]);

            return view('agreement.agreement', ['data' => $data]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getAgreementByClientId(Request $request, $client_id)
    {
        try {
            // Fetch agreement data for the given client_id
            $agreement = (array) DB::table('agreements')->where('client_id', $client_id)->first();

            if (!$agreement) {
                return response()->json(['message' => 'No agreement found for this client ID.'], 404);
            }

            // Convert delimiter-separated strings back to arrays
            $agreement['term'] = explode('||', $agreement['terms']);
            $agreement['party'] = explode('||', $agreement['parties']);
            $agreement['contact'] = explode('||', $agreement['contacts']);
            $agreement['address'] = explode('||', $agreement['addresses']);
            $agreement['email'] = explode('||', $agreement['emails']);
            $agreement['delivery_method'] = explode('||', $agreement['delivery_methods']);
            $agreement['deemed_delivery'] = explode('||', $agreement['deemed_deliveries']);
            $agreement['service_discription'] = explode('||', $agreement['service_descriptions']);
            $agreement['quantity'] = explode('||', $agreement['quantities']);
            $agreement['fees'] = explode('||', $agreement['fees']);
            $agreement['term_rate'] = explode('||', $agreement['term_rates']);

            // $pdf = PDF::loadView('agreement.agreement', ['data' => $agreement]);

            // return $pdf->stream('newagreement.pdf');

            // Send data to the view
            return view('agreement.agreement', ['data' => $agreement]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



}