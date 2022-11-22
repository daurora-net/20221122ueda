@extends('layouts.default')
@section('content')
<h1 class="main_ttl">管理システム</h1>
<form action="{{ route('contact.search') }}" method="get">
  @csrf
  <div class="search">
    <div class="search_wrap">
      <p class="search_ttl">お名前</p>
      <div class="search_content">
        <input type="text" class="form_input" name="fullname" value="{{ request()->query('fullname') }}" />
      </div>
      <p class="search_ttl_02">性別</p>
      <div class="search_content">
        <label class="radio">
          <input class="radio_Input" type="radio" name="gender" value="0" @if(request()->query('gender')=='0' ) checked
          @endif checked>
          <span class="radio_DummyInput"></span>
          <span class="radio_LabelText">全て</span>
        </label>
        <label class="radio">
          <input class="radio_Input" type="radio" name="gender" value="1" @if(request()->query('gender')=='1' ) checked
          @endif>
          <span class=" radio_DummyInput"></span>
          <span class="radio_LabelText">男性</span>
        </label>
        <label class="radio">
          <input class="radio_Input" type="radio" name="gender" value="2" @if(request()->query('gender')=='2' ) checked
          @endif>
          <span class="radio_DummyInput"></span>
          <span class="radio_LabelText">女性</span>
        </label>
      </div>
    </div>
    <div class="search_wrap">
      <p class="search_ttl">登録日</p>
      <div class="search_content_02">
        <input type="date" class="form_input" name="from" placeholder="from_date" />
        <p>~</p>
        <input type="date" class="form_input" name="until" placeholder="until_date" />
      </div>
    </div>
    <div class="search_wrap">
      <p class="search_ttl">メールアドレス</p>
      <div class="search_content">
        <input type="text" class="form_input" name="email" value="{{ request()->query('email') }}" />
      </div>
    </div>
    <button type="submit" value="submit" class="btn">検索</button>
    <button type="submit" name="back" class="btn_back"><a href="/contact/search">リセット</a></button>
  </div>
</form>
{{$contacts->appends(request()->query())->links('vendor.pagination.custom')}}
<div class="result">
  <table class="result_table" id="app">
    <tr class="result_ttl_wrap result_ttl_grid">
      <th class="result_id">ID</th>
      <th class="result_name">お名前</th>
      <th class="result_gender">性別</th>
      <th class="result_email">メールアドレス</th>
      <th class="">ご意見</th>
      <th class=""></th>
    </tr>
    @foreach($contacts as $contact)
    @csrf
    <tr class="result_txt_wrap result_ttl_grid">
      <td class="result_id">{{ $contact->id }}</td>
      <td class="result_name">{{ $contact->fullname }}</td>
      <td class="result_gender">{{$contact->gender ===1 ? '男性':'女性'}}</td>
      <td class="result_email">{{ $contact->email }}</td>
      <td class="result_opinion" id="text_hover">
        <p>{{ Str::limit($contact->opinion,50 )}}</p>
        <p class="text_hover_tooltips">{{ $contact->opinion }}</p>
      </td>
      <form action="{{ route('contact.delete', ['id' => $contact->id]) }}" method="post">
        @csrf
        <td class="result_btn"><button class="btn_delete">削除</button></td>
      </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection