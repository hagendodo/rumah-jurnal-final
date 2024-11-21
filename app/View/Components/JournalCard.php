<?php

namespace App\View\Components;

use App\Models\Journal;
use Illuminate\View\Component;

class JournalCard extends Component
{
    /**
     * The journal instance.
     *
     * @var \App\Models\Journal
     */
    public Journal $journal;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Journal $journal
     */
    public function __construct(Journal $journal)
    {
        $this->journal = $journal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.journal-card');
    }
}
