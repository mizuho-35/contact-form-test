@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}" />
@endsection

@section('content')
<div class="search-form__title">
    <div class="search-form__heading">
        <h2>Admin</h2>
    </div>
</div>
<div class="search-form__content">
    <form class="search-form" action="/admin" method="get">
        <div class="search-form__item">
            <div class="search-form__item-keyword">
                <input name="keyword" type="text" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}" />
            </div>
            <div class="search-form__item-gender">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="男性" {{ request('gender')=='男性' ? 'selected' : '' }}>男性</option>
                    <option value="女性" {{ request('gender')=='女性' ? 'selected' : '' }}>女性</option>
                    <option value="その他" {{ request('gender')=='その他' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="search-form__item-category">
                <select name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="search-form__item-date">
                <input name="date" type="date" value="{{ request('date') }}">
            </div>
        </div>
        <div class="search-form__button">
            <button class="search-submit" type="submit">検索</button>
            <a href="/admin" class="reset-submit">リセット</a>
        </div>
    </form>
</div>

<div class="export-area">
    <a href="{{ route('admin.export', request()->query()) }}" class="export-button">エクスポート</a>
    <div class="pagination-area">
        {{ $contacts->links('pagination::default') }}
    </div>
</div>

<div class="table">
    <table class="contact-table">
        <tr class="contact-table__title">
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th colspan="2">お問い合わせの種類</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="contact-table__row">
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>
            <td class="contact-table__button">
                <a href="#modal-{{ $contact->id }}" class="contact-table__button-submit">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@foreach ($contacts as $contact)
@include('modal', ['contact' => $contact])
@endforeach

@endsection