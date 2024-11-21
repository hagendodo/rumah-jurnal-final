<?php

use App\Models\News;
use App\Helpers\AccreditationStatCounter;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    // Initialize the query builder
    $query = Journal::with('indices')->where('is_active', true);

    // Handle filter by accreditation or indexed type
    if ($request->has('filter') && $request->has('type')) {
        $filter = $request->input('filter');
        $type = $request->input('type');

        if ($type === 'accreditation') {
            // Apply filter for accreditation
            $query->where('accreditation', $filter);
        } elseif ($type === 'indexed') {
            // Apply filter for indexed journals by index name
            $query->whereHas('indices', function ($q) use ($filter) {
                $q->where('name', $filter);
            });
        }
    }

    // Get the search query from the request
    $search = $request->input('search');

    // Query journals if a search term exists
    $journals = $query->when($search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('issn_print', 'like', '%' . $search . '%')
                ->orWhere('issn_online', 'like', '%' . $search . '%');
        });
    })->paginate(20);

    // Accreditation statistics
    $accreditationStats = [
        'sinta1' => AccreditationStatCounter::count('SINTA_1'),
        'sinta2' => AccreditationStatCounter::count('SINTA_2'),
        'sinta3' => AccreditationStatCounter::count('SINTA_3'),
        'sinta4' => AccreditationStatCounter::count('SINTA_4'),
        'sinta5' => AccreditationStatCounter::count('SINTA_5'),
        'sinta6' => AccreditationStatCounter::count('SINTA_6'),
        'not_accredited' => AccreditationStatCounter::notAccredited(),
        'all' => AccreditationStatCounter::countAll(),
    ];

    $sliders = \App\Models\Slider::where('status', true)->get();

    // Return the view with journals and accreditation statistics
    return view('index', compact(['journals', 'accreditationStats', 'sliders']));
})->name('home');

Route::get('/journal/{slug}', function (Request $request) {

    $slug = $request->slug;
    $journal = Journal::where('slug', $slug)->first();

    return view('show', compact('journal'));
})->name('show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/event', function () {
    $events = News::paginate(10);
    return view('event', compact('events'));
})->name('client.event.index');

Route::get('/event/{slug}', function (Request $request) {

    $slug = $request->slug;
    $event = News::where('slug', $slug)->first();

    return view('event-show', compact('event'));
})->name('client.event.show');
