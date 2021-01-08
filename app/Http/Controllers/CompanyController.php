<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Result;
use Illuminate\Http\Request;
use Storage;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\Cache;

use App\Exports\UsersExport;
use App\Http\Requests\CompanyRequest;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return \view('company.index', compact('companies'));
    }

    public function create_excel($id)
    {
        $name = 'company_data.xlsx';
        return Excel::store(new UsersExport($id), $name);
    }
    
    public function excel($id)
    {
        $this->create_excel($id);

        $from_name = 'Ang';
        $from_email = 'angalo3000@gmail.com';
        $to_name = 'Test';
        $to_email= 'angalo3000@gmail.com';
        $data = array("name" => 'ww', "paydate" => 'dd');
        $filename = 'payslip/payslip.pdf';
        $excel = Storage::path('company_data.xlsx');
        // error_log($pdf2);
        Mail::send('company.mail', $data, function ($message) use ($to_name, $to_email, $from_email, $from_name, $excel) {
            $message->from($from_email, $from_name);
            $message->to($to_email, $to_name);
            $message->subject('Company Report');
            $message->attach($excel);
        });
    }
    
    public function store(CompanyRequest $request)
    {

        $revenue = $request->avg_turnover_in_3yrs;
        $avg_ebitda_in_3yrs = $request->avg_ebitda_in_3yrs;
        $avg_net_result_in_3yrs = $request->avg_net_result_in_3yrs;
        $net_debt = $request->net_debt;
        $total_fixed_assets = $request->total_fixed_assets;

        if ($revenue == 0) {
            $ebitda_rev = $revenue;
            $net_margin = $revenue;
            $asset_to_revenue = $asset_to_revenue;
        } else {
            $ebitda_rev = $avg_ebitda_in_3yrs / $revenue;
            $ebitda_rev = $ebitda_rev * 100;

            $net_margin = $avg_net_result_in_3yrs / $revenue;
            $net_margin = $net_margin * 100;

            $asset_to_revenue = $total_fixed_assets / $revenue;
        }

        if ($avg_ebitda_in_3yrs == 0) {
            $deuda_ebitda = $avg_ebitda_in_3yrs;
        } else {
            $deuda_ebitda = $net_debt / $avg_ebitda_in_3yrs;
        }

        $request->request->add([ 'revenue' => $revenue, 'ebitda_rev' => $ebitda_rev, 'net_margin' => $net_margin, 'deuda_ebitda' => $deuda_ebitda, 'asset_to_revenue' => $asset_to_revenue ]); //add request

        $store = Company::create($request->all());
        
        $result_id = $store->id;
        $result_avg_turnover_in_3yrs = ($revenue >= 1500000 && $revenue <= 10000000) ? 1 : 0 ;
        $result_growth_years = ($request->growth_years >= 3) ? 1 : 0 ;
        $result_avg_ebitda_in_3yrs = ($request->avg_ebitda_in_3yrs >= 150000) ? 1 : -100 ;
        $result_avg_net_result_in_3yrs = ($request->avg_net_result_in_3yrs >= 70000 ) ? 1 : 0 ;
        $result_consecutive_years_positive_result = ($request->consecutive_years_positive_result >= 3) ? 1 : 0 ;
        $result_net_debt = ($deuda_ebitda <= 2) ? 1 : (( $deuda_ebitda > 3 ) ? -100 : 0) ;
        $result_fixed_assets = ($asset_to_revenue <= 1.5) ? 1 : 0 ;
        $result_largest_shareholder_percentage = ($request->largest_shareholder_percentage >= 65) ? 1 : 0 ;
        $result_largest_customer_billing_percentage = ($request->largest_customer_billing_percentage  <= 40) ? 1 : 0 ;
        $result_audited = ($request->audited == 'Yes') ? 1 : 0 ;
        $result_operations_or_merges = ($request->operations_or_merges == 'No') ? 1 : 0 ;
        $result_sell_company = ($request->sell_company == 'Yes') ? 1 : -100 ;
        $result_ebitda_rev = ($ebitda_rev >= 7) ? 1 : 0 ;
        $result_net_margin = ($net_margin >= 5) ? 1 : 0 ;

        $total_score = $result_net_margin + $result_ebitda_rev + $result_sell_company + $result_operations_or_merges + $result_audited + $result_largest_customer_billing_percentage + $result_largest_shareholder_percentage
                + $result_fixed_assets + $result_net_debt + $result_consecutive_years_positive_result + $result_avg_net_result_in_3yrs + $result_avg_ebitda_in_3yrs + $result_growth_years + $result_avg_turnover_in_3yrs;

        $decision = ($total_score >= 10) ? "GO" : "NO-GO" ;

        $result_array = array(
            'result_id'    =>  $result_id,
            'result_avg_turnover_in_3yrs'                       =>  $result_avg_turnover_in_3yrs,
            'result_revenue'                                    =>  $result_avg_turnover_in_3yrs,
            'result_growth_years'                               =>  $result_growth_years,
            'result_avg_ebitda_in_3yrs'                         =>  $result_avg_ebitda_in_3yrs,
            'result_avg_net_result_in_3yrs'                     =>  $result_avg_net_result_in_3yrs,
            'result_consecutive_years_positive_result'          =>  $result_consecutive_years_positive_result,
            'result_net_debt'                                   =>  $result_net_debt,
            'result_fixed_assets'                               =>  $result_fixed_assets,
            'result_largest_shareholder_percentage'             =>  $result_largest_shareholder_percentage,
            'result_largest_customer_billing_percentage'        =>  $result_largest_customer_billing_percentage,
            'result_audited'                                    =>  $result_audited,
            'result_operations_or_merges'                       =>  $result_operations_or_merges,
            'result_sell_company'                               =>  $result_sell_company,
            'result_ebitda_rev'                                 =>  $result_ebitda_rev,
            'result_net_margin'                                 =>  $result_net_margin,
            'total_score'                                       =>  $total_score,
            'decision'                                          =>  $decision,
        );

        Result::create($result_array);

        $this->excel($store->id);

        if ($decision == "GO") {
            Session::flash('success', 'Thanks for sending information about your company. It seems to fit “Iberian Ventures” investment criteria – an associate in the team will reach out to you for next steps.');
        } else {
            Session::flash('error', 'Thanks for sending information about your company. Unfortunately, it seems that this company does not meet “Iberian 3 Ventures” investment criteria. Regardless, we will take a second look in detail and send you an email.');
        }
        Cache::forget('records');

        return Redirect::route('company.index');
    }
}
