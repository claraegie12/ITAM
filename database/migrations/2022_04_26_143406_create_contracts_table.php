<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->float('Cost');
            $table->string('Vendor_id');
            $table->string('Description');
            $table->string('Contract_model');
            $table->string('Aquisition_method');
            $table->string('Expendiature_type');
            $table->string('Cost_currently');
            $table->string('Cost_center');
            $table->string('Member_firm');
            $table->string('Created_by');
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
        Schema::dropIfExists('contracts');
    }
}
