<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('function_area_id')
            ->constrained('function_areas')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('title');
            $table->char('vancy',3);
            $table->date('expire_date');
            $table->enum('gender',['male','female','any']);
            $table->string('language')->nullable();
            $table->string('salary')->nullable();
            $table->string('contract_preiod')->nullable();
            $table->string('location');
            $table->string('apply_email')->nullable()->unique();
            $table->string('apply_form')->nullable();
            $table->boolean('is_dari')->default(false);
            $table->longText('company_information');
            $table->longText('job_description');
            $table->longText('job_requirements');
            $table->longText('apply_description');
            $table->enum('time',['part_time','full_time']);
            $table->string('experince')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('job_posts');
    }
};
