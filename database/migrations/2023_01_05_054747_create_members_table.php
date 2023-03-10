<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser');
            $table->foreignId('idToko');
            $table->string('namaMember');
            $table->string('kodeMember');
            $table->string('email');
            $table->string('password');
            $table->string('noHp');
            $table->string('alamat');
            $table->date('tanggalLahir');
            $table->integer('point')->default(0);
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
        Schema::dropIfExists('members');
    }
}
