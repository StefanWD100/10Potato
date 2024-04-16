<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\File;



 
 
class UploadImageController extends Controller
{
    public function index()
    {
        return view('image');
    }
 
    public function save(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        
 
        $path = $request->file('image')->store('public/images');

        // file name get

        $filename = $request->image->hashName();


     

        

        //$filename = Photo::create(["filename" => $filename]);

       
        /*if(File::exists(public_path($path))){
            File::delete(public_path($path));
           }else{
            dd('File does not exists.');
            }*/
        //unlink(public_path('storage/images/'.$filename));    

       

 
 
        $save = new Photo;


        $save->userid = $request->input('userid') ;
        $save->user = $request->input('user') ;
        $save->name = $request->input('name') ;
        $save->path = $path;
        $save->filename = $filename;
 
        $save->save();

        
        $ids = [];
        $files = [];
        $count = Photo::count();

        $deleteUs = Photo::latest()->take($count)->skip(3)->get();

        foreach($deleteUs as $deleteMe){
                    $files[] = $deleteMe->filename;
                    $ids[] = $deleteMe->id;
                    foreach($files as $file)
                    {
                        
                        unlink(public_path('storage/images/'. $file));
                        
                    }
                    
                }
                
              
                Photo::destroy($ids);
                
                
                
                

        return redirect('/main') ;
        
       
 
        return redirect('home')->with('status', 'Image Has been uploaded');
 
    }
    // images show on main 
    public function main()
    {
        

        $photos      = Photo::all()->sortByDesc('created_at');
        return view('main',['photos'=>$photos]);

   
    }
  
    

    // img delete file
    public function delete(Request $request) {

        $image = Photo::find($request->id);

        unlink("uploads/".$image->image_name);

        Photo::where("id", $image->id)->delete();

        return back()->with("success", "Image deleted successfully.");

        //delete user
    }
}
