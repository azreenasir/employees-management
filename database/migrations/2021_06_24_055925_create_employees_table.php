<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'last_name');
            $table->string(column: 'first_name');
            $table->string(column: 'middle_name')->nullable();
            $table->string(column: 'address');
            $table->foreignId(column: 'department_id')->constrained();
            $table->foreignId(column: 'country_id')->constrained();
            $table->foreignId(column: 'state_id')->constrained();
            $table->foreignId(column: 'city_id')->constrained();
            $table->char(column: 'zip_code');
            $table->date(column: 'birthdate')->nullable();
            $table->date(column: 'date_hired')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
