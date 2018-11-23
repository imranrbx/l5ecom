<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("billing_firstName");
            $table->string("billing_lastName");
            $table->string("username");
            $table->string("email");
            $table->string("billing_address1");
            $table->string("billing_address2");
            $table->string("billing_country");
            $table->string("billing_state");
            $table->string("billing_zip");
            $table->string("shipping_firstName")->nullable();
            $table->string("shipping_lastName")->nullable();
            $table->string("shipping_address1")->nullable();
            $table->string("shipping_address2")->nullable();
            $table->string("shipping_country")->nullable();
            $table->string("shipping_state")->nullable();
            $table->string("shipping_zip")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
