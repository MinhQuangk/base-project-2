<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use App\Models\User;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Contracts\Validation\Validator as ContractsValidationValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Matching\ValidatorInterface;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Validators;
use Brian2694\Toastr\Facades\Toastr;
class accountController extends Controller
{
    public function __construct()
    {
        
    }
    public function logout(){
        Auth::logout();
        return view('Account.login');
    }

    // phương thức đăng nhập 
    public function showLogin(){
        return view('Account.login');
    }
    
    public function login(Request $request){
       
        if($request->isMethod('post')){
        $validator = FacadesValidator::make($request->all(),[
            'username'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $remember =$request->remember;
        $user =$request->username;
        $pass =$request->password;
        if(Auth::attempt(['username'=>$user,'password'=>$pass])){
           
            Toastr::success('Đăng nhập thành công ', 'Success');
             return redirect()->route('admin.dashboard');
          
        }else{
            Toastr::error('tên đăng nhập hoặc mật khẩu sai vui lòng thử lại', 'Fail');
           return redirect()->back();
        }

    }   }
    //phương thức đăng ký
    public function signUp(){
        return view('Account.signUp');
    }
    public function storeUser(Request $request){
        if($request->isMethod('Post')){
            $validator = FacadesValidator::make($request->all(),[
                'username'=>'required|min:6|max:30',
                'password'=>'required|min:8|max:20',
                'phone'=>'required|size:10',
                'email'=>'required|email'
            ],['username.required'=>'họ và tên bắt buộc phải nhập',
                'password.required'=>'mật khẩu bắt buộc phải nhập',
                'phone.required'=>'số điện thoại bắt buộc phải nhập',
                'email.required'=>'email bắt buộc phải nhập',
                'username.min'=>'tối thiểu 6 kí tự',
                'username.max'=>'tối đa 30 kí tự ',
                'password.min'=>'tối thiểu 8 kí tự',
                'password.max'=>'tối đa 20 kí tự ',
                'phone.size'=>'số điện thoại nhập đúng 10 số ',
                'email.email'=>'định dạng email'
                ]);
        }  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput(); 
        }
        $users = DB::table('member')->where('username',$request->username)->first();
        if(!$users){
            $newUser = new User();
            $newUser->username = $request->username;
            $newUser->password = bcrypt($request->password);
            $newUser->phone = $request->phone;
            $newUser->email = $request->email;
            $newUser->save();
            return redirect()->route('account.showLogin')->with('message','bạn đã tạo tài khoản thành công vui lòng đăng nhập thử để xác nhận');
        }else{
            return redirect()->route('account.signUp')->with('message','tạo tài khoản không thành công vui lòng thử lại');
        }
    }
   
    
}
