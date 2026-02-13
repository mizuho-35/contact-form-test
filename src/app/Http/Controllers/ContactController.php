<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
        }

    public function confirm(ContactRequest $request) {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category ? $category->content : '';

        return view('confirm', compact('contact'));
    }

    public function thanks(Request $request) {
        if ($request->has('back')) {
        return redirect('/')->withInput();
    }
        $tel = $request->tel1 . $request->tel2 . $request->tel3;

        Contact::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'gender'      => $request->gender,
            'email'       => $request->email,
            'tel'         => $tel,
            'address'     => $request->address,
            'building'    => $request->building,
            'category_id' => $request->category_id,
            'detail'      => $request->detail,
        ]);
        return view('thanks');
    }

    public function destroy(Contact $contact) {
            $contact->delete();
            return redirect('/admin');
        }

}
