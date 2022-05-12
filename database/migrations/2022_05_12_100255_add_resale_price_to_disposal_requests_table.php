<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResalePriceToDisposalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disposal_requests', function (Blueprint $table) {
            //
            $table->string('resale_price')->default('0');
            $table->string('qty')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disposal_requests', function (Blueprint $table) {
            //
            $table->string('resale_price')->default('0');
            $table->string('qty')->default('0');
        });
    }
}
