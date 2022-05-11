<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagProcurementToAssetApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asset_approvals', function (Blueprint $table) {
            //
            $table->string('flag_prucurement')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_approvals', function (Blueprint $table) {
            //
            $table->string('flag_prucurement')->default('0');
        });
    }
}
