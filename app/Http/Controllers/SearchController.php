<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Districtposting;
use App\Models\District;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $districts = District::all()->pluck('name', 'name');

        $current_posts = Districtposting::all()->pluck('current_post', 'current_post');
        $assembly_names = Districtposting::all()->pluck('assembly_name', 'assembly_name');

    	return view('advance-search', compact('districts', 'current_posts', 'assembly_names'));
    }


    public function search_results(Request $request)
    {
        $districts = District::all()->pluck('name', 'name');
        
        $current_posts = Districtposting::all()->pluck('current_post', 'current_post');
        $assembly_names = Districtposting::all()->pluck('assembly_name', 'assembly_name');

        $name = $request->get('name');
        $district1 = $request->get('districted');
        $applied_post = $request->get('applied_post');
        $current_post = $request->get('current_post');
        $assembly_name = $request->get('assembly_name');
        $social_division = $request->get('social_division');
        $selected_option = $request->get('selected_option');
        $selected_post = $request->get('selected_post');
        
        $searchResults = DB::table('districtpostings')
            ->where(function($query) use ($name, $district1, $applied_post, $current_post, $assembly_name, $social_division, $selected_option, $selected_post) {
                
                if($name)
                    $query->where('name', 'like', '%'.$name.'%');

                if($district1)
                    $query->where('district', '=', $district1);

                if($applied_post)
                    $query->where('applied_post', '=', $applied_post);

                if($current_post)
                    $query->where('current_post', '=', $current_post);

                if($assembly_name)
                    $query->where('assembly_name', '=', $assembly_name);

                if($social_division)
                    $query->where('social_division', '=', $social_division);

                if($selected_option)
                    $query->where('selected', '=', $selected_option);

                if($selected_post)
                    $query->where('selected_post', '=', $selected_post);
  
            })
            ->get();

    	return view('search-results', compact('searchResults', 'districts', 'current_posts', 'assembly_names'));
    }

    public function getPosting(Request $request)
    {
        $districts = Districtposting::all()->pluck('district', 'district');
        $assembly_names = Districtposting::all()->pluck('assembly_name', 'assembly_name');

        $district1 = $request->get('districted');
        $assembly_name = $request->get('assembly_name');
        $social_division = $request->get('social_division');
        $selected_post = $request->get('selected_post');

        $searchResults = DB::table('districtpostings')
            ->whereRaw('selected_post <> ""')
            ->where(function($query) use ($district1, $assembly_name, $social_division, $selected_post) {

                if($district1)
                    $query->where('district', '=', $district1);

                if($assembly_name)
                    $query->where('assembly_name', '=', $assembly_name);

                if($social_division)
                    $query->where('social_division', '=', $social_division);

                if($selected_post)
                    $query->where('selected_post', '=', $selected_post);
  
            })
            ->get();

        return view('district-postings', compact('searchResults', 'districts', 'assembly_names'));
    }

    public function idCard(Request $request)
    {
        $id = $request->get('id');

        $results = Districtposting::where('id', '=', $id)->first();

        return view('idcard', compact('results'));
    }

    public function letterHead(Request $request)
    {
        $id = $request->get('id');

        $results = Districtposting::where('id', '=', $id)->first();

        return view('letterhead', compact('results'));
    }
}
