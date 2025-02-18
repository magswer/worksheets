<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyWorksheetsTable extends Migration
{
    public function up(): void
    {
        Schema::table('worksheets', function (Blueprint $table) {
            $table->dropColumn(['sent_to', 'is_completed']);
            $table->json('content')->nullable();  
        });
    }

    public function down(): void
    {
        Schema::table('worksheets', function (Blueprint $table) {
            $table->unsignedBigInteger('sent_to');
            $table->boolean('is_completed')->default(false);
            
            $table->dropColumn('content');
        });
    }
}
