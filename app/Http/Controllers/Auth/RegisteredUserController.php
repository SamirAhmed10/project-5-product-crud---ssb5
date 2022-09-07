<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\str;
use File;
use Image;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users=User::orderby('id','asc')->where('id','!=', 1)->get();
        return view('auth.usermanage',compact('users'));
    }
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'confirmed', Rules\Password::defaults()],
             'phone'=>['string', 'max:255'],
             'address'=>['string','max:255'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
             'password' => Hash::make($request->password),
             'phone'=>$request->phone,
             'address'=>$request->address,

        ]);

        event(new Registered($user));
         Auth::login($user);
        
        return redirect(RouteServiceProvider::ADMIN_DASHBOARD);

        /** 
         
       * if(Auth::user()->role==1)
        *{
           

         *   return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
        *}
        *elseif(Auth::user()->role==2)
        *{
        

         *   return redirect(RouteServiceProvider::HOME);

        *}
          */
}
    public function edit($id)
{
    $usrr =User::find($id);
        if( !is_null($usrr))
        {
        return view('auth.useredit',compact('usrr'));
        }
}
public function update(Request $request, $id)
{
    $usr =User::find($id);
    $usr->name=$request->name;
    $usr->email=$request->email;
    $usr->password=$request->password;
    $usr->phone=$request->phone;
    $usr->address=$request->address;
  
    
    

   
   
    if($request->image)
    {
        $image= $request->file('image');
        $img= time().'.'.$image->getClientOriginalExtension();
        $location= public_path('backend/img/brand/'. $img);
        Image::make($image)->save($location);
        $brnd->image= $img;
    }

    $usr->save();
    return redirect()->route('usermanage');
}

public function destroy($id)
    { 
       
       
        $usrs =User::find($id);
        $useres=User::orderby('name','asc')->get();
        
        if( !is_null($usrs))
        {
            if(File::exists('backend/img/user/'. $usrs->img))
           {
                File::delete('backend/img/user/'. $usrs->img);
           }
        }
        
        $usrs->delete();
        return redirect()->route('usermanage');
    }

       
    }

