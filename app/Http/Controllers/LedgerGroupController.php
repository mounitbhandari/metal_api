<?php

namespace App\Http\Controllers;

use App\Model\LedgerGroup;
use Illuminate\Http\Request;


class LedgerGroupController extends Controller
{
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

    public function store(Request $request)
    {
        $ledgerGroup = new LedgerGroup();
        $ledgerGroup->ledger_group_name=$request->ledger_group_name;
        $ledgerGroup->save();
        return response()->json(['success'=>1,'data'=>$ledgerGroup], 200,[],JSON_NUMERIC_CHECK);
    }
    public function update(Request $request)
    {
        $ledgerGroup = new LedgerGroup();
        $ledgerGroup=LedgerGroup::find($request->input('id'));
        $ledgerGroup->ledger_group_name = $request->input('ledger_group_name');
        $ledgerGroup->update();
        return response()->json(['success'=>1,'data'=>$ledgerGroup], 200,[],JSON_NUMERIC_CHECK);
    }
    public function updateById(Request $request,$id)
    {
        $ledgerGroup = new LedgerGroup();
        $ledgerGroup=LedgerGroup::find($id);
        $ledgerGroup->ledger_group_name = $request->input('ledger_group_name');
        $ledgerGroup->update();
        return response()->json(['success'=>1,'data'=>$ledgerGroup], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete($id)
    {
        $ledgerGroup=LedgerGroup::find($id);
        $result=$ledgerGroup->delete();
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
