<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchase');
            $table->foreignId('status_id')->constrained('purchase_status_references');
            $table->string('commit', 255)->nullable();
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
        Schema::dropIfExists('purchase_statuses');
    }
}
