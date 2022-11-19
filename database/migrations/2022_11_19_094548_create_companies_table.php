<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->nullable();
            $table->unsignedBigInteger('organizations_id');
            $table->foreign('id')->references('organizations_id')->on('organizations');
            $table->unsignedBigInteger('industries_id');
            $table->foreign('id')->references('industries_id')->on('industries');
            $table->longText('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->longText('business_info')->nullable();
            $table->string('logo')->nullable();
            $table->text('web_url')->nullable();
            $table->enum('status', [1, 0])->default(1);
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
        Schema::dropIfExists('companies');
    }
}
