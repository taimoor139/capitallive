<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('activation_status')->nullable();
            $table->string('number')->nullable();
            $table->string('country')->nullable();
            $table->string('gender')->nullable();
            $table->string('placement_id')->nullable();
            $table->string('position')->nullable();
            $table->string('left_count')->nullable();
            $table->string('right_count')->nullable();
            $table->string('rank')->nullable();
            $table->string('status')->nullable();
            $table->string('membership_status')->nullable();
            $table->string('left_side')->nullable();
            $table->string('right_side')->nullable();
            $table->string('left_active')->nullable();
            $table->string('right_active')->nullable();
            $table->string('current_team_id')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('two_factor_secret')->nullable();
            $table->string('two_factor_recovery_codes')->nullable();
            $table->integer('role_id')->default(2)->comment('1 for Admin, 2 for normal user');
            $table->string('referal_token')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sponsor')->nullable();
            $table->string('terms')->nullable();
            $table->string('birth')->nullable();
            $table->string('national_id')->nullable();
            $table->string('image')->nullable();
            $table->string('nominee')->nullable();
            $table->string('nominee_email')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
