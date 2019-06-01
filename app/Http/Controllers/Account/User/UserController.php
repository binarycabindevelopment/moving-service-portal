<?php

namespace App\Http\Controllers\Account\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function edit(){
        return view('account.user.edit');
    }

    public function update(Request $request){
        $user = \Auth::user();
        $user->update($request->only([
            'email', //TODO Check for exisitng
        ]));
        if(!empty($request->get('password'))){
            $user->password = \Hash::make($request->get('password'));
            $user->save();
        }
        return redirect('/dashboard')->withSuccess('Saved!');
    }

}