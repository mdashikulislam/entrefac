<?php

namespace App\Http\Controllers;

use App\Models\Donar;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function payment(Request $request)
    {
        DB::beginTransaction();
        try {
            $donate = new Donar();
            $donate->user_id = $request->user_id;
            $donate->amount = $request->amount;
            $donate->reference_id = $request->reference;
            $donate->email = $request->email;
            $donate->name = 'ass';
            $donate->status = $request->status;
            $donate->save();
            if ($donate->save()){
                $user = User::findOrFail($request->user_id);
                $user->payment_status = 'Approved';
                $user->save();
            }
            DB::commit();
            return new JsonResponse([
                'status'=>true,
                'message'=>'Donate successful'
            ],201);
        }catch (\Exception $exception){
            DB::rollBack();
            return new JsonResponse([
                'status'=>false,
                'message'=>'Donate not complete'
            ],501);
        }
    }
}
