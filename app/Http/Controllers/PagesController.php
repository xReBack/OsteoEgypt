<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Branch;
use App\Models\AppointmentType;
use App\Models\User;
use App\Models\Link;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.index');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function signup()
    {
        return view('pages.signup');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function contact()
    {
        $countries = DB::table('locations')->get();

        return view('pages.contact')->with('countries',$countries);
    }

    public function sendMessage(Request $REQUEST) 
    {
        $contact = new Contact();

        $contact->fullname = $REQUEST->fullname;
        $contact->email = $REQUEST->email;
        $contact->phonenumber = $REQUEST->phonenumber;
        $contact->message = $REQUEST->message;

        $contact->save();

        return redirect()->route('home');
    }

    public function addNewPage()
    {
        $sections = DB::table('sections')->get();

        return view('pages.control.add-page')->with('sections',$sections);
    }

    public function addPage(Request $REQUEST)
    {
        $page = new Page();

        $page->section = $REQUEST->section;
        $page->page_name = $REQUEST->pageName;
        $page->content = $REQUEST->content;

        $page->save();

        // $contents = 'New Page Added';
        // file_put_contents(dirname(__FILE__).'../../../../resources/views/pages/'.$page->page_name.'.blade.php', $contents);

        return redirect()->route('control');
    }

    public function viewPages($section, $page) {
        $pageData = Page::where('id',$page)->first();

        return view('pages.blank')->with('pageData',$pageData);
    }

}
