<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteReplaceSubmitRequest;
use VoyagerInc\QuoteReplace\Contracts\QuoteReplaceServiceInterface;

class QuoteReplaceController extends Controller
{
    private $quoteReplaceService;

    public function __construct(QuoteReplaceServiceInterface $quoteReplaceService)
    {
        $this->quoteReplaceService = $quoteReplaceService;
    }

    public function index()
    {
        return view('quoteReplace');
    }

    public function submit(QuoteReplaceSubmitRequest $request)
    {
        $text = $request->input('quote-replace-text');
        $quoteReplaceText = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        session()->flash('quoteReplaceText', $quoteReplaceText);

        return redirect()->back()->with('success', 'Quote replaced successfully!');
    }
}
