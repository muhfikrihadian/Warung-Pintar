<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('akses');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Admin Warung Pintar",
            'email' => "adminwarung@gmail.com",
            'password' => Hash::make("adminwarung"),
            'akses' => "Admin"
        ]);

        DB::table('users')->insert([
            'name' => "Super Admin Warung Pintar",
            'email' => "superadminwarung@gmail.com",
            'password' => Hash::make("superadminwarung"),
            'akses' => "SuperAdmin"
        ]);
        DB::table('users')->insert([
            'name' => "Kasir Warung Pintar",
            'email' => "kasirwarung@gmail.com",
            'password' => Hash::make("kasirwarung"),
            'akses' => "Kasir"
        ]);
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
