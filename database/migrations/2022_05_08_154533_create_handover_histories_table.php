<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandoverHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handover_histories', function (Blueprint $table) {
            $table->id();
            $table->string('Asset_id');
            $table->string('Pegawai_id');
            $table->string('Handover_notes');
            $table->date('Handover_date');
            $table->string('Handover_by');
            $table->string('flag')->default('0');
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
        Schema::dropIfExists('handover_histories');
    }
}
