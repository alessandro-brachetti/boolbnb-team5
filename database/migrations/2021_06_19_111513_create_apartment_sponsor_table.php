<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_sponsor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id')->nullable();

            $table->foreign('apartment_id')
                ->references('id')
                ->on('apartments');
  
            $table->unsignedBigInteger('sponsor_id')->nullable();
  
            $table->foreign('sponsor_id')
                ->references('id')
                ->on('sponsors');
            $table->boolean('active')->default(0);
            $table->timestamp('created_at');
            $table->date('expiration_date');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_sponsor');
    }
}
