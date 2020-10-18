<?php

namespace App\Http\Controllers;

use App\Model\LedgerGroup;
use Illuminate\Http\Request;


class LedgerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record=LedgerGroup::get();
        return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getLedgerGroupById($id)
    {
        $record=LedgerGroup::where('id',$id)->first();
        return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);

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
        $ledgerGroup = new LedgerGroup();
        $ledgerGroup->ledger_group_name=$request->ledger_group_name;
        $ledgerGroup->save();
        return response()->json(['success'=>1,'data'=>$ledgerGroup], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function show(LedgerGroup $ledgerGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(LedgerGroup $ledgerGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LedgerGroup $ledgerGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\LedgerGroup  $ledgerGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(LedgerGroup $ledgerGroup)
    {
        //
    }
}
