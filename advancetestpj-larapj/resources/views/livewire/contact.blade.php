<form action=" {{ route('contact.confirm') }}" method="post">
  @csrf
  <div class="contact_form_wrap">
    <p class="contact_form_ttl required">お名前</p>
    <div class="contact_form_content">
      <input type="text" class="form_input" name="fullname" value="{{ old('fullname') }}" placeholder="例）山田" />
    </div>
  </div>
  @if ($errors->has('fullname'))
  <p class="error_message">{{ $errors->first('fullname') }}</p>
  @endif
  <div class="contact_form_wrap">
    <p class="contact_form_ttl required">性別</p>
    <div class="contact_form_content">
      <label class="radio">
        <input class="radio_Input" type="radio" name="gender" value="1" @if(old('gender')=='1' ) checked @endif checked>
        <span class=" radio_DummyInput"></span>
        <span class="radio_LabelText">男性</span>
      </label>
      <label class="radio">
        <input class="radio_Input" type="radio" name="gender" value="2" @if(old('gender')=='2' ) checked @endif>
        <span class="radio_DummyInput"></span>
        <span class="radio_LabelText">女性</span>
      </label>
    </div>
  </div>
  <div class="contact_form_wrap">
    <p class="contact_form_ttl required">メールアドレス</p>
    <div class="contact_form_content">
      <input type="text" class="form_input" name="email" value="{{ old('email') }}" placeholder="例）test@example.com" />
    </div>
  </div>
  @if ($errors->has('email'))
  <p class="error_message">{{ $errors->first('email') }}</p>
  @endif
  <div class="h-adr">
    <div class="contact_form_wrap">
      <p class="contact_form_ttl required">郵便番号</p>
      <div class="contact_form_content">
        <p class="post_icon">〒</p>
        <span class="p-country-name" style="display:none;">Japan</span>
        <input type="text" class="form_input p-postal-code" name="postcode" value="{{ old('postcode') }}"
          placeholder="例）123-4567" />
      </div>
    </div>
    @if ($errors->has('postcode'))
    <p class="error_message">{{ $errors->first('postcode') }}</p>
    @endif
    <div class="contact_form_wrap">
      <p class="contact_form_ttl required">住所</p>
      <div class="contact_form_content">
        <input type="text" class="p-region p-locality p-street-address form_input" name="address"
          value="{{ old('address') }}" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" />
      </div>
    </div>
  </div>
  @if ($errors->has('address'))
  <p class="error_message">{{ $errors->first('address') }}</p>
  @endif
  <div class="contact_form_wrap">
    <p class="contact_form_ttl">建物名</p>
    <div class="contact_form_content">
      <input type="text" class="form_input" name="building_name" value="{{ old('building_name') }}"
        placeholder="例）千駄ヶ谷マンション101" />
    </div>
  </div>
  <div class="contact_form_wrap">
    <p class="contact_form_ttl required">ご意見</p>
    <div class="contact_form_content">
      <textarea type="text" class="form_input form_input_txt" name="opinion">{{ old('opinion') }}</textarea>
    </div>
  </div>
  @if ($errors->has('opinion'))
  <p class="error_message">{{ $errors->first('opinion') }}</p>
  @endif
  <button class="btn btn_confirm" type="submit">確認</button>
</form>