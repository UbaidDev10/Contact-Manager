<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Tag;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = auth()->user()->contacts()
            ->with('tags')
            ->latest()
            ->paginate(10);
        $tags = auth()->user()->tags()->orderBy('name')->get();
        return view('contacts.index', compact('contacts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = auth()->user()->tags()->orderBy('name')->get();
        return view('contacts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contacts,email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:5000',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $contact = auth()->user()->contacts()->create($validated);

        if ($request->has('tags')) {
            $contact->tags()->attach($request->tags);
        }

        ActivityLog::create([
            'user_id' => auth()->id(),
            'contact_id' => $contact->id,
            'action' => 'created',
            'description' => 'Contact created'
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        $contact->load(['tags', 'activityLogs.user']);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $tags = auth()->user()->tags()->orderBy('name')->get();
        return view('contacts.edit', compact('contact', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:5000',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $contact->update($validated);

        if ($request->has('tags')) {
            $contact->tags()->sync($request->tags);
        } else {
            $contact->tags()->detach();
        }

        ActivityLog::create([
            'user_id' => auth()->id(),
            'contact_id' => $contact->id,
            'action' => 'updated',
            'description' => 'Contact updated'
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'contact_id' => $contact->id,
            'action' => 'deleted',
            'description' => 'Contact deleted'
        ]);

        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}