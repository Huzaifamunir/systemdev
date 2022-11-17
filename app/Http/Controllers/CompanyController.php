<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\User;
use Hash;
use DB;

class CompanyController extends Controller
{
    //
    public function company(){
        $company=Company::all();
        return view('superadmin.company', compact('company'));
    }

    public function add_company(Request $request){

         $company=new Company;
         
         $company->company_password= Hash::make($request->pass);
         $company->company_email=$request->email;
         $company->company_name=$request->name;
         $company->company_address=$request->address;
         $company->company_phone=$request->phone;
         $company->company_phenomena=$request->phenomena;

         $company->save();

         $latest= DB::table('companies')->latest('created_at')->first();
         $id= $latest->id;
         $date1=date('y');
         $date2=date('m');
         $date3=date('d');   
         $date4='COD-Emp-'.$date3.'/'.$date2.'/'.$date1;
         $cd=$id+1;
         $int_no=$date4.$cd;

         $user=new User;

         $user->company_id=$id;
         $user->gen_id=$int_no;
         $user->email=$request->email;
         $user->user_name=$request->name;
         $user->password=Hash::make($request->pass);
         $user->phone=$request->phone;
         $user->role_id='4';

         $user->save();

         return back();
    }

    public function edit_company(Request $request){
     
        if($request->pass!=null){
         $pass= Hash::make($request->pass);
        //  DB::table('companies')
        //  ->where('id',$request->id)
        //  ->update(['company_name' => $request->name],
        //           ['company_email' => $request->email],
        //           ['company_password' => $pass],
        //           ['company_phone' => $request->phone],
        //           ['company_address' => $request->address],
        //           ['company_phenomena' => $request->phenomena]
        //          );
          $companies=Company::find($request->id);

          $companies->company_name=$request->name;
          $companies->company_email=$request->email;
          $companies->company_password=$pass;
          $companies->company_phone=$request->phone;
          $companies->company_address=$request->address;
          $companies->company_phenomena= $request->phenomena;
          $companies->save();

                //  DB::table('users')
                //  ->where('company_id', $request->id)
                //  ->update(['user_name' => $request->name],
                //           ['email' => $request->email],
                //           ['password' => $pass],
                //           ['phone' => $request->phone]
                //          );
                //          $user=User::where('company_id', $request->id);
          
         $user=User::where('company_id',$request->id)->first();
          $user->user_name=$request->name;
          $user->email=$request->email;
          $user->phone=$request->phone;
          $user->password=$pass;
  
          $user->save();
        }else{

          $companies=Company::find($request->id);

          $companies->company_name=$request->name;
          $companies->company_email=$request->email;
          $companies->company_phone=$request->phone;
          $companies->company_address=$request->address;
          $companies->company_phenomena= $request->phenomena;
          $companies->save();

         
        //  DB::table('companies')
        //     ->where('id',$request->id)
        //     ->update(['company_name' => $request->name],
        //              ['company_email' => $request->email],
        //             //  ['company_password' => $pass],
        //              ['company_phone' => $request->phone],
        //              ['company_address' => $request->address],
        //              ['company_phenomena' => $request->phenomena]
        //             );
        
        $user=User::where('company_id', $request->id)->first();

        $user->user_name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;

        $user->save();

     
        }
                    return back();
    }

    public function delete_company($id){

         $company=Company::where('id','=', $id)->delete();

         $user=User::where('company_id','=', $id)->delete();

         return back();

    }
}











