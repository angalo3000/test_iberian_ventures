<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'result_id',
        'result_revenue',
        'result_avg_turnover_in_3yrs',
        'result_growth_years',
        'result_avg_ebitda_in_3yrs',
        'result_avg_net_result_in_3yrs',
        'result_consecutive_years_positive_result',
        'result_net_debt',
        'result_fixed_assets',
        'result_largest_shareholder_percentage',
        'result_largest_customer_billing_percentage',
        'result_audited',
        'result_operations_or_merges',
        'result_sell_company',
        
        'result_ebitda_rev',
        'result_net_margin',
        
        'total_score',
        'decision',
    ];
}
