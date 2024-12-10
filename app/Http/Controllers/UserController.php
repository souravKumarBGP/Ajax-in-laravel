<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Logic to create a methods to show home page
    public function index(){

        session()->regenerate();
        return view("welcome");
    }

    // Logic to show all user records 
    public function show(Request $request)
    {
        // Check if the request expects a specific page
        if ($request->ajax()) {
            // Fetch users with pagination (10 per page, for example)
            $users = User::paginate(2); // You can customize the per-page count

            // Return paginated data as JSON
            return response()->json([
                'users' => $users->items(),  // Data of current page
                'pagination' => [
                    'total' => $users->total(),
                    'current_page' => $users->currentPage(),
                    'last_page' => $users->lastPage(),
                    'per_page' => $users->perPage(),
                ]
            ]);
        }
    }

    public function view(Request $request){

        $data = User::findOrFail($request);

        return $data;
    }

    // Logic to create a methods to create new user
    public function create(Request $request){

        // Logic to apply some condition before insert new data into database
        if ($request->hasFile('image') && !empty($request)) {

            $imagePath = $request->file('image')->store('image', 'public');  // Store the file in 'public/image' 
            
            $result = User::create([
                "name"=> $request->name,
                "email"=> $request->email,
                "phone"=> $request->phone,
                "image"=> $imagePath
            ]);

            if($result){

                // session()->regenerate();
                return 1; // Here 1 = Recored saved successfully
            }else{
                return 0; // Here 0 = Something went wrong 
            }
            
        }else{
            return 0; // Here 0 = Something went wrong
        }
        
    }
    
    // Logic to create a methods to create new user
    public function delete(Request $request){
        
        $result = User::findOrFail($request->userid)->delete();
        // return $result;

        if($result){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    // Logic to create a methods to create new user
    public function update(Request $request){
        
        // Logic to apply some condition before insert new data into database
        if ($request->hasFile('image') && !empty($request)) {

            $imagePath = $request->file('image')->store('image', 'public');  // Store the file in 'public/image' 
            
            $result = User::findorFail($request->userId)->update([
                "name"=> $request->name,
                "email"=> $request->email,
                "phone"=> $request->phone,
                "image"=> $imagePath
            ]);

            if($result){

                // session()->regenerate();
                return 1; // Here 1 = Recored saved successfully
            }else{
                return 0; // Here 0 = Something went wrong 
            }
            
        }else{
            return 0; // Here 0 = Something went wrong
        }
        
    }
}
