<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('Request_id');
            $table->string('Contract_id');
            $table->string('Approval');
            $table->date('Approval_date');
            $table->string('Description');
            $table->string('Approved_by');
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
        Schema::dropIfExists('asset_approvals');
    }
}
