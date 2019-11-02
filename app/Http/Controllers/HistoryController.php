<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Illuminate\Http\Request;
use DB;

class HistoryController extends Controller
{
    public function index()
    {


        $buffer_posts =  BufferPosting::join('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
            ->join('social_posts','social_posts.id','=','buffer_postings.post_id')
            ->join('users','users.id','=','buffer_postings.user_id')
            //->join('users','users.id','=','social_accounts.user_id')

            ->select(DB::raw('buffer_postings.created_at as time, social_post_groups.id,social_post_groups.name as name, social_post_groups.type as type,users.name as uname, social_posts.text as posttext'))
            ->orderBy("buffer_postings.id")
            ->paginate(10);

        //$buffer_posts = BufferPosting::all();
        return view('pages.history', compact('buffer_posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
       $select = $request->input('select');



        $buffer_posts =  BufferPosting::join('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
            ->join('social_posts','social_posts.id','=','buffer_postings.post_id')
            ->join('users','users.id','=','buffer_postings.user_id')

            ->where('social_post_groups.name','LIKE',"%$query%")
            ->orWhere('social_post_groups.type','LIKE',"%$query%")
            ->orWhere('users.name','LIKE',"%$query%")
            ->orWhere('social_posts.text','LIKE',"%$query%")
            //->orWhere('social_post_groups.type','LIKE',"%$select%")


            ->select(DB::raw('buffer_postings.created_at as time, social_post_groups.id,social_post_groups.name as name, social_post_groups.type as type,users.name as uname, social_posts.text as posttext'))
            ->orderBy("buffer_postings.id")
            ->paginate(10);

        return view('pages.history-search',compact('buffer_posts','query'));
    }
}
