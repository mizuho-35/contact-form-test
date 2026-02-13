@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')


<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <div class="form__input--text">
                        <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form__error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__input--name">
                    <div class="form__input--text">
                        <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                    </div>
                    <div class="form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--gender">
                    <div class="form__input--radio">
                        <label class="gender__item">
                            <input type="radio" name="gender" value="男性" {{ old('gender') === '男性' ? 'checked' : '' }}>
                            <span class="gender__label">男性</span>
                        </label>
                        <label class="gender__item">
                            <input type="radio" name="gender" value="女性" {{ old('gender') === '女性' ? 'checked' : '' }}>
                            <span class="gender__label">女性</span>
                        </label>
                        <label class="gender__item">
                            <input type="radio" name="gender" value="その他" {{ old('gender') === 'その他' ? 'checked' : '' }}>
                            <span class="gender__label">その他</span>
                        </label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--email">
                    <div class="form__input--text">
                        <input type="text" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel-group">
                    <div class="form__input--tel">
                        <div class="form__input--tel-item">
                            <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}" />
                        </div>
                        <span class="tel__hyphen">-</span>
                        <div class="form__input--tel-item">
                            <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                        </div>
                        <span class="tel__hyphen">-</span>
                        <div class="form__input--tel-item">
                            <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                        </div>
                    </div>
                    <div class="form__error">
                        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                            電話番号を入力してください
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--address">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例:東京都渋谷区千駄々谷1-2-3" value="{{ old('address') }}" />
                    </div>
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--building">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例:千駄々谷マンション101" value="{{ old('building') }}" />
                    </div>
                    <div class="form__error">
                        @error('building')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__select">
                    <div class="form__select--text">
                        <select name="category_id" class="form__select-input">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <div class="form__input--text">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection