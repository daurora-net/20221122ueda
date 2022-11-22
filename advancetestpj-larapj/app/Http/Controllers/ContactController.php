<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();
        return view('contact.confirm', ['inputs' => $inputs]);
    }

    public function send(ContactRequest $request)
    {
        $form = $this->unsetToken($request);
        $contacts = new Contact;
        $contacts->fill($form)->save();
        $action = $request->input('action');
        $inputs = $request->except('action');
        if ($action !== 'submit') {
            return redirect()
                ->route('contact.index')
                ->withInput($inputs);
        } else {
            $request->session()->regenerateToken();
            return view('contact.thanks');
        }
    }
    public function find(Request $request)
    {
    }
    public function search(Request $request)
    {
        $inputs = $request->all();
        $query = Contact::query();
        foreach ($request->only(['fullname', 'email']) as $key => $value) {
            $query->where($key, 'like', '%' . $value . '%');
        }


        $contacts = $query->paginate(15);
        return view('contact.search', compact('contacts', 'inputs'));

        // if (!empty($request['from']) && !empty($request['until'])) {
        // $date = Contact::getDate($request['from'], $request['until']);
        // } else {
        // $date = Contact::get();
        // }
    }

    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return back();
    }
}