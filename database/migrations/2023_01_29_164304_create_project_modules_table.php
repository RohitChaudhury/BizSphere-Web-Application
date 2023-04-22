<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_modules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('module_name');
            $table->string('project_id');
            $table->string('module_weightage')->default('0');
            $table->string('completion_percentage')->default('0%');

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
        Schema::dropIfExists('project_module');
    }
};