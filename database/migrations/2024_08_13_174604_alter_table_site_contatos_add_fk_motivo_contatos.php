<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id')->nullable();
        });

        DB::statement('UPDATE site_contatos SET motivo_contatos_id = motivo_contato');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

        DB::statement('ALTER TABLE site_contatos ALTER COLUMN motivo_contatos_id SET NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato')->nullable();
        });

        DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
            $table->dropColumn('motivo_contatos_id');
        });

        DB::statement('ALTER TABLE site_contatos ALTER COLUMN motivo_contato SET NOT NULL');
    }
};
