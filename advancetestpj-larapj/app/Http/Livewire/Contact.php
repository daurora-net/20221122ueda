<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $fullname;
    public $email;
    public $postcode;
    public $address;
    public $opinion;

    protected $rules = [
        'fullname' => 'required',
        'email' => 'required|email:strict,dns',
        'postcode' => 'required|min:8|max:8',
        'address' => 'required',
        'opinion' => 'required|max:120'
    ];
    protected $messages = [
        'fullname.required' => 'お名前を入力してください。',
        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => 'メールアドレスを正しく入力してください。',
        'postcode.required' => '郵便番号を入力してください。',
        'postcode.min' => '郵便番号は8文字で入力してください。',
        'postcode.max' => '郵便番号は8文字で入力してください。',
        'address.required' => '住所を入力してください。',
        'opinion.required' => 'ご意見を入力してください。',
        'opinion.max' => 'ご意見は120文字以下で入力してください。'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function saveContact()
    {
        $validatedData = $this->validate();

        Contact::create($validatedData);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}