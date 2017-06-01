<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Animal;
use App\Filter;

class PublicController extends Controller
{
    public function index()
	{
		$animals = Animal::orderBy('updated_at','desc')->paginate(5);
		return view('public.index',compact('animals'));
	}


	public function getanimals(){

		$animals = Animal::orderBy('updated_at','desc')->paginate(6);
		return view('public.animals', compact('animals'));
	}

	public function search(Request $request)
	{
		$filter = new Filter($request->all());
		session()->flash('filter',$filter);
		$animals = Animal::query();

		if ($request->type) {
			$animals->where('type', $request->type);
		}
		if ($request->region) {
			$animals->where('region', $request->region);
		}


		$animals = $animals->paginate(6);

		return view('public.animals',compact('animals'));
	}
}
