<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Validator;
class AccountController extends Controller
{
    

    public function addAccount(Request $request) {


        $username = env('CSCS_USERNAME');
        $webtoken = env('CSCS_WEBTOKEN');

        $curl = curl_init();

    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://apitest.cscs.ng:8021/api/cscsAccount",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "
            {
                \"accountList\": [
                    {
                        \"Member\": \"$request->Member\",
                        \"AccountType\": \"$request->AccountType\",
                        \"NIN\": \"$request->NIN\",
                        \"BirthDate\": \"$request->BirthDate\",
                        \"Name\": \"$request->Name\",
                        \"Guardian\": \"$request->Guardian\",
                        \"Address1\": \"$request->Address1\",
                        \"Address2\": \"$request->Address2\",
                        \"Address3\": \"$request->Address3\",
                        \"City\": \"$request->City\",
                        \"Country\": \"$request->Country\",
                        \"Postal\": \"$request->Postal\",
                        \"Phone1\": \"$request->Phone1\",
                        \"Phone2\": \"$request->Phone2\",
                        \"Email\": \"$request->Email\",
                        \"BankName\": \"$request->BankName\",
                        \"BankAccNo\": \"$request->BankAccNo\",
                        \"BOPDate\": \"$request->BOPDate\",
                        \"REQDate\": \"$request->REQDate\",
                        \"NXPhone\": \"$request->NXPhone\",
                        \"AltEMail\": \"$request->AltEMail\",
                        \"Gender\": \"$request->Gender\",
                        \"RCNumber\": \"$request->RCNumber\",
                        \"Citizen\": \"$request->Citizen\",
                        \"MadianName\": \"$request->MadianName\",
                        \"RefNo\": \"$request->RefNo\",
                        \"NIMCNo\": \"$request->NIMCNo\",
                        \"CPPhone\": \"$request->CPPhone\",
                        \"CPName\": \"$request->CPName\",
                        \"NXCHN\": \"$request->NXCHN\",
                        \"State\": \"$request->State\",
                        \"LGA\": \"$request->LGA\",
                        \"SortCode\": \"$request->SortCode\",
                        \"BankAccountname\": \"$request->BankAccountname\",
                        \"RCDate\": \"$request->RCDate\",
                        \"BVN\": \"$request->BVN\",
                        \"TaxId\": \"$request->TaxId\"
                    }
                ],
                \"username\": \"$username\",
                \"webtoken\": \"$webtoken\"
                }",
            CURLOPT_HTTPHEADER => [
             // "authorization: Bearer ". env('PAYSTACK_SECRET_KEY', false), //replace this with your own test key
              "content-type: application/json",
              "cache-control: no-cache"
            ],
          ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if($err){ return response()->json(['error'=>$err],400);}  // there was an error contacting the Paystack API // die('Curl returned error: ' . $err);
        
        $tranx = json_decode($response, true);
        // return response()->json(['result' => $tranx["response_message"] ]); //test for response message
        if($tranx["response_message"] === "Request Accepted"){
            $this->createAccountsInDatabase($request);  //insert data
            return response()->json(['result' => "success" ]);
        }else{
            return response()->json(['result' => $tranx["response_message"]]);
        }
    }



    public function createAccountsInDatabase($request) {
        $data = Account::create([
                    "Member"=> $request->Member,
                    "AccountType"=> $request->AccountType,
                    "NIN"=> $request->NIN,
                    "BirthDate"=> $request->BirthDate,
                    "Name"=> $request->Name,
                    "Guardian"=> $request->Guardian,
                    "Address1"=> $request->Address1,
                    "City"=> $request->City,
                    "Country"=> $request->Country,
                    "Postal"=> $request->Postal,
                    "Phone1"=> $request->Phone1,
                    "Phone2"=> $request->Phone2,
                    "Email"=> $request->Email,
                    "BankName"=> $request->BankName,
                    "BankAccNo"=> $request->BankAccNo,
                    "BOPDate"=> $request->BOPDate,
                    "REQDate"=> $request->REQDate,
                    "NXPhone"=> $request->NXPhone,
                    "AltEMail"=> $request->AltEMail,
                    "Gender"=> $request->Gender,
                    "RCNumber"=> $request->RCNumber,
                    "Citizen"=> $request->Citizen,
                    "MadianName"=> $request->MadianName,
                    "RefNo"=> $request->RefNo,
                    "NIMCNo"=> $request->NIMCNo,
                    "CPPhone"=> $request->CPPhone,
                    "CPName"=> $request->CPName,
                    "NXCHN"=> $request->NXCHN,
                    "State"=> $request->State,
                    "LGA"=> $request->LGA,
                    "SortCode"=> $request->SortCode,
                    "BankAccountname"=> $request->BankAccountname,
                    "RCDate"=> $request->RCDate,
                    "BVN"=> $request->BVN,
                    "TaxId"=> $request->TaxId,
                    "user_id"=> 2   // user_id 
        ]);
        
    }





    public function getAccount() {
        $data = Account::orderBy('id','Desc')->get();
        return response()->json(['result' => $data ]);
    }



    public function getStatusByPost(Request $request){

        // these values should be from database
        $username = env('CSCS_USERNAME');
        $webtoken = env('CSCS_WEBTOKEN');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://apitest.cscs.ng:8021/api/AccountOpeningStatus",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "
            {   \"member\":   \"$request->member\",
                \"refno\":    \"$request->refno\",
                \"username\": \"$username\",
                \"webtoken\": \"$webtoken\",
            }",
            CURLOPT_HTTPHEADER => ["content-type: application/json",
              "cache-control: no-cache"
            ],
          ));



    $response = curl_exec($curl);
    $err = curl_error($curl);
    if($err){ return response()->json(['error'=>$err],400);}  // there was an error contacting the Paystack API // die('Curl returned error: ' . $err);
    $tranx = json_decode($response, true);
   
    $this->updateStatus($request->id,$tranx['CHN'],$tranx['status'],$tranx['comment'],$tranx['cscsNo']); // update status
    return response()->json(['result' => $tranx ]); 


}




public function updateStatus($id,$chn,$status,$comment,$cscs_no) {

    if(strlen($status) >1 ){
        $account = Account::find($id);
        $account->chn = $chn;
        $account->status = $status;
        $account->comment = $comment;
        $account->cscs_no = $cscs_no;
        $account->save();
    }
    //dd("nothing");
     return 0;
}



}