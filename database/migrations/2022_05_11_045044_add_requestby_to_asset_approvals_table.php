<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequestbyToAssetApprovalsTable extends Migration
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
            $table->string('request_by')->default('IT');
            $table->string('DO_number')->nullable();
            $table->string('PO_number')->nullable();
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
            $table->string('request_by')->default('IT');
            $table->string('DO_number')->nullable();
            $table->string('PO_number')->nullable();
        });
    }
}
