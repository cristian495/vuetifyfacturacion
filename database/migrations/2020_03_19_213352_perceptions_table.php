<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perceptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->uuid('external_id');
            $table->unsignedInteger('establishment_id')->nullable();
            $table->json('establishment');
            $table->char('soap_type_id', 2);
            $table->char('state_type_id', 2);
            $table->string('ubl_version');
            $table->string('document_type_id');
            $table->char('series', 4);
            $table->integer('number');
            $table->date('date_of_issue');
            $table->time('time_of_issue');
            $table->unsignedInteger('customer_id')->nullable();
            $table->json('customer');
            $table->string('perception_type_id');
            $table->text('observations')->nullable();
            $table->string('currency_type_id');
            $table->decimal('total_perception', 10, 2);
            $table->decimal('total', 10, 2);

            $table->json('legends')->nullable();
            $table->json('optional')->nullable();

            $table->string('filename')->nullable();
            $table->string('hash')->nullable();
            $table->boolean('has_xml')->default(false);
            $table->boolean('has_pdf')->default(false);
            $table->boolean('has_cdr')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->foreign('soap_type_id')->references('id')->on('soap_types');
            $table->foreign('state_type_id')->references('id')->on('state_types');
            $table->foreign('document_type_id')->references('id')->on('cat_document_types');
            $table->foreign('customer_id')->references('id')->on('persons');
            $table->foreign('perception_type_id')->references('id')->on('cat_perception_types');
            $table->foreign('currency_type_id')->references('id')->on('cat_currency_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perceptions');
        //
    }
}
