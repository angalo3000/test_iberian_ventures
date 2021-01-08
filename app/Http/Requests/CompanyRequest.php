<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sector'                                =>  'required|max:255',
            'email'                                 =>  'required|email',
            'avg_turnover_in_3yrs'                  =>  'required|integer',
            'growth_years'                          =>  'required|integer',
            'avg_ebitda_in_3yrs'                    =>  'required|integer',
            'avg_net_result_in_3yrs'                =>  'required|integer',
            'consecutive_years_positive_result'     =>  'required|integer',
            'net_debt'                              =>  'required|integer',
            'total_fixed_assets'                    =>  'required|integer',
            'largest_shareholder_percentage'        =>  'required|integer',
            'largest_customer_billing_percentage'   =>  'required|integer',
            'audited'                               =>  'required|max:255',
            'operations_or_merges'                  =>  'required|max:255',
            'sell_company'                          =>  'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'sector.required'                                =>  'The Sector field in which it operates is required.',
            'email.required'                                 =>  'The Contact Email field is required.',
            'email.email'                                    =>  'The Contact Email field must be an e-mail.',
            'avg_turnover_in_3yrs.required'                  =>  'The field Average turnover of the last 3 years (in €) is required.',
            'avg_ebitda_in_3yrs.required'                    =>  'The average EBITDA field of the last 3 years (in €) is required.',
            'avg_net_result_in_3yrs.required'                =>  'The field Average net result of the last 3 years (in €) is required.',
            'net_debt.required'                              =>  'The field Total net financial debt (in €) is required.',
            'total_fixed_assets.required'                    =>  'The Total fixed assets field (in €) is required.',
            'largest_shareholder_percentage.required'        =>  'The field Percentage of the company of the largest shareholder? it is required.',
            'largest_customer_billing_percentage.required'   =>  'The field Percentage of billing that comes from the largest customer is required.',
        ];
    }
}
