@extends('layouts.default')
@section('content')
<h1 class="main_ttl">内容確認</h1>
<div class="contact_form">
  <form action=" {{ route('contact.send') }}" method="post">
    @csrf
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">お名前</p>
      <div class="confirm_content">
        {{ $inputs['fullname'] }}
        <input type="hidden" name="fullname" value="{{ $inputs['fullname'] }}" />
      </div>
    </div>
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">性別</p>
      <div class="confirm_content">
        {{ $inputs['gender'] }}
        <input type="hidden" name="gender" value="{{ $inputs['gender'] }}" />
      </div>
    </div>
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">メールアドレス</p>
      <div class="confirm_content">
        {{ $inputs['email'] }}
        <input type="hidden" name="email" value="{{ $inputs['email'] }}" />
      </div>
    </div>
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">郵便番号</p>
      <div class="confirm_content">
        {{ $inputs['postcode'] }}
        <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}" />
      </div>
    </div>
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">住所</p>
      <div class="confirm_content">
        {{ $inputs['address'] }}
        <input type="hidden" name="address" value="{{ $inputs['address'] }}" />
      </div>
    </div>
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">建物名</p>
      <div class="confirm_content">
        {{ $inputs['building_name'] }}
        <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}" />
      </div>
    </div>
    <div class="contact_form_wrap">
      <p class="contact_form_ttl">ご意見</p>
      <div class="confirm_content">
        {{ $inputs['opinion'] }}
        <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}" />
      </div>
    </div>
    <button type="submit" name="action" value="submit" class="btn">送信</button>
    <button type="submit" name="back" value="back" class="btn_back">修正する</button>
  </form>
</div>
@endsection