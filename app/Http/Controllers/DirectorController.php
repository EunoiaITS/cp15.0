<?php

namespace App\Http\Controllers;

use App\price_approval;
use App\Qr_invitations;
use App\Supplier_quotations;
use Illuminate\Http\Request;
use App\User;
use App\Quotation_requisition;
use App\Qr_items;
use App\Create_suppliers;
use Auth;

class DirectorController extends Controller
{
    public function viewQR(Request $request){
        if (!Auth::user()) {
            return redirect()
                ->to('/login')
                ->with('error-message', 'Please login first!');
        }else{
            $id = Auth::id();
            $user = User::find($id);
            if (!in_array($user->role, ['director', 'super_userController'])) {
                return redirect()
                    ->back()
                    ->with('error-message', 'You don\'t have authorization!');
            }
        }
        $qrs = Quotation_requisition::all();
        foreach($qrs as $qr){
            $items = Qr_items::where('qr_id', $qr->id)->get();
            $qr->items = $items;
        }
        return view('director.qr-orders', [
            'qrs' => $qrs,
            'page' => 'qr-order',
            'footer_js' => 'director.qr-js'
        ]);
    }

    public function viewSuppliers(Request $request){
        if (!Auth::user()) {
            return redirect()
                ->to('/login')
                ->with('error-message', 'Please login first!');
        }else{
            $id = Auth::id();
            $user = User::find($id);
            if (!in_array($user->role, ['director', 'super_userController'])) {
                return redirect()
                    ->back()
                    ->with('error-message', 'You don\'t have authorization!');
            }
        }
        $result = User::where('role', 'suppliers')->get();
        foreach($result as $supplier){
            $info = Create_suppliers::where('user_id', '=', $supplier->id)->get();
            $supplier->info = $info;
        }
        return view('director.suppliers-list', [
            'result'=> $result,
            'page' => 'view-supplier'
        ]);
    }

    public function approveQuotations(Request $request){
        if (!Auth::user()) {
            return redirect()
                ->to('/login')
                ->with('error-message', 'Please login first!');
        }else{
            $id = Auth::id();
            $user = User::find($id);
            if (!in_array($user->role, ['director', 'super_userController'])) {
                return redirect()
                    ->back()
                    ->with('error-message', 'You don\'t have authorization!');
            }
        }
        $quotations = Supplier_quotations::all();
        foreach($quotations as $q){
            $item_details = Qr_items::where('id', $q->item_id)->get();
            $q->item_details = $item_details;
            foreach($item_details as $i){
                $qr_details = Quotation_requisition::where('id', $i->qr_id)->get();
                $q->qr_details = $qr_details;
            }
            $supplier = User::find($q->supp_id);
            $q->supplier_details = $supplier;
        }
        return view('director.approve-quotations', [
            'page' => 'approve',
            'quotations' => $quotations
        ]);
    }

    public function allowPriceShow(Request $request){
        if (!Auth::user()) {
            return redirect()
                ->to('/login')
                ->with('error-message', 'Please login first!');
        }else{
            $id = Auth::id();
            $user = User::find($id);
            if (!in_array($user->role, ['director', 'super_userController'])) {
                return redirect()
                    ->back()
                    ->with('error-message', 'You don\'t have authorization!');
            }
        }
        $supqr = Supplier_quotations::all();
        foreach ($supqr as $qr){
            $item = Qr_items::where('id','=',$qr->item_id)->get();
            $qr->item = $item;
            foreach($qr->item as $qrid){
                $quo = Quotation_requisition::where('id','=',$qrid->qr_id)->get();
                $qrid->quo = $quo;
            }
        }
            if($request->isMethod('post')){
                $pa = new price_approval();
                $pa->pr_id = $request->pr_id;
                $pa->manager = $request->manager;
                $pa->executive = $request->executive;
                $pa->save();
                return redirect('allow-price-show')->with('success-message','Approved !!');
            }

        return view('director.allow-price-show')->with(array(
            'page' => 'allow',
            'supqr' => $supqr
        ));
    }
}
