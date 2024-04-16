<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function Like(Request $request)
{
    switch ($request->input('action')) {
        case 'Like':

           

           //geting inputs
            
            $userid = \Auth::id(); 
            $postid = $request->input('id') ;
            $posterid = $request->input('posterid') ;

             //counting likes

             $count = Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',1]])->get();
             

             $lcount1 = count($count );

           if($lcount1 < 1)
            {
                $save = new Likes;

                $save->userid = $userid;
                $save->postid = $postid;
                $save->like = '1';
    
                $save->save();

                //post increment

                Photo::where('id', $postid)->increment('points',1);

                //user increment

                User::where('id', $posterid)->increment('points',1);

                $dcount = Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',2]])->get();
             

                $dcount1 = count($dcount );

                    if($dcount1!= 0)
                    {

                       

                        //post increment

                        Photo::where('id', $postid)->increment('points',1);

                        //user increment

                        User::where('id', $posterid)->increment('points',1);

                        Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',2]])->delete();

                    }

            
            }else{

                    

                       //post increment

                       Photo::where('id', $postid)->increment('points',-1);

                       //user increment

                       User::where('id', $posterid)->increment('points',-1);

                       Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',1]])->delete();

            }
            

            break;

            case 'Dislike':

           

                //geting inputs
                 
                 $userid = \Auth::id();  
                 $postid = $request->input('id') ;
                 $posterid = $request->input('posterid') ;
     
                  //counting dislikes
     
                  $count = Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',2]])->get();
                  
     
                  $dcount1 = count($count );
     
                if($dcount1 < 1)
                 {
                     $save = new Likes;
     
                     $save->userid = $userid;
                     $save->postid = $postid;
                     $save->like = '2';
         
                     $save->save();
     
                     //post increment
     
                     Photo::where('id', $postid)->increment('points',-1);
     
                     //user increment
     
                     User::where('id', $posterid)->increment('points',-1);
     
                     $dcount = Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',1]])->get();
                  
     
                     $lcount1 = count($dcount );
     
                         if($lcount1!= 0)
                         {
     
                             
     
                             //post increment
     
                             Photo::where('id', $postid)->increment('points',-1);
     
                             //user increment
     
                             User::where('id', $posterid)->increment('points',-1);
                            
                             Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',1]])->delete();
                         }
     
                 
                 }else{
     
                         
     
                            //post increment
     
                            Photo::where('id', $postid)->increment('points',1);
     
                            //user increment
     
                            User::where('id', $posterid)->increment('points',1);

                            Likes::where([['userid',$userid ],[ 'postid',$postid],[ 'like',2]])->delete();
                 }
                
     
                 break;


      
    }
    return redirect('/main') ;
}
}
