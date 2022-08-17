<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners');
            $table->foreignId('address_id')->constrained('addresses');
            $table->string('partner');
            $table->string('cpf');
            $table->string('cnpj');
            $table->string('corporate_name');
            $table->string('fantasy_name');
            $table->string('telephone');
            $table->string('branch_of_activity');
            $table->string('image_store');
            $table->string('store_banner');
            $table->string('status');
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
        Schema::dropIfExists('stores');
    }
}
