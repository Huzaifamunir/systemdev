<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Assignproject;
use App\Models\Task;
use App\Models\Project;
use App\Models\Time_log;
use Carbon\Carbon;
use Storage;
use App\Models\ScreenShots;
use DB;
use DateTime;


class ApiController extends Controller
{
    public function auth (Request $request){
      
        
      $email = $request->email;
        $password = $request->password;
      
       $user=User::where('email',$email)->where('password',md5($password))->first();
    //   dd($user);
       if($user)
       {
          $adddummytime=Time_log::where('user_id',$user->id)->where('end_time',null)->get();
       foreach($adddummytime as $d)
       {
           if($d->dummy_time!=null){
           $d->end_time=$d->dummy_time;
           $d->save();
           }
       }
           return response()->json(['user' => $user, 'status' => 'true']);
       }else
       {
           return response()->json([ 'status' => 'false']);
       }
        
     }
     
     public function getpro($id){
         $pro_array=array();
         $keys=array('project_id','project_title','tasks');
         $pro=Assignproject::where('emp_id',$id)->get();
        //  dd($pro);
         foreach($pro as $p)
         {
             $project_data=Project::where('p_id',$p->project_id)->first();
             $task=Task::where('project_id',$project_data->p_id)->get();
             array_push($pro_array,array_combine($keys,[$project_data->p_id,$project_data->p_title,$task]));
            
         }
         return response()->json(['projects' => $pro_array, 'status' => 'true']);
     }
     
      public function timelog(Request $request){
            
             $add=Time_log::create([
            'user_id'=>$request->user_id,
            'p_id'=>$request->p_id,
            't_id'=>$request->t_id,
            'start_date'=>$request->start_date,
            'start_time'=>$request->start_time,
        ]);
         return response()->json(['time_log_id' => $add->id, 'status' => 'true']);
     }
     
      public function timeupdate(Request $request){
            $find=Time_log::where('id',$request->time_log_id)->first();
            $find->end_time=$request->end_time;
            $find->dummy_time=$request->dummy_time;
            $find->save();
         
         return response()->json(['session' => $find, 'status' => 'true']);
     }
     
     public function sendss(Request $request)
     {
        $file=$request->image;
        $contents = file_get_contents($file);
        $fileName = time().rand(100,1000).'.'.$file->extension(); 
        $path=$request->folder.'/'.$request->date;
        \Storage::disk('s3')->put($request->folder.'/'.$request->date.'/'.$fileName,$contents);
        $link=Storage::disk('s3')->url($request->folder.'/'.$request->date.'/'.$fileName);
             $add=ScreenShots::create([
                 'folder'=>$request->folder,
                 'date'=>$request->date,
                 'link'=>$link,
                 ]);
         return response()->json([ 'status' => 'true']);
     }
     
     public function currentmonthtime($id)
     {
        
             $totalab=array();
        $keys=array('hou','min','sec');
        $task= DB::table('tasks')->where('empolyee_id',$id)->get();
        // dd($task);
            foreach ($task as $t) {
                $hours=array();
                $hoursworked="0:0:0";
                $s=0;
                $m=0;
                $h=0;
                $i=0;
                $sec=0; 
                $min=0;
                $hou=0;
                $views=time_log::where('t_id',$t->task_id)->whereMonth('start_date', date('m'))->get();
                // ->where('start_date',Carbon::format('m'))->get();
                if($views!=null){
                    foreach ($views as $view) {
                        $hoursworked="0 Hours 0 Minutes 0 Sec ";
                        $s=0;
                        $m=0;
                        $h=0;
                        if($view->end_time!=null){
                            $start_time=DateTime::createFromFormat('H:i:s',$view->start_time);
                            $end_time=DateTime::createFromFormat('H:i:s',$view->end_time);
                            $s=intval(round(($end_time->format('U') - $start_time->format('U'))));
                            if($s>=60){
                                $m=intval($s/60);
                                $s=$s-($m*60);
                            }
                            if($m>=60){
                                $h=intval($m/60);
                                $m=$m-($h*60);
                            }
                            $hoursworked=$h." Hours ".$m." Minutes ".$s." Sec ";
                        }
                        $hours[]=$hoursworked;
                        $hou=$hou+$h;
                        $min=$min+$m;
                        $sec=$sec+$s;
                        // //seconds convert into minutes
                        // $min  =$min+floor($sec/60);
                        // $sec= $sec % 60;
                        // //minutes convert into hours
                        // $hou  =$hou+floor($min/60);
                        // $min= $min % 60;      
                    }
                }
                array_push($totalab,array_combine($keys,[$hou,$min,$sec]));
            } 
            
            
              $sece=0; 
        $mint=0;
        $hour=0;
        
        $reject=array();
        $keys=array('hour','mint','sece');
        $task= DB::table('tasks')->where('empolyee_id',$id)->where('task_status',3)->get();
        $total="0 Hours 0 Minutes 0 Sec "; 
            foreach ($task as $t) {
                $hours=array();
                $hoursworked="0:0:0";
                $s=0;
                $m=0;
                $h=0;
                $i=0;
                $sece=0; 
                $mint=0;
                $hour=0;
                $views=time_log::where('t_id',$t->task_id)->whereMonth('start_date', date('m'))->get();
                // ->where('start_date',Carbon::format('m'))->get();
                if($views!=null){
                    foreach ($views as $view) {
                        $hoursworked="0 Hours 0 Minutes 0 Sec ";
                        $s=0;
                        $m=0;
                        $h=0;
                        if($view->end_time!=null){
                            $start_time=DateTime::createFromFormat('H:i:s',$view->start_time);
                            $end_time=DateTime::createFromFormat('H:i:s',$view->end_time);
                            $s=intval(round(($end_time->format('U') - $start_time->format('U'))));
                            if($s>=60){
                                $m=intval($s/60);
                                $s=$s-($m*60);
                            }
                            if($m>=60){
                                $h=intval($m/60);
                                $m=$m-($h*60);
                            }
                            $hoursworked=$h." Hours ".$m." Minutes ".$s." Sec ";
                        }
                        $hours[]=$hoursworked;
                        $hour=$hour+$h;
                        $mint=$mint+$m;
                        $sece=$sece+$s;

                        // //seconds convert into minutes
                        // $min  =$min+floor($sec/60);
                        // $sec= $sec % 60;
                        // //minutes convert into hours
                        // $hou  =$hou+floor($min/60);
                        // $min= $min % 60;      
                    }
                }
                array_push($reject,array_combine($keys,[$hour,$mint,$sece]));
            }  
            
                  $t_hour=0;  $t_mint=0;  
      $t_sece=0; 
      $t_h=0;    $t_m=0;
      $t_s=0;
      $r_h=0;    $r_m=0;
      $r_s=0;
      
      foreach( $totalab as $totals)
      {
                    $t_h+=$totals['hou'];
                    $t_m+=$totals['min'];
                    $t_s+=$totals['sec'];
                   
     }
     
       foreach($reject as $rejects)
      {
                    $r_h+=$rejects['hour'];
                    $r_m+=$rejects['mint'];
                    $r_s+=$rejects['sece'];
        }
        
          $t_hour=$t_h-$r_h;
      $t_mint=$t_m-$r_m;
      $t_sece=$t_s-$r_s; 
      $t_mint  =$t_mint+floor($t_sece/60);
      $t_sece= $t_sece % 60;
      //minutes convert into hours
      $t_hour  =$t_hour+floor($t_mint/60);
      $t_mint = $t_mint % 60; 
      $m_total=$t_hour." Hours ".$t_mint." Minutes ".$t_sece." Sec ";
        
        return response()->json(['currentMonthTime' => $m_total, 'status' => 'true']);
            
            
     }
     
     public function previousmonthtime($id)
     {
        // dd(date('m', strtotime('last month')));
             $totalab=array();
        $keys=array('hou','min','sec');
        $task= DB::table('tasks')->where('empolyee_id',$id)->get();
        // dd($task);
            foreach ($task as $t) {
                $hours=array();
                $hoursworked="0:0:0";
                $s=0;
                $m=0;
                $h=0;
                $i=0;
                $sec=0; 
                $min=0;
                $hou=0;
                $views=time_log::where('t_id',$t->task_id)->whereMonth('start_date', date('m', strtotime('last month')))->get();
                // ->where('start_date',Carbon::format('m'))->get();
                if($views!=null){
                    foreach ($views as $view) {
                        $hoursworked="0 Hours 0 Minutes 0 Sec ";
                        $s=0;
                        $m=0;
                        $h=0;
                        if($view->end_time!=null){
                            $start_time=DateTime::createFromFormat('H:i:s',$view->start_time);
                            $end_time=DateTime::createFromFormat('H:i:s',$view->end_time);
                            $s=intval(round(($end_time->format('U') - $start_time->format('U'))));
                            if($s>=60){
                                $m=intval($s/60);
                                $s=$s-($m*60);
                            }
                            if($m>=60){
                                $h=intval($m/60);
                                $m=$m-($h*60);
                            }
                            $hoursworked=$h." Hours ".$m." Minutes ".$s." Sec ";
                        }
                        $hours[]=$hoursworked;
                        $hou=$hou+$h;
                        $min=$min+$m;
                        $sec=$sec+$s;
                        // //seconds convert into minutes
                        // $min  =$min+floor($sec/60);
                        // $sec= $sec % 60;
                        // //minutes convert into hours
                        // $hou  =$hou+floor($min/60);
                        // $min= $min % 60;      
                    }
                }
                array_push($totalab,array_combine($keys,[$hou,$min,$sec]));
            } 
            
            
              $sece=0; 
        $mint=0;
        $hour=0;
        
        $reject=array();
        $keys=array('hour','mint','sece');
        $task= DB::table('tasks')->where('empolyee_id',$id)->where('task_status',3)->get();
        $total="0 Hours 0 Minutes 0 Sec "; 
            foreach ($task as $t) {
                $hours=array();
                $hoursworked="0:0:0";
                $s=0;
                $m=0;
                $h=0;
                $i=0;
                $sece=0; 
                $mint=0;
                $hour=0;
                $views=time_log::where('t_id',$t->task_id)->whereMonth('start_date', date('m', strtotime('last month')))->get();
                // ->where('start_date',Carbon::format('m'))->get();
                if($views!=null){
                    foreach ($views as $view) {
                        $hoursworked="0 Hours 0 Minutes 0 Sec ";
                        $s=0;
                        $m=0;
                        $h=0;
                        if($view->end_time!=null){
                            $start_time=DateTime::createFromFormat('H:i:s',$view->start_time);
                            $end_time=DateTime::createFromFormat('H:i:s',$view->end_time);
                            $s=intval(round(($end_time->format('U') - $start_time->format('U'))));
                            if($s>=60){
                                $m=intval($s/60);
                                $s=$s-($m*60);
                            }
                            if($m>=60){
                                $h=intval($m/60);
                                $m=$m-($h*60);
                            }
                            $hoursworked=$h." Hours ".$m." Minutes ".$s." Sec ";
                        }
                        $hours[]=$hoursworked;
                        $hour=$hour+$h;
                        $mint=$mint+$m;
                        $sece=$sece+$s;

                        // //seconds convert into minutes
                        // $min  =$min+floor($sec/60);
                        // $sec= $sec % 60;
                        // //minutes convert into hours
                        // $hou  =$hou+floor($min/60);
                        // $min= $min % 60;      
                    }
                }
                array_push($reject,array_combine($keys,[$hour,$mint,$sece]));
            }  
            
                  $t_hour=0;  $t_mint=0;  
      $t_sece=0; 
      $t_h=0;    $t_m=0;
      $t_s=0;
      $r_h=0;    $r_m=0;
      $r_s=0;
      
      foreach( $totalab as $totals)
      {
                    $t_h+=$totals['hou'];
                    $t_m+=$totals['min'];
                    $t_s+=$totals['sec'];
                   
     }
     
       foreach($reject as $rejects)
      {
                    $r_h+=$rejects['hour'];
                    $r_m+=$rejects['mint'];
                    $r_s+=$rejects['sece'];
        }
        
          $t_hour=$t_h-$r_h;
      $t_mint=$t_m-$r_m;
      $t_sece=$t_s-$r_s; 
      $t_mint  =$t_mint+floor($t_sece/60);
      $t_sece= $t_sece % 60;
      //minutes convert into hours
      $t_hour  =$t_hour+floor($t_mint/60);
      $t_mint = $t_mint % 60; 
      $m_total=$t_hour." Hours ".$t_mint." Minutes ".$t_sece." Sec ";
        return response()->json(['previousMonthTime' => $m_total, 'status' => 'true']);
            
            
     }
     
        public function totalTime($id)
     {
        // dd(date('m', strtotime('last month')));
             $totalab=array();
        $keys=array('hou','min','sec');
        $task= DB::table('tasks')->where('empolyee_id',$id)->get();
        // dd($task);
            foreach ($task as $t) {
                $hours=array();
                $hoursworked="0:0:0";
                $s=0;
                $m=0;
                $h=0;
                $i=0;
                $sec=0; 
                $min=0;
                $hou=0;
                $views=time_log::where('t_id',$t->task_id)->get();
                // ->where('start_date',Carbon::format('m'))->get();
                if($views!=null){
                    foreach ($views as $view) {
                        $hoursworked="0 Hours 0 Minutes 0 Sec ";
                        $s=0;
                        $m=0;
                        $h=0;
                        if($view->end_time!=null){
                            $start_time=DateTime::createFromFormat('H:i:s',$view->start_time);
                            $end_time=DateTime::createFromFormat('H:i:s',$view->end_time);
                            $s=intval(round(($end_time->format('U') - $start_time->format('U'))));
                            if($s>=60){
                                $m=intval($s/60);
                                $s=$s-($m*60);
                            }
                            if($m>=60){
                                $h=intval($m/60);
                                $m=$m-($h*60);
                            }
                            $hoursworked=$h." Hours ".$m." Minutes ".$s." Sec ";
                        }
                        $hours[]=$hoursworked;
                        $hou=$hou+$h;
                        $min=$min+$m;
                        $sec=$sec+$s;
                        // //seconds convert into minutes
                        // $min  =$min+floor($sec/60);
                        // $sec= $sec % 60;
                        // //minutes convert into hours
                        // $hou  =$hou+floor($min/60);
                        // $min= $min % 60;      
                    }
                }
                array_push($totalab,array_combine($keys,[$hou,$min,$sec]));
            } 
            
            
              $sece=0; 
        $mint=0;
        $hour=0;
        
        $reject=array();
        $keys=array('hour','mint','sece');
        $task= DB::table('tasks')->where('empolyee_id',$id)->where('task_status',3)->get();
        $total="0 Hours 0 Minutes 0 Sec "; 
            foreach ($task as $t) {
                $hours=array();
                $hoursworked="0:0:0";
                $s=0;
                $m=0;
                $h=0;
                $i=0;
                $sece=0; 
                $mint=0;
                $hour=0;
                $views=time_log::where('t_id',$t->task_id)->get();
                // ->where('start_date',Carbon::format('m'))->get();
                if($views!=null){
                    foreach ($views as $view) {
                        $hoursworked="0 Hours 0 Minutes 0 Sec ";
                        $s=0;
                        $m=0;
                        $h=0;
                        if($view->end_time!=null){
                            $start_time=DateTime::createFromFormat('H:i:s',$view->start_time);
                            $end_time=DateTime::createFromFormat('H:i:s',$view->end_time);
                            $s=intval(round(($end_time->format('U') - $start_time->format('U'))));
                            if($s>=60){
                                $m=intval($s/60);
                                $s=$s-($m*60);
                            }
                            if($m>=60){
                                $h=intval($m/60);
                                $m=$m-($h*60);
                            }
                            $hoursworked=$h." Hours ".$m." Minutes ".$s." Sec ";
                        }
                        $hours[]=$hoursworked;
                        $hour=$hour+$h;
                        $mint=$mint+$m;
                        $sece=$sece+$s;

                        // //seconds convert into minutes
                        // $min  =$min+floor($sec/60);
                        // $sec= $sec % 60;
                        // //minutes convert into hours
                        // $hou  =$hou+floor($min/60);
                        // $min= $min % 60;      
                    }
                }
                array_push($reject,array_combine($keys,[$hour,$mint,$sece]));
            }  
            
                  $t_hour=0;  $t_mint=0;  
      $t_sece=0; 
      $t_h=0;    $t_m=0;
      $t_s=0;
      $r_h=0;    $r_m=0;
      $r_s=0;
      
      foreach( $totalab as $totals)
      {
                    $t_h+=$totals['hou'];
                    $t_m+=$totals['min'];
                    $t_s+=$totals['sec'];
                   
     }
     
       foreach($reject as $rejects)
      {
                    $r_h+=$rejects['hour'];
                    $r_m+=$rejects['mint'];
                    $r_s+=$rejects['sece'];
        }
        
          $t_hour=$t_h-$r_h;
      $t_mint=$t_m-$r_m;
      $t_sece=$t_s-$r_s; 
      $t_mint  =$t_mint+floor($t_sece/60);
      $t_sece= $t_sece % 60;
      //minutes convert into hours
      $t_hour  =$t_hour+floor($t_mint/60);
      $t_mint = $t_mint % 60; 
      $m_total=$t_hour." Hours ".$t_mint." Minutes ".$t_sece." Sec ";
        return response()->json(['totalTime' => $m_total, 'status' => 'true']);
            
            
     }
     
     public function test($id)
     {
         dd($id);
     }
}
