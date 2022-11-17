<?php

namespace App\Http\Controllers;
use Config;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
     public function Blackblaze(){
        //  dd('good');
        return view('admin.blackblaze');
    }
    
    public function add_aws(Request $request){
       
        $this->setEnv('AWS_ACCESS_KEY_ID',$request->ACCESS_KEY);
        $this->setEnv('AWS_SECRET_ACCESS_KEY',$request->SECRET_ACCESS);
        $this->setEnv('AWS_DEFAULT_REGION',$request->REGION);
        $this->setEnv('AWS_BUCKET',$request->BUCKET);
        $this->setEnv('AWS_ENDPOINT',$request->ENDPOINT);
        
        return back();
      
    }
    
    function setEnv($name, $value)
{
    
    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $name . '=' . env($name), $name . '=' . $value, file_get_contents($path)
        ));
    }
}

    public function smtp(){
        return view('admin.Smtp');
    }
    
    public function add_mail(Request $request){
        dd($request->all());
        
        $this->setEnv('MAIL_MAILER',$request->MAIL_MAILER);
        $this->setEnv('MAIL_HOST',$request->MAIL_HOST);
        $this->setEnv('MAIL_PORT',$request->MAIL_PORT);
        $this->setEnv('MAIL_USERNAME',$request->MAIL_USERNAME);
        $this->setEnv('MAIL_PASSWORD',$request->MAIL_PASSWORD);
        $this->setEnv('MAIL_ENCRYPTION',$request->MAIL_ENCRYPTION);
        $this->setEnv('MAIL_FROM_ADDRESS',$request->MAIL_FROM_ADDRESS);
        $this->setEnv('MAIL_FROM_NAME',$request->MAIL_FROM_NAME);
        
        return back();
        
    }

    
}
