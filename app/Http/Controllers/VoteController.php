<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function RatedIndex(Request $request)
    {   
       $model = app('App\Models\\'.$request->type);
       $object =  $model::find($request->id);

       $object->vote()->create([
        'user_id' => Auth::id(),
        'ratedIndex' => $request->ratedIndex,
       ]);
       return response()->json(['message' => 'Voto guardado']); 
    }

    public function getVote(Request $request)
    {
        $model = app('App\Models\\'.$request->type);

        $object  = $model::find($request->id);
        $object =$object->getVotes()
        ->where('voteable_id' , $request->id)->get();
        $votes = ($object->count());
        $totalRated = collect($object)->sum('ratedIndex');
        $average = ceil($totalRated/$votes);
      
        return response()->json($average);


    }
}
