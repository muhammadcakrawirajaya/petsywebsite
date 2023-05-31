<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::paginate(5);

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["picture"] = '/storage/'.$path;

        $dateString = $request->input('birth'); // Assuming 'date' is the name of your date input field
    $date = Carbon::parse($dateString)->toDateString(); // Parse the date string into a valid date format
    $requestData["birth"] = $date;

        Pet::create($requestData);
        return redirect('pet')->with('flash_message', 'Employee Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pets = Pet::findOrFail($id);

        return view('pets.edit', compact('pets'));
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
        $pets = Pet::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('picture')) {
            $fileName = time() . $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('images', $fileName, 'public');
            $pets->picture = '/storage/' . $path;
        }

        // Update other attributes
        $pets->name = $request->input('name');
        $pets->species = $request->input('species');
        $pets->breed = $request->input('breed');
        $pets->gender = $request->input('gender');
        $pets->birth = Carbon::parse($request->input('birth'))->toDateString();

        $pets->save();

        return redirect()->route('pet')->with('success', 'Pet updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pets = Pet::findOrFail($id);

        $pets->delete();

        return redirect()->route('pet')->with('success', 'product deleted successfully');
    }
}
