<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
class AdminController extends Controller
{
    public function index(){
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
     $array[] = ['Name', 'Number'];
     foreach($data as $key => $value)
     {
       $array[++$key] = [$value->day_name, $value->count];
     }
    //  return $data;
     return view('backend.index')->with('users', json_encode($array));
    }

    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('backend.users.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }

    public function settings(){
        $data=Settings::first();
        $products=\App\Models\Product::where('status','active')->orderBy('title','asc')->get();
        return view('backend.setting')->with('data',$data)->with('products',$products);
    }

    public function settingsUpdate(Request $request){
        $this->validate($request,[
            'short_des'=>'required|string',
            'description'=>'required|string',
            'photo'=>'required',
            'logo'=>'required',
            'address'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'whatsapp'=>'nullable|string',
            'announcement'=>'nullable|string',
        ]);
        $data=$request->all();

        // Process Lookbook Settings
        if($request->has('lookbook_title') || $request->has('lookbook_image')){
            $items = [];
            for($i = 1; $i <= 3; $i++){
                $items[] = [
                    'id' => $i,
                    'product_id' => $request->input("lookbook_item{$i}_product_id"),
                    'tag' => $request->input("lookbook_item{$i}_tag") ?? ("ITEM 0{$i} • APPAREL"),
                    'top' => $request->input("lookbook_item{$i}_top") ?? ($i == 1 ? '22%' : ($i == 2 ? '50%' : '80%')),
                    'left' => $request->input("lookbook_item{$i}_left") ?? ($i == 1 ? '44%' : ($i == 2 ? '60%' : '42%')),
                    'title' => $request->input("lookbook_item{$i}_title"),
                    'category' => $request->input("lookbook_item{$i}_category"),
                    'price' => $request->input("lookbook_item{$i}_price"),
                    'photo' => $request->input("lookbook_item{$i}_photo"),
                ];
            }
            $lookbookData = [
                'title' => $request->input('lookbook_title') ?? 'Popular Choices — Shop The Look',
                'subtitle' => $request->input('lookbook_subtitle') ?? 'INTERACTIVE LOOKBOOK',
                'description' => $request->input('lookbook_description') ?? 'Hover or tap on the glowing hotspots (+) to discover and shop the curated designer pieces.',
                'image' => $request->input('lookbook_image') ?? 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1200&q=85',
                'items' => $items,
            ];
            $data['lookbook_data'] = json_encode($lookbookData);
        }

        $settings=Settings::first();
        if(!$settings){
            $settings = new Settings();
        }
        $status=$settings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Settings successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return redirect()->back();
    }

    public function changePassword(){
        return view('backend.layouts.changePassword');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('admin')->with('success','Password successfully changed');
    }

    // Pie chart
    public function userPieChart(Request $request){
        // dd($request->all());
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
     $array[] = ['Name', 'Number'];
     foreach($data as $key => $value)
     {
       $array[++$key] = [$value->day_name, $value->count];
     }
    //  return $data;
     return view('backend.index')->with('course', json_encode($array));
    }

    // public function activity(){
    //     return Activity::all();
    //     $activity= Activity::all();
    //     return view('backend.layouts.activity')->with('activities',$activity);
    // }
}
