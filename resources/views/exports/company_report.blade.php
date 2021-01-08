
<table>
    <thead>
        <tr>
            <th>Sector</th>
            <th>Email</th>
            <th>Revenue</th>
            <th>Net Debt</th>
            <th>Fixed Assets</th>
            <th>Selling</th>

            <th>EBITDA/Rev</th>
            <th>Net Margin</th>
            <th>Deuda/EBITDA</th>
            <th>Assets to revenue Ratio</th>
            <th>Total Score</th>
            <th>Decision</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->sector }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ number_format($company->revenue, 2, ".", ",") }}</td>
                <td>{{ number_format($company->net_debt, 2, ".", ",") }}</td>
                <td>{{ number_format($company->total_fixed_assets, 2, ".", ",") }}</td>
                <td>{{ $company->sell_company }}</td>

                <td>{{ $company->ebitda_rev }}</td>
                <td>{{ $company->net_margin }}</td>
                <td>{{ $company->deuda_ebitda }}</td>
                <td>{{ $company->asset_to_revenue }}</td>
                <td>{{ $company->total_score }}</td>
                <td>{{ $company->decision }}</td>
            </tr>
        @endforeach
    </tbody>
</table>