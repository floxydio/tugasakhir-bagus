<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthAccount extends Controller {
   public function index() {
      return view("auth/login");
   }

   public function loginIndex(Request $request) {
      $loginCheck = DB::table("tbl_user")->where("nama", $request->input("nama"))->where("id_card", $request->input("id_card"))->first();
   }

}
