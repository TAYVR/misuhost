<?php

namespace App\Http\Controllers;

use App\Models\Soung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SoungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Soung::inRandomOrder()->paginate(9);

        return view("soung.allsongs", compact("songs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("soung.addsoung");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:300',
            'cover' => ['required', 'square_image', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'song' => 'required|mimes:mp3'
        ]);

        $fileOriginalCover = $request->cover->getClientOriginalExtension();
        $cover = time() . '.' . $fileOriginalCover;
        Storage::disk('public')->putFileAs('covers', $request->cover, $cover);

        $fileOriginalSong = $request->song->getClientOriginalExtension();
        $song = time() . '.' . $fileOriginalSong;

        Storage::disk('public')->putFileAs('songs', $request->song, $song);

        $user = User::find(Auth::user()->id);
        $user->soungs()->create([
            'title' => $request->title,
            'cover' => $cover,
            'song' => $song

        ]);
        return redirect()->route('show', Auth::user()->id);





    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $song = Soung::with('user')->find($id);
        if ($song) {
            $views = $song->views + 1;
            $song->update(['views' => $views]);
            return view('soung.listensong', compact('song'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $song = Soung::with('user')->find($id);
        if (Auth::user()->id == $song->user_id) {
            return view('soung.editsong', compact('song'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $song = Soung::find($id);
        $request->validate([
            'title' => 'required|min:3|max:300',
            'cover' => ['required', 'square_image', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],

        ]);

        Storage::disk('public')->delete('covers/' . $song->cover);


        $fileOriginalCover = $request->cover->getClientOriginalExtension();
        $cover = time() . '.' . $fileOriginalCover;
        Storage::disk('public')->putFileAs('covers', $request->cover, $cover);



        $song->update([
            'title' => $request->title,
            'cover' => $cover,

        ]);
        return redirect()->route('show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soung = Soung::find($id);
        Storage::disk('public')->delete('covers/' . $soung->cover);
        Storage::disk('public')->delete('songs/' . $soung->song);

        Soung::destroy($soung->id);
        return redirect()->route('show', Auth::user()->id);
    }
    public function latestSongs()
    {
        $songs = Soung::with('user')->orderBy('created_at', 'desc')->paginate(9);
        return view('soung.lastsong', compact('songs'));
    }


    function trandsong()
    {
        $songs = Soung::withCount('likes')->orderBy('likes_count', 'desc')->paginate(9);
        $songs->load('user');
        return view('soung.trandsong', compact('songs'));


    }

    function like($id)
    {

        $song = Soung::find($id);
        $test = $song->likes()->where('user_id', Auth::user()->id)->first();
        if (isset($test)) {
            $test->delete();
        } else {
            $song->likes()->create(['user_id' => Auth::user()->id]);
        }

        return response()->json(["likes" => $song->likes->count('id')]);


    }

    function addView($id)
    {
        $song = Soung::find($id);
        $views = $song->views + 1;
        $song->views = $views;
        $song->save();
    }

}
