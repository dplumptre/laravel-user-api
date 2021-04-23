<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

  


     


      
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Member');
            $table->string('Name');
            $table->string('AccountType');
            $table->string('BirthDate')->nullable();
            $table->string('Guardian')->nullable();
            $table->string('Address1');
            $table->string('City')->nullable();
            $table->string('Country')->nullable();
            $table->string('Postal')->nullable();
            $table->string('Phone1');
            $table->string('Phone2')->nullable();
            $table->string('Email');
            $table->string('BankName')->nullable();
            $table->string('BankAccNo')->nullable();
            $table->string('BOPDate')->nullable();
            $table->string('REQDate')->nullable();
            $table->string('NXPhone')->nullable();
            $table->string('AltEMail')->nullable();
            $table->string('Gender');
            $table->string('RCNumber')->nullable();
            $table->string('Citizen')->nullable();
            $table->string('MadianName')->nullable();
            $table->string('NIMCNo')->nullable();
            $table->string('CPPhone')->nullable();
            $table->string('CPName')->nullable();
            $table->string('NXCHN')->nullable();
            $table->string('State')->nullable();
            $table->string('RefNo');
            $table->string('LGA')->nullable();
            $table->string('SortCode')->nullable();
            $table->string('BankAccountname')->nullable();
            $table->string('RCDate')->nullable();
            $table->string('BVN')->nullable();
            $table->string('TaxId')->nullable();
            $table->string('chn')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->string('cscs_no')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
