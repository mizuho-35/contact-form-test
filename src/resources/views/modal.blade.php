<div id="modal-{{ $contact->id }}" class="modal-target" aria-hidden="true">
    <div class="modal__backdrop"></div>

    <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="modal-title-{{ $contact->id }}">
        <a href="" class="modal__close" aria-label="閉じる">✕</a>

        <form class="modal-form" action="/admin/contacts/{{ $contact->id }}" method="post">
            @csrf
            @method('DELETE')
            <table class="modal-table__inner">
                <tr>
                    <th class="modal-table__header">お名前</th>
                    <td class="modal-table__text">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">性別</th>
                    <td class="modal-table__text">{{ $contact->gender }}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">メールアドレス</th>
                    <td class="modal-table__text">{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">電話番号</th>
                    <td class="modal-table__text">{{ $contact->tel }}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">住所</th>
                    <td class="modal-table__text">{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">建物名</th>
                    <td class="modal-table__text">{{ $contact->building }}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">お問い合わせの種類</th>
                    <td class="modal-table__text">{{ optional($contact->category)->content}}</td>
                </tr>
                <tr>
                    <th class="modal-table__header">お問い合わせ内容</th>
                    <td class="modal-table__text" style="white-space:pre-wrap;">{{ $contact->detail }}</td>
                </tr>
            </table>

            <div class="modal__footer">
                <button type="submit" class="modal__footer-submit">削除</button>
            </div>
        </form>
    </div>
</div>
