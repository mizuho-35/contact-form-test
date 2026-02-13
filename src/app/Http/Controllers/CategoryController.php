<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index(Request $request) {
        $categories = Category::all();
        $query = Contact::with('category')
            ->keywordSearch($request->query('keyword'))
            ->genderSearch($request->query('gender'))
            ->categorySearch($request->query('category_id'));

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->query('date'));
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7)->appends($request->query());

        return view('category', compact('categories', 'contacts'));
    }

    public function export(Request $request)
{
    $query = Contact::with('category')
        ->keywordSearch($request->query('keyword'))
        ->genderSearch($request->query('gender'))
        ->categorySearch($request->query('category_id'));

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->query('date'));
    }

    $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';

    $headers = [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' => "attachment; filename=\"{$filename}\"",
    ];

    $callback = function () use ($query) {

        $handle = fopen('php://output', 'w');
        fwrite($handle, "\xEF\xBB\xBF");

        fputcsv($handle, ['ID', '姓', '名', 'メール', '性別', 'カテゴリ', '内容', '作成日']);

        $query->orderBy('created_at', 'desc')->chunk(500, function ($contacts) use ($handle) {
            foreach ($contacts as $c) {
                fputcsv($handle, [
                    $c->id,
                    $c->last_name ?? '',
                    $c->first_name ?? '',
                    $c->email ?? '',
                    $c->gender ?? '',
                    optional($c->category)->content ?? '',
                    $c->message ?? '',
                    $c->created_at ? $c->created_at->format('Y-m-d H:i:s') : '',
                ]);
            }
        });

        fclose($handle);
    };

    return response()->stream($callback, 200, $headers);
}
}