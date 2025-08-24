<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Login;
use App\Models\Order;
use App\Models\Avatar;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\IranianPostalCode;
use App\Rules\IranianMobileNumber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\CreateProfileRequest;

class UserController extends Controller
{

    public function showCorrectHomePage(){
        if(Auth::check()){
            $ban_user = DB::table('bans')->where('user_id', Auth::user()->id)->first();
            if(!$ban_user){
                return view("logged-in-user");
            }else{
                return view("banned-user-page");
            }
        }else{
            return view("index");
        }
    }
    public function register(UserRegisterRequest $userRegisterRequest){
        $validated = $userRegisterRequest->validated();
        $validated ['password'] = bcrypt($validated['password']);
        $user =User::create($validated);
        Auth::login($user);
        $login_create_data ['user_id'] =Auth::user()->id;
        $login_create_data ['last_time_login'] =(string) Carbon::now();
        Login::create($login_create_data);
        return redirect('/')->with('success','با موفقیت ثبت نام شدید.');
    }

    public function login(UserLoginRequest $userLoginRequest){
        $validated = $userLoginRequest->validated();    
        if(Auth::attempt($validated)){
            $userLoginRequest->session()->regenerate();
            $data['last_time_login'] = Carbon::now();
            Auth::user()->login->update($data);
            return redirect('/')->with('success','ورود موفقیت آمیز بود.');
        }else{
            return redirect('/')->with('error','ورودی اشتباه است.');
        }
    }

    public function show_complete_profile_form(User $user){
        return view('complete-profile-form' , ['user'=> $user]);
    }

    public function complete_profile(CreateProfileRequest $createProfileRequest , User $user){
        $validated = $createProfileRequest->validated();
        $validated['user_id'] = $user->id;
        Profile::create($validated);
        if(Auth::user()->role != "admin"){
            Customer::create([
                'user_id' => $user->id
            ]); 
        }
        return redirect('/')->with('success','پروفایل با موفقیت کامل شد');
    }
    public function logout(){
        Auth::logout(); 
        return redirect('/')->with('success','خروج موفقیت آمیز بود.');
    }


    public function user_single_profile(User $user){
        if($user->role != 'admin'){
            $comments = $user->customer->comments;
            $products_that_buy = Order::where('customer_id' , $user->customer->id)->get();
            return view ('profile-users' , ['user'=> $user , 'comments' => $comments , 'products_that_buy' => $products_that_buy]);
        }else{
            return view('profile-users' , ['comments' => []]);
        }
    }


    public function user_information_form(){
        return view('user-information-form');
    }

    public function change_user_information(Request $request,  User $user){
        $validated_first_name_and_last_name_and_email = $request->validate([
            'first_name' => 'sometimes', 
            'last_name' => 'sometimes',
        ]);
        $user->update($validated_first_name_and_last_name_and_email);

        $validated_profile_information = $request->validate([
            'address' => 'sometimes' ,
            'postal_code' => 'sometimes' , new IranianPostalCode
        ]); 

        $user->profile->update($validated_profile_information);

        return redirect('/')->with('success','تغییرات با موفقیت اعمال شذ.');
    }

    public function user_password_form(User $user){
        return view ('user-password-form');
    }

    public function change_user_password(Request $request, User $user){
        $validated = $request->validate([
           'current_password' => 'required' ,
           'new_password' => ['required' , 'min:8'] 
        ]);

        if(Hash::check($validated['current_password'], $user->password)){
            $user->password = bcrypt($validated['new_password']);
            $user->save();
            return redirect('/')->with('success','رمز عبور با موفقیت بروز رسانی شد.');
        }else{
            return redirect('/')->with('error','رمز عبور فعلی را اشتباه وارد کرده اید.');
        }
    }

    public function show_avatar_form(){
        return view ('avatar-form');
    }

    public function set_profile_user(Request $request, User $user)
{
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    try {
        // بررسی وجود فایل
        if (!$request->hasFile('avatar')) {
            return back()->with('error', "عکسی انتخاب نکرده اید.");
        }

        // حذف آواتار قدیمی
        if ($user->avatar && Storage::disk('public')->exists($user->avatar->path)) {
            Storage::disk('public')->delete($user->avatar->path);
        }

        // پردازش تصویر جدید
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('avatar'));
        $image->cover(200, 200);

        $filename = 'avatars/user-' . $user->id . '-' . uniqid() . '.jpg';
        
        // ذخیره تصویر با بررسی نتیجه
        if (!Storage::disk('public')->put($filename, $image->toJpeg(80))) {
            throw new \Exception('نمیتوان عکس را ذخیره کرد.');
        }

        // استفاده از رابطه مدل
        $user->avatar()->updateOrCreate(
            ['user_id' => $user->id],
            ['path' => $filename]
        );

        return back()->with('success', "آواتار با موفقیت آپلود شد.");

    } catch (\Exception $e) {
        return back()->with('error', "Error in uploading: " . $e->getMessage());
    }
}


public function search_by_user_input(Request $request) {
    $term = $request->input('term'); // Changed from 'search' to 'term'
    
    if(empty($term)) {
        return redirect()->back()->with('error', 'لطفا چیزی را سرچ کنید.');
    }

    $products = Product::where('title', 'like', "%$term%")
        ->orWhere('information', 'like', "%$term%")
        ->orWhere("vehicle", 'like', "%$term%")
        ->paginate(1); 
    
    return view('search-result', ['products' => $products]);
}

    public function search_by_brand($brandName) {
        $products = Product::with('brand')
            ->whereHas('brand', function($query) use ($brandName) {
                $query->where('name', 'like', "%$brandName%");
            })->paginate(1);
        
        return view('search-result', ['products' => $products]);
    }

// Search Products by Category
    public function search_by_category($categoryName) {
        $products = Product::with('category')
            ->whereHas('category', function($query) use ($categoryName) {
                $query->where('name', 'like', "%$categoryName%");
            })->paginate(1);
        
        return view('search-result', ['products' => $products]);
    }
}
