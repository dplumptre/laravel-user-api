<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use RefreshDatabase;

class OpenAccountTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_post_to_cscs_api()
    {

        $response = $this->postJson('/api/add-account', [
            "Member"=> "UBAS",
            "AccountType"=> "I",
            "NIN"=> "",
            "BirthDate"=> "19890520",
            "Name"=> "Michael Power",
            "Guardian"=> "MOHORRET",
            "Address1"=> "jos pleateau",
            "Address2"=> "jos pleateau",
            "Address3"=> "",
            "City"=> "Oshodi, Isolo  ",
            "Country"=> "NG",
            "Postal"=> "23401",
            "Phone1"=> "08139488425",
            "Phone2"=> "07013086677",
            "Email"=> "patrick@yahoo.com",
            "BankName"=> "UBA",
            "BankAccNo"=> "2124176546",
            "BOPDate"=> "20200902",
            "REQDate"=> "20200902",
            "NXPhone"=> "08086041428",
            "AltEMail"=> "olumotabolajiseun@gmail.com",
            "Gender"=> "M",
            "RCNumber"=> "",
            "Citizen"=> "NG",
            "MadianName"=> "VICTORIA",
            "RefNo"=> "9876",
            "NIMCNo"=> "2222345557",
            "CPPhone"=> "08139487425",
            "CPName"=> "CHRISTOPHER",
            "NXCHN"=> "",
            "State"=> "OSUN",
            "LGA"=> "Aiyedaade",
            "SortCode"=> "4000120150",
            "BankAccountname"=> "OLUMOTA OLUWASEUN",
            "RCDate"=> "20190802",
            "BVN"=> "22224591416",
            "TaxId"=> "1230",
        ]);

        $response->dump(); // tells me the error

        $response->assertStatus(200);
    }
}
