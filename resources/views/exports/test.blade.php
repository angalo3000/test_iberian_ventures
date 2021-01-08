<table>
    <thead>
        <th>Field</th>
        <th>Value</th>
        <th>Result</th>
    </thead>
</table>
<table>
    @foreach($companies as $company)
    <tr>
        <th>Revenue:</th>
        <td>{{ number_format($company->avg_turnover_in_3yrs, 2, ".", ",") }}</td>
        {{-- <td>{{ number_format($company->avg_turnover_in_3yrs, 2, '.', '') }}</td> --}}
        <td>{{ $company->result_revenue }}</td>
        <td></td>
        <td>Total Score</td>
        <td>{{ $company->total_score }}</td>
    </tr>
    <tr>
        <th>Years of growth</th>
        <td>{{ $company->growth_years }}</td>
        <td>{{ $company->result_growth_years }}</td>
    </tr>
    <tr>
        <th>Avg EBITDA last 3 years</th>
        <td>{{ number_format($company->avg_ebitda_in_3yrs, 2, ".", ",") }}</td>
        <td>{{ $company->result_avg_ebitda_in_3yrs }}</td>
        <td></td>
        <td>Decision</td>
        <td>{{ $company->decision }}</td>
    </tr>
    <tr>
        <th>Avg. net result last 3 years</th>
        <td>{{ number_format($company->avg_net_result_in_3yrs, 2, ".", ",") }}</td>
        <td>{{ $company->result_avg_net_result_in_3yrs }}</td>
    </tr>
    <tr>
        <th>Years with positive net results</th>
        <td>{{ $company->consecutive_years_positive_result }}</td>
        <td>{{ $company->result_consecutive_years_positive_result }}</td>
        <td></td>
        <td>Sector</td>
        <td>{{ $company->sector }}</td>
    </tr>
    <tr>
        <th>Net debt</th>
        <td>{{ number_format($company->net_debt, 2, ".", ",") }}</td>
        <td>{{ $company->result_net_debt }}</td>
    </tr>
    <tr>
        <th>Fixed assets</th>
        <td>{{ number_format($company->total_fixed_assets, 2, ".", ",") }}</td>
        <td>{{ $company->result_fixed_assets }}</td>
        <td></td>
        <td>Contact E-mail</td>
        <td>{{ $company->email }}</td>
    </tr>
    <tr>
        <th>% biggest shareholder</th>
        <td>{{ $company->largest_shareholder_percentage }}%</td>
        <td>{{ $company->result_largest_shareholder_percentage }}</td>
    </tr>
    <tr>
        <th>% revenue from biggest client</th>
        <td>{{ $company->largest_customer_billing_percentage }}%</td>
        <td>{{ $company->result_largest_customer_billing_percentage }}</td>
    </tr>
    <tr>
        <th>Is the company audited? (Yes/No)</th>
        <td>{{ $company->audited }}</td>
        <td>{{ $company->result_audited }}</td>
    </tr>
    <tr>
        <th>m{{ '&' }}a in the last 5 years? (Yes/No)</th>
        <td>{{ $company->operations_or_merges }}</td>
        <td>{{ $company->result_operations_or_merges }}</td>
    </tr>
    <tr>
        <th>Selling 90%? (Yes/No)</th>
        <td>{{ $company->sell_company }}</td>
        <td>{{ $company->result_sell_company }}</td>
    </tr>
    <tr>
        <th></th>
    </tr>
    <tr>
        <th>EBITDA/Rev</th>
        <td>{{ $company->ebitda_rev }}%</td>
        <td>{{ $company->result_ebitda_rev }}</td>
    </tr>
    <tr>
        <th>Net margin</th>
        <td>{{ $company->net_margin }}%</td>
        <td>{{ $company->result_net_margin }}</td>
    </tr>
    <tr>
        <th>Deuda/EBITDA</th>
        <td>{{ $company->deuda_ebitda }}</td>
    </tr>
    <tr>
        <th>Asset to revenue ratio</th>
        <td>{{ $company->asset_to_revenue }}</td>
    </tr>
    @endforeach
</table>