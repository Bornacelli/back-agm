<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('automoviles', function (Blueprint $table) {
            $table->id('auto_id');
            $table->string('auto_name', 100);
            $table->string('auto_modelo', 50);
            $table->string('auto_marca', 50);
            $table->string('auto_pais', 100);
            $table->timestamp('fechacreate')->useCurrent();
            $table->timestamp('fechaupdate')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('automoviles');
    }
};