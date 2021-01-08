<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('result_id');
            $table->integer('result_revenue');
            $table->integer('result_avg_turnover_in_3yrs');
            $table->integer('result_growth_years');
            $table->integer('result_avg_ebitda_in_3yrs');
            $table->integer('result_avg_net_result_in_3yrs');
            $table->integer('result_consecutive_years_positive_result');
            $table->integer('result_net_debt');
            $table->integer('result_fixed_assets');
            $table->integer('result_largest_shareholder_percentage');
            $table->integer('result_largest_customer_billing_percentage');
            $table->integer('result_audited');
            $table->integer('result_operations_or_merges');
            $table->integer('result_sell_company');

            $table->integer('result_ebitda_rev');
            $table->integer('result_net_margin');

            $table->integer('total_score');
            $table->string('decision');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
