<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Routine;
use App\Exercise;

class RoutinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routines = Routine::orderBy('created_at','desc')->get();
        return view('training/routines')->with('routines',$routines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises = Exercise::orderBy('created_at','desc')->get();
        return view('training/create_routine')->with('exercises',$exercises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$request = request()->all();
        //return response()->json($request);

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'duration' => 'required',
            'type' => 'required',
            'poster' => 'image|nullable|max:1999',
        ]);
        //Handle poster
        if($request->hasFile('poster')){
            //Get filename with extension
            $fileNameWithExt = $request->file('poster')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('poster')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('poster')->storeAs('public/cover_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        
        //Create Routine
        $routine = new Routine;
        $routine->title = $request->input('title');
        $routine->body = $request->input('body');
        $routine->duration = $request->input('duration');
        $routine->type = $request->input('type');
        $routine->poster = $fileNameToStore;
        $routine->user_id = auth()->user()->id;

        //return response()->json($routine);
        $routine->save();

        //Attach exercises
        $exarray = json_decode($request->exarray);
        if(sizeof($exarray) > 0)
            foreach ($exarray as $element)
                $routine->exercises()->attach($element->exercise_id, ['day_id' => $element->day_id]);

        //$exercise = Exercise::find($request->);
        //$routine->exercises()->attach(exercise_id, ['day_id' => ]);
        return redirect('routines')->with('success','Workout Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $routine = Routine::with('exercises')->find($id);
        return view('training/routine')->with('routine',$routine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routine = Routine::find($id);
        return view('routine/edit_routine')->with('routine',$routine);
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'duration' => 'required',
            'type' => 'required',
            'poster' => 'image|nullable|max:1999',
        ]);

        //Handle poster
        if($request->hasFile('poster')){
            //Get filename with extension
            $fileNameWithExt = $request->file('poster')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('poster')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('poster')->storeAs('public/cover_images', $fileNameToStore);

        }

        //Edit Routine
        $routine = Routine::find($id);
        if($request->hasFile('poster')){
            $routine->poster = $fileNameToStore;
        }

        $routine->title = $request->input('title');
        $routine->body = $request->input('body');
        $routine->save();

        return redirect('Routines')->with('success','Routine Created!');
    } //not done

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = Routine::find($id);
        Routine::find($id)->exercises()->detach();
        $routine->delete();
        return redirect('routines')->with('success','Workout Removed!');
    }
}
