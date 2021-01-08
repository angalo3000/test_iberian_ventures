@extends('layouts.app')

@section('content')
<div class="container">
    <h4>If you are considering selling your company, one of the fundamental questions is <span style="color: red">"How much is my company worth?"</span>  - It is important that you have an idea of ​​what the value of your business is and what elements are relevant.</h4>
    <br>
    <h4>With a few pieces of information about your business, our tool will help you determine a valuation (that is, how much € you could receive)</h4>
    <br>
    <h4>This valuation form is useful for companies with <span style="color: red"> more than € 1M in sales per year</span></h4>
    <br>
    
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <button data-dismiss="alert" type="button" class="ml-2 mb-1 close">
            x
        </button>
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        <button data-dismiss="alert" type="button" class="ml-2 mb-1 close">
            x
        </button>
        {{ session('error') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Input Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="sector" class="col-md-5 col-form-label text-md-left">{{ __('Sector in which your company operates:') }}</label>

                            <div class="col-md-6">
                                <input id="sector" type="text" class="form-control @error('sector') is-invalid @enderror" name="sector" value="{{ old('sector') }}" autocomplete="sector" autofocus title="What industry do you compete in?" placeholder="Sector or industry">

                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-left">{{ __('Contact E-Mail:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" title="What is the email address of the person in charge?" placeholder="Contact email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avg_turnover_in_3yrs" class="col-md-5 col-form-label text-md-left">{{ __('Average turnover of the last 3 years (in €):') }}</label>

                            <div class="col-md-6">
                                <input id="avg_turnover_in_3yrs" type="number" class="form-control @error('avg_turnover_in_3yrs') is-invalid @enderror" name="avg_turnover_in_3yrs" value="{{ old('avg_turnover_in_3yrs') }}" autocomplete="avg_turnover_in_3yrs" title="Last year's income" placeholder="What was the billing for the last year?">

                                @error('avg_turnover_in_3yrs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="growth_years" class="col-md-5 col-form-label text-md-left">{{ __('Consecutive years growing income:') }}</label>

                            <div class="col-md-6">
                                <input id="growth_years" type="number" class="form-control @error('growth_years') is-invalid @enderror" name="growth_years" autocomplete="growth_years" value="0" min="0" title="How many consecutive years has the company had an increase in income?">

                                @error('growth_years')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avg_ebitda_in_3yrs" class="col-md-5 col-form-label text-md-left">{{ __('Average EBITDA of the last 3 years (in €):') }}</label>

                            <div class="col-md-6">
                                <input id="avg_ebitda_in_3yrs" type="number" class="form-control @error('avg_ebitda_in_3yrs') is-invalid @enderror" name="avg_ebitda_in_3yrs" value="{{ old('avg_ebitda_in_3yrs') }}" autocomplete="avg_ebitda_in_3yrs" title="What is the gross operating profit calculated before the deductibility of financial expenses?" placeholder="Net income before taxes and depreciation">

                                @error('avg_ebitda_in_3yrs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avg_net_result_in_3yrs" class="col-md-5 col-form-label text-md-left">{{ __('Average net result of the last 3 years (in €):') }}</label>

                            <div class="col-md-6">
                                <input id="avg_net_result_in_3yrs" type="number" class="form-control @error('avg_net_result_in_3yrs') is-invalid @enderror" name="avg_net_result_in_3yrs" value="{{ old('avg_net_result_in_3yrs') }}" autocomplete="consecutive_years_positive_result" title="What was the net result for the last year?" placeholder="Net result of the last year" min="0">

                                @error('avg_net_result_in_3yrs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="consecutive_years_positive_result" class="col-md-5 col-form-label text-md-left">{{ __('Consecutive years with positive result:') }}</label>

                            <div class="col-md-6">
                                <input id="consecutive_years_positive_result" type="number" class="form-control @error('consecutive_years_positive_result') is-invalid @enderror" name="consecutive_years_positive_result" autocomplete="consecutive_years_positive_result" title="How many consecutive years has there been a positive financial year result?" value="0" min="0">

                                @error('consecutive_years_positive_result')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="net_debt" class="col-md-5 col-form-label text-md-left">{{ __('Total net financial debt (in €):') }}</label>

                            <div class="col-md-6">
                                <input id="net_debt" type="number" class="form-control @error('net_debt') is-invalid @enderror" name="net_debt" value="{{ old('net_debt') }}" autocomplete="net_debt" title="What is the net financial debt of the company?" placeholder="Total net financial debt in Euros">

                                @error('net_debt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_fixed_assets" class="col-md-5 col-form-label text-md-left">{{ __('Total fixed assets (in €):') }}</label>

                            <div class="col-md-6">
                                <input id="total_fixed_assets" type="number" class="form-control @error('total_fixed_assets') is-invalid @enderror" name="total_fixed_assets" autocomplete="total_fixed_assets" title="What is the total fixed assets?" placeholder="Total fixed assets in euros">

                                @error('total_fixed_assets')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="largest_shareholder_percentage" class="col-md-5 col-form-label text-md-left">{{ __('Percentage of the largest shareholder company ?:') }}</label>

                            <div class="col-md-6">
                                <input id="largest_shareholder_percentage" type="number" class="form-control @error('largest_shareholder_percentage') is-invalid @enderror" name="largest_shareholder_percentage" value="{{ old('largest_customer_billing_percentage') }}" autocomplete="largest_customer_billing_percentage" title="What percentage of the company has the largest shareholder?" placeholder="Percentage of the company that has the largest shareholder" min="0" max="100">

                                @error('largest_shareholder_percentage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="largest_customer_billing_percentage" class="col-md-5 col-form-label text-md-left">{{ __('Percentage of billing that comes from the largest customer:') }}</label>

                            <div class="col-md-6">
                                <input id="largest_customer_billing_percentage" type="number" class="form-control @error('largest_customer_billing_percentage') is-invalid @enderror" name="largest_customer_billing_percentage" autocomplete="largest_customer_billing_percentage" title="What percentage of turnover does the largest customer have?" placeholder="Percentage of turnover represented by the largest customer" min="0" max="100">

                                @error('largest_customer_billing_percentage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="audited" class="col-md-5 col-form-label text-md-left">{{ __('Has the company ever been audited ?:') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('audited') is-invalid @enderror" name="audited" autocomplete="audited">
                                    <option {{ old('audited') == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                    <option {{ old('audited') == 'No' ? 'selected' : 'selected' }} value="No">No</option>
                                </select>
                                
                                @error('audited')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="operations_or_merges" class="col-md-5 col-form-label text-md-left">{{ __('Purchase operations or mergers in the last 5 years?') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('operations_or_merges') is-invalid @enderror" name="operations_or_merges" autocomplete="operations_or_merges">
                                    <option {{ old('operations_or_merges') == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                    <option {{ old('operations_or_merges') == 'No' ? 'selected' : 'selected' }} value="No">No</option>
                                </select>
                                
                                @error('operations_or_merges')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sell_company" class="col-md-5 col-form-label text-md-left">{{ __('Do you want to sell more than 90% of the company?') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('sell_company') is-invalid @enderror" name="sell_company" autocomplete="sell_company">
                                    <option {{ old('sell_company') == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                    <option {{ old('sell_company') == 'No' ? 'selected' : 'selected' }} value="No">No</option>
                                </select>
                                
                                @error('sell_company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-md-4">
                                <button type="submit" class="form-control btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                                <br>
                                <span>We are reviewing your information</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
