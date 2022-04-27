<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_trackings', function (Blueprint $table) {
            $table->id();
            $table->string('Asset_id');
            $table->string('Tracking_strategy');
            $table->string('Tracking_unit');
            $table->string('State');
            $table->string('State_type');
            $table->string('Substate_type');
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
        Schema::dropIfExists('asset_trackings');
    }
}
