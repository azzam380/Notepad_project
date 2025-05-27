<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Note::where('user_id', auth()->id());

        if ($request->has('search') && $request->search !== '') {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $notes = $query->latest()->get();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        auth()->user()->notes()->create($request->only('title', 'content'));

        return redirect()->route('notes.index')->with('success', 'Note created!');
    }

    public function edit(Note $note)
    {
        $this->authorizeNote($note);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorizeNote($note);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $note->update($request->only('title', 'content'));

        return redirect()->route('notes.index')->with('success', 'Note updated!');
    }

    public function destroy(Note $note)
    {
        $this->authorizeNote($note);

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted!');
    }

    protected function authorizeNote(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
    }

    public function exportPdf()
    {
        $notes = Note::where('user_id', auth()->id())->get();
        $pdf = Pdf::loadView('notes.pdf', compact('notes'));

        return $pdf->download('my_notes.pdf');
    }
}
