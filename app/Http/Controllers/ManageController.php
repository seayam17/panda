<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Basic;
use App\Models\SocialMedia;
use App\Models\ContactInformation;
use Carbon\Carbon;
use Session;
use Auth;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return redirect('dashboard');
    }

    public function basic(){
        return view('admin.manage.basic');
    }

    public function basic_update(){

    }

    public function social(){
        $data=SocialMedia::where('sm_status',1)->where('sm_id',1)->firstOrFail();
        return view('admin.manage.social',compact('data'));
    }
    public function social_update(Request $request){
        $this->validate($request,[

        ],[

        ]);

        $editor = Auth::user()->id;

        $update = SocialMedia::where('sm_id',1)->update([
            'sm_facebook' => $request['facebook'],
            'sm_twitter' => $request['twitter'],
            'sm_linkedin' => $request['linkedin'],
            'sm_youtube' => $request['youtube'],
            'sm_instagram' => $request['instagram'],
            'sm_pinterest' => $request['pinterest'],
            'sm_behance' => $request['behance'],
            'sm_whatsapp' => $request['whatsapp'],
            'sm_telegram' => $request['telegram'],
            'sm_github' => $request['github'],
            'sm_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Successfully update social media information.');
            return redirect('dashboard/manage/social');
        } else {
            Session::flash('error', 'Opps! Operation failed.');
            return redirect('dashboard/manage/social');
        }
    }

    public function contact(){
        $data=ContactInformation::where('ci_status',1)->where('ci_id',1)->firstOrFail();
        return view('admin.manage.contact',compact('data'));
    }
    public function contact_update(Request $request){
        $this->validate($request,[

        ],[

        ]);

        $editor = Auth::user()->id;

        $update = ContactInformation::where('ci_id',1)->update([
            'ci_phone1' => $request['phone1'],
            'ci_phone2' => $request['phone2'],
            'ci_phone3' => $request['phone3'],
            'ci_phone4' => $request['phone4'],
            'ci_email1' => $request['email1'],
            'ci_email2' => $request['email2'],
            'ci_email3' => $request['email3'],
            'ci_email4' => $request['email4'],
            'ci_address1' => $request['address1'],
            'ci_address2' => $request['address2'],
            'ci_address3' => $request['address3'],
            'ci_address4' => $request['address4'],
            'ci_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Successfully update contact information.');
            return redirect('dashboard/manage/contact');
        } else {
            Session::flash('error', 'Opps! Operation failed.');
            return redirect('dashboard/manage/contact');
        }
    }
}
