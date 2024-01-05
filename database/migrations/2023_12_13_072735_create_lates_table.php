<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lates', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->char('student_id', 36);
            $table->foreign('student_id')->unsigned()->references('id')->on('students')->onDelete('cascade');
            $table->dateTime('date_time_late');
            $table->text('information');
            $table->string('bukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lates');
    }
};
