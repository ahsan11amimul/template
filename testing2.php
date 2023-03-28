<?php
/**
 * @since: 28/03/2023
 */

public function index(Request $request)
{
	$lenders=Lender::all();

	return view('lenders.index',compact('lenderss'));
}
public function store(Request $request)
{
	$validateData=$request->validate([

		'name'=>'required',
		'phone1'=>'required',
		'email'=>'required',
		'email1'=>'required',
		'email2'=>'required',
		'position'=>'required',
	]);

	$user=Lender::create($validateData);

	return redirect()->back()->with('succes','Lender Created Successfully');
}
public function show(Lender $lender)
{
	return view('lenders.show',compact('lender'));
}
public function destroy(Request $request,$id)
{
	$lender=Lender::find($id);
	$lender->delete();
	return redirect()->back()->with('success','Lender Deleted!');
}
