<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('worksheets', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('worksheet_id')->references('id')->on('worksheets')->onDelete('cascade');
        });

        Schema::table('student_worksheets', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('worksheet_id')->references('id')->on('worksheets')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('worksheets', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['worksheet_id']);
        });

        Schema::table('student_worksheets', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['worksheet_id']);
        });
    }
};
