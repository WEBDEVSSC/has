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
        Schema::table('denuncia_documentacion', function (Blueprint $table) {
            $table->renameColumn('folio', 'id_denuncia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia_documentacion', function (Blueprint $table) {
            $table->renameColumn('id_denuncia', 'folio');
        });
    }
};
