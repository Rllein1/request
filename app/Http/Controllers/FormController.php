<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms=Form::where('reciever',Auth::user()->id)->orWhere('sender',Auth::user()->dept->id)->get();
        if (Auth::user()->role_id==2) {
            return view('pages/office-head/dashboard', compact('forms'));
        }elseif(Auth::user()->role_id==3){
            return view('pages/office/dashboard', compact('forms'));
        }else{
            return view('pages/ICTC/dashboard', compact('forms'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $form               =     New Form;
            $form->sender=Auth::user()->dept->id;
            if(Auth::user()->role_id == 3){
                $form->reciever =     Auth::user()->dept->head->id;
            }else{
                $form->reciever =     3;
            }
            $form->requestby    =     $request->requestby;
            $form->dateneeded   =     $request->dateneeded;
            foreach ($request->services as $service ) {
                $form->typeofservice.=$service.',';
            }
            $form->description  =      $request->description;
            $form->status       =      1;
            $form->remark       =      "";
            $form->save();
            return back();
        } catch (\Throwable $th) {
            return "'OOPPPPSSSSS'";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dt = new DateTime();
    echo $dt->format('Y-m-d H:i:s');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    /**
     * FORM STATUS
     * 1 = PENDING
     * 2 = ONPROCESS
     * 3 = COMPLETED
     * 4 = NOT COMPLETED
     */

        $form=Form::find($id);
        $form->status = $request->status;
        if(Auth::user()->role_id==2){
            $form->reciever=3;
        }
        $form->remark=$request->remark;
        $form->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
