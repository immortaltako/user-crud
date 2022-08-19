<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Helpers\PersonsHelper;
use DB;

class PersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons =  Person::orderBy('created_at', 'desc')->get();
        return view('persons.index')->with('persons', $persons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $helper = new PersonsHelper();
        $activities = $helper->getActivities();
        return view('persons.create')->with('activities', $activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'eye_color' => 'required',
            'activity' => 'required'
        ]);

        // Create person
        $person = new Person;
        $person->first_name = $request->input('first_name');
        $person->last_name = $request->input('last_name');
        $person->email = $request->input('email');
        $person->dob = $request->input('dob');
        $person->eye_color = $request->input('eye_color');
        $person->activity = $request->input('activity');
        $person->save();

        return redirect('/persons')->with('success', 'Person Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        $helper = new PersonsHelper();
        $person['age'] = $helper->getAge($person->dob);
        $person['sign'] = $helper->getSign($person->dob);
        $person['activity_icon'] = $helper->getActivityIcon($person->activity);
        $person['activity_title'] = $helper->getActivityTitle($person->activity);
        return view('persons.show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        $helper = new PersonsHelper();
        $activities = $helper->getActivities();
        return view('persons.edit')->with(['person' => $person, 'activities' => $activities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'eye_color' => 'required',
            'activity' => 'required'
        ]);

        // Create person
        $person = Person::find($id);
        $person->first_name = $request->input('first_name');
        $person->last_name = $request->input('last_name');
        $person->email = $request->input('email');
        $person->dob = $request->input('dob');
        $person->eye_color = $request->input('eye_color');
        $person->activity = $request->input('activity');
        $person->save();

        return redirect('/persons/'.$id)->with('success', 'Person Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();

        return redirect('/persons')->with('success', 'Person Removed');
    }
}
