<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassClassArmDobGenderToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('class')->nullable()->after('is_admin');
            $table->string('class_arm')->nullable()->after('class');
            $table->date('dob')->nullable()->after('class_arm');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('dob');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('class');
            $table->dropColumn('class_arm');
            $table->dropColumn('dob');
            $table->dropColumn('gender');
        });
    }
}
