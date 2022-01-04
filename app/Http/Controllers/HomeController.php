<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Contact;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Pages;
use App\Group;
use App\Element;
use Mail;

class HomeController extends Controller
{
    public function home()
    {
        $cat_blog_id = Category::whereSlug('news')->get()[0]->id;
        $cat_detail_id = Category::whereSlug('details')->get()[0]->id;
        $blogs = Post::where(['status' => 'PUBLISHED', 'featured' => '1', 'category_id' => $cat_blog_id])->get();
        $details = Post::where(['status' => 'PUBLISHED', 'featured' => '1', 'category_id' => $cat_detail_id])->get();
        $groups = Group::all();
        $elements = Element::all();
        $pages = Pages::all();
        return view('home', compact('blogs', 'details', 'groups', 'elements', 'pages'));
    }

    public function blog($slug)
    {
        $cat_blog_id = Category::whereSlug('blogs')->get()[0]->id;
        $post = Post::where(['status' => 'PUBLISHED', 'slug' => $slug, 'category_id' => $cat_blog_id])->firstOrFail();
        $others = Post::latest()->where(['status' => 'PUBLISHED', 'category_id' => $cat_blog_id])->take(2)->get();
        return view('blog-single', compact('post', 'others'));
    }
    
    public function news($slug)
    {
        $cat_blog_id = Category::whereSlug('news')->get()[0]->id;
        $post = Post::where(['status' => 'PUBLISHED', 'slug' => $slug, 'category_id' => $cat_blog_id])->firstOrFail();
        $others = Post::latest()->where(['status' => 'PUBLISHED', 'category_id' => $cat_blog_id])->take(2)->get();
        return view('blog-single', compact('post', 'others'));
    }

    public function about()
    {
        $cat_id = Category::whereSlug('details')->get()[0]->id;
        $details = Post::where(['status' => 'PUBLISHED', 'category_id' => $cat_id])->get();
        $groups = Group::all();
        $elements = Element::all();
        return view('about', compact('details', 'groups', 'elements'));
    }

    public function sponsors(){
        $cat_id = Category::whereSlug('details')->get()[0]->id;
        $details = Post::where(['status' => 'PUBLISHED', 'category_id' => $cat_id])->get();
        return view('sponsors', compact('details'));
    }
    
    public function blogs() {
        $cat_blog_id = Category::whereSlug('blogs')->get()[0]->id;
        $blogs = Post::where(['status' => 'PUBLISHED', 'category_id' => $cat_blog_id])->get();
        return view('blogs', compact('blogs'));
    }

    public function legal($slug){
        $post = Pages::where(['status' => 'ACTIVE', 'slug' => $slug, 'category' => 'legal'])->firstOrFail();
        return view('legal', compact('post'));
    }

    public function contact()
    {
        $data = Pages::where(['status' => 'ACTIVE', 'category' => 'contact'])->firstOrFail();
        return view('contact', compact('data'));
    }

    public function mua()
    {
        $groups = Group::where(['category' => 'muas'])->get();
        $elements = Element::all();
        return view('mua', compact('elements', 'groups'));
    }

    public function faq()
    {
        $groups = Group::where(['category' => 'faqs'])->get();
        $elements = Element::all();
        return view('faq', compact('elements', 'groups'));
    }

    public function media()
    {
        $pages = Pages::all();
        $cat_blog_id = Category::whereSlug('news')->get()[0]->id;
        $blogs = Post::where(['status' => 'PUBLISHED', 'category_id' => $cat_blog_id])->get();
        return view('media', compact('pages', 'blogs'));
    }
    
    public function contactform(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'email' => 'required|max:191|email',
            'role' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() .'#contact')
                    ->withErrors($validator)
                    ->withInput();
        }
        
        Contact::create($request->all());
    
        /* Mail::send('email',
           array(
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'role' => $request->get('role'),
               'message' => $request->get('message')
           ), function($message)
        {
           $message->from('contact@iconictop100.com');
           $message->to('info@iconictop100.com', 'Iconic Top 100')->subject('Iconictop100 Contact Form');
        }); */
        return redirect(url()->previous() .'#contact')->with('success', 'Thank you for contacting us!'); 
    }
}
