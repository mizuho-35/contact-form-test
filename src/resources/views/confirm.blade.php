@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Confirm</h2>
    </div>

    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['gender'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['email'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['address'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['building'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span">{{ $contact['category_name'] }}</span>
                    </td>
                </tr>
                <tr class="confirm-table__row confirm-table__row--detail">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <span class="confirm-table__text-span"> {{ $contact['detail'] }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
        <input type="hidden" name="building" value="{{ $contact['building'] }}">
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

        <div class="form__footer">
            <button type="submit" class="form__button-submit">送信</button>
            <button type="submit" name="back" value="1" class="form__footer-back-button">修正</button>
        </div>
    </form>
</div>
@endsection
