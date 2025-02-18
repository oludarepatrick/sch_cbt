<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class')->unique();
            $table->timestamps();
        });
        
        // Insert predefined classes
         $classes = [
            'RECEPTION 1', 
            'RECEPTION 2', 
            'BASIC 1', 
            'BASIC 2', 
            'BASIC 3', 
            'BASIC 4', 
            'BASIC 5'
        ];

        foreach ($classes as $class) {
            DB::table('classes')->insert([
                'class' => $class,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
