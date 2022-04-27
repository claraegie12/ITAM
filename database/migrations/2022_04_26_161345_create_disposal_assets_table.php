<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposalAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposal_assets', function (Blueprint $table) {
            $table->id();
            $table->string('Asset_id');
            $table->string('Disposal_id');
            $table->string('Disposal_reason');
            $table->float('Resale_price');
            $table->date('Retired_date');
            $table->date('Schedule_Retired');
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
        Schema::dropIfExists('disposal_assets');
    }
}
