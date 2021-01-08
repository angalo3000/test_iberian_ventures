<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'sector',
        'email',
        'revenue',
        'growth_years',
        'avg_ebitda_in_3yrs',
        'avg_turnover_in_3yrs',
        'avg_net_result_in_3yrs',
        'consecutive_years_positive_result',
        'net_debt',
        'total_fixed_assets',
        'largest_shareholder_percentage',
        'largest_customer_billing_percentage',
        'audited',
        'operations_or_merges',
        'sell_company',

        'ebitda_rev',
        'net_margin',
        'deuda_ebitda',
        'asset_to_revenue',
    ];
}
