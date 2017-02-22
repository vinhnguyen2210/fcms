<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json([
                'model' => Contact::FilterPaginationOrder()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()
            ->json([
                'form' => Contact::initialize(),
                'option' => []
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = Contact::create([
            'user_id' => Auth::guard()->user()->id,
            'contact_name' => $request->contact_name,
            'email_address' => $request->email_address,
            'job_title' => $request->job_title,
            'company' => $request->company,
            'website' => $request->website,
            'mobile' => $request->mobile,
            'description' => $request->description,
        ]);

        return response()
            ->json([
                'saved' => true
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return response()
            ->json([
                'model' => $contact
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return response()
            ->json([
                'form' => $contact,
                'option' => []
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
