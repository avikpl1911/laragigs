<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class ListingController extends Controller
{
    public function index(){
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag','search']))->paginate(2)
        ]);
    }

    public function show(Listing $listing){
        return view(
            'listings.show',
            ['listing'=>$listing]
        );

    }

    public function create(){
        return view(
            'listings.create'
        );
    }

    public function store(Request $request){
       $formfield = $request->validate(
        [
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]
       );

    //    dd($request->hasFile('logo'));

       if($request->hasFile('logo')){
        $formfield['logo']=$request->file('logo')->store('logos','public');
       }

       
       Listing::create($formfield);
       
       
    
       return redirect('/')->with('message','Listing created Succesfully');
    }

    public function edit(Listing $listing){
        return view('listings.edit' ,['listing'=>$listing]);

    }


    public function update(Request $request,Listing $listing){
        $formfield = $request->validate(
         [
             'title'=>'required',
             'company'=>['required'],
             'location'=>'required',
             'website'=>'required',
             'email'=>['required','email'],
             'tags'=>'required',
             'description'=>'required'
         ]
        );
 
     //    dd($request->hasFile('logo'));
 
        if($request->hasFile('logo')){
         $formfield['logo']=$request->file('logo')->store('logos','public');
        }
 
        
        $listing->update($formfield);
        
        
     
        return back()->with('message','Listing updated Succesfully');
     }

     public function destroy(Listing $listing){
         $listing->delete();

         return redirect('/')->with('message','Listing deleted Succesfully');
     }
}
