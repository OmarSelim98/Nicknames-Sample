<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhoneController extends Controller
{
    public function saveContacts(Request $request)
    {
        Storage::put(time().'.json',json_encode($request->contacts));
        $contacts = $request->contacts;
        //for each contact, search for its model,
        //if doesn't exist, create one,
        //then save the name for the new/existing record;
        
        return response()->json([
            "status"=>"success"
        ]);
    }
    public function search(Request $request){
        return null;
    }
}
