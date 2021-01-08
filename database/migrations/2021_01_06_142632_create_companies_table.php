<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->string('email');
            $table->decimal('revenue', 12, 2)->default(0);
            $table->decimal('avg_turnover_in_3yrs', 12, 2)->default(0);
            $table->integer('growth_years')->nullable();
            $table->decimal('avg_ebitda_in_3yrs', 12, 2)->default(0);
            $table->decimal('avg_net_result_in_3yrs', 12, 2)->default(0);
            $table->integer('consecutive_years_positive_result')->nullable();
            $table->decimal('net_debt', 12, 2)->default(0);
            $table->decimal('total_fixed_assets', 12, 2)->default(0);
            $table->decimal('largest_shareholder_percentage', 5, 1)->default(0);
            $table->decimal('largest_customer_billing_percentage', 5, 1)->default(0);
            $table->string('audited');
            $table->string('operations_or_merges');
            $table->string('sell_company');

            $table->decimal('ebitda_rev', 12, 1)->default(0);
            $table->decimal('net_margin', 12, 1)->default(0);
            $table->decimal('deuda_ebitda', 12, 2)->default(0);
            $table->decimal('asset_to_revenue', 12, 2)->default(0);

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
        Schema::dropIfExists('companies');
    }
}
