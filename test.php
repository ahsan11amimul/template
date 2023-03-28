<?php
/**
 * @since: 28/03/2023
 */

public function index(Request $request)
{
	$deals=Deal::all();

	return view('deal.index',compact('deals'));
}
public function store(Request $request)
{
	$validateData=$request->validate([
		'sale_rep-'=>'required',
		'sale_rep2-'=>'required',
		'company_name'=>'required',
		'marchent_name'=>'required',
		'phone_number'=>'required',
		'email'=>'required',
		'requested_amount'=>'required',
		'date_submitted'=>'required',
		'file'=>'pdf',
	]);
	if($request->file('image'))
	{
		$image=$request->file('image');
		$image_name=time().'.'.$image->getClientOriginalExtension();
		$image->move(public_path('files'),$image_name);
		$validateData['file']=$image_name;
	}
	$user=Deal::create($validateData);

	return redirect()->back()->with('succes','Deal Created Successfully');
}
public function show(Deal $deal)
{
	return view('deal.show',compact('deal'));
}
public function destroy(Request $request,$id)
{
	$deal=Deal::find($id);
	$deal->delete();
	return redirect()->back()->with('success','Deal Deleted!');
}
