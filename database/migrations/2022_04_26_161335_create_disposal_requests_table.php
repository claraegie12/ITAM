<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposal_requests', function (Blueprint $table) {
            $table->id();
            $table->string('Asset_id');
            $table->string('Notes');
            $table->string('Approval');
            $table->date('Approval_date');
            $table->string('Approval_by');
            $table->date('Disposal_date');
            $table->string('Disposal_by');
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
        Schema::dropIfExists('disposal_requests');
    }
}
