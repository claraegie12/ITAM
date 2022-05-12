<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovalToAssetHandoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asset_handovers', function (Blueprint $table) {
            //
            $table->string('handover_approval')->default('0');
            $table->string('return_approval')->default('0');
            $table->string('return_to')->default('IT');
            $table->datetime('return_date')->nullable();
            $table->string('return_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_handovers', function (Blueprint $table) {
            //
            $table->string('handover_approval')->default('0');
            $table->string('return_approval')->default('0');
            $table->string('return_to')->default('IT');
            $table->datetime('return_date')->nullable();
            $table->string('return_notes')->nullable();
        });
    }
}
