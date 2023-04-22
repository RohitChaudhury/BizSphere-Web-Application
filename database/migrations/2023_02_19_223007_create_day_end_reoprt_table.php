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
        Schema::create('day_end_reoprt', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('project_id');
            $table->string('module_id');
            $table->string('completion_weightage');
            $table->string('team_member_comment');
            $table->string('team_lead_comment')->nullable();
            $table->string('manager_comment')->nullable();
            $table->string('approval_status')->nullable();
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
        Schema::dropIfExists('day_end_reoprt');
    }
};
?>