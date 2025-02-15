<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Chore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ChoreController extends Controller
{
    
    // REGISTER CHORE
    public function doRegister($userId = "", Request $request) {

        if($userId == "") {
            return redirect()->route('chore.showRegister');
        }

        if(!Auth::check()) {
            return redirect()->route('user.showLogin');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:2',
                'description' => 'required',
                'due_date' => ['required', Rule::date()->after(today())]
            ]
        );

        if($validator->fails()) {
            redirect()->back()->withErrors($validator);
        }

        $newChore = new Chore();
        $newChore->name = $request->get('name');
        $newChore->description = $request->get('description');
        $fecha_cita_formatted = date('Y-m-d H:i:s', strtotime($request->get('due_date')));
        $newChore->due_date = $fecha_cita_formatted;
        $newChore->assigned_to = $userId;

        $newChore->save();

        $success = true;

        return view('chore_views.register', compact('success')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO
    }


    // SHOW FORM REGISTER CHORE
    public function showRegister() {
        return view('chore_views.register');
    }
    
    //
    public function updateStatus($id) {

        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|exists:App\Models\Chore,id'
            ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $chore = Chore::find($id);
        $chore->status = Status::COMPLETED->value;
        $chore->save();

        $user = User::find($chore->assigned_to);
        $chores = $user->chores()->get();

        return view('user_views.index', compact('chores', 'user')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO

    }

    public function delete($id) {

        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|exists:App\Models\Chore,id'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $chore = Chore::find($id);
        $chore->delete();

        $user = User::find($chore->assigned_to);
        $chores = $user->chores()->get();

        return view('user_views.index', compact('chores', 'user')); // CARGA LA VIEW PRINCIPAL CON LA INFO DEL USUARIO

    }
}
