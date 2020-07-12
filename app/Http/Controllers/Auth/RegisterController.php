<?php

namespace App\Http\Controllers\Auth;
use Flash;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Admin/user_lists';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.user_lists')->with('users', User::all());
    }



    public function profile()
    {

        return view('auth.profile')
        ->with('profile',UserProfile::find( Auth()->user()->id ))
        ->with('users', User::find( Auth()->user()->id ));
    }

    public function updateProfile(Request $r, UserProfile $profile )
    {
       // dd($r->all());
          
        $id = auth()->user()->id;
        $basicinfo =  User::find($id);
        $profileinfo =  UserProfile::find($id);
        if ($basicinfo->name != $r->input('username'))
         {
            
            User::where('id',$id)->update([
                'name' => $r->input('username')
            ]);
        }

        if ($basicinfo->email != $r->input('emailadres')) 
        {
            User::where('id',$id)->update([
                'email' => $r->input('emailadres')
            ]);
        }
        $imagpath = "";
        if ($r->hasFile("profileimage")) 
        {
            $imagpath =  $r->file("profileimage")->store("profilepictures","public");  
      
        }

      

             if ($profileinfo == null) {
                $profile->adres = $r->input('adrs');
                $profile->user_id = $id;
                $profile->image = $imagpath;
                $profile->description = $r->input('aboutuser');
                $profile->save();
             }
             else 
             {

                if (file_exists(public_path()."/storage/".$profileinfo->image)) 
                {
                    Storage::disk("public")->delete($profileinfo->image);
                }
                
                $profileinfo->adres = $r->input('adrs');
                $profileinfo->description = $r->input('aboutuser');
                $profileinfo->user_id = $id;
                $profile->image = $imagpath;
                $profileinfo->save();
             }
            return redirect()->back()->with('status','Profile has been updated');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role'  => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }


    public function edit($user_id){
            return view('auth.user_edit')->with('user_info', User::find($user_id));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function updateUser(Request $r, $user_id){
         $name  = $r->input('name');
         $email = $r->input('email');
         $role  = empty($r->input('role')) ? $r->input('dbrole') : $r->input('role');
         $password = empty($r->input('password')) ? $r->input('dbpassword') : $r->input('password');

         User::where('id',$user_id)->update([
            'name' => $name,
            'email' =>$email, 
            'role' =>$role,
            'password' => Hash::make($password),
        ]);  
        Flash::success('User updated successfully.');
         return view('auth.user_lists')->with('users', User::all());
    }


    public function destroy($user_id){
         $user = User::find($user_id);
         if($user == null){
            Flash::error('User Not found');
             return  redirect(route('user_list')); //   view('auth.user_lists')->with('users', User::all());
         }

         $user->delete();

        Flash::success('User deleted successfully.');

         return redirect(route('user_list'));//view('auth.user_lists')->with('users', User::all());
    }




}
