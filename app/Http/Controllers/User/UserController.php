<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\User;
use Validator;

class UserController extends Controller
{
	public function __construct()
	{
        $this->middleware('auth');
    }

    public function index(){

        $users = User::all();

	    return view('admin.user.index', compact('users'));

    }


    public function show($id){
        try {
            $user = User::findOrFail($id);
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            Return redirect()->route('admin.user.index')->with('warning', 'Usuário não encontrado.');
        }
	    return view('admin.user.show', compact('user'));
    }


    public function edit($id){
        try {
            $user = User::findOrFail($id);
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            Return redirect()->route('admin.user.index')->with('warning', 'Usuário não encontrado.');
        }
        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request, $id){

	    $request->validate([
            'name' => 'required|min:6|max:250',
            'email' => 'required|email|unique:users,id',
            'phone' => 'required|min:11|max:16',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

	    $user = User::findOrFail($id);
	    $photoName = null;

	    if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photoName = uniqid(date('HisYmd')).'.'.request()->photo->getClientOriginalExtension();
            $upload = $request->photo->storeAs('avatars', $photoName);

            if(!$upload)
                return back()->withInput()->with('warning', 'Erro ao salvar a foto');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->photo = $photoName ?: $user->photo;

        $user->save();

        Return redirect()->route('admin.user.show', ['id'=>$id])->with('success', 'Usuário atualizado.');

    }


    public function updatePassword(Request $request, $id){


        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails())
            return back()->with('warning', 'As senhas não conferem');

        $userId = Auth::user()->id;

	    $user = User::findOrFail($userId);
	    $user->password = bcrypt($request->password);
        $user->save();

        Auth::loginUsingId($userId);

        return back()->with('success', 'Senha alterada com sucesso');

    }

    public function create(){
	    //TODO passar roles para a view
	    return view('admin.user.create');
    }

    public function save(Request $request){

	    $request->validate([
            'name' => 'required|min:6|max:250',
            'email' => 'required|email|unique:users,id',
            'phone' => 'required|min:11|max:16',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoName = null;

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photoName = uniqid(date('HisYmd')).'.'.request()->photo->getClientOriginalExtension();
            $upload = $request->photo->storeAs('avatars', $photoName);

            if(!$upload)
                return back()->withInput()->with('warning', 'Erro ao salvar a foto, o usuário não foi cadastrado');
        }

        $photoName = $photoName ?: 'user.png';


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(10)),
            'phone' => $request->phone,
            'actived' => true,
            'photo' => $photoName,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.user.show', ['id'=>$user->id])->with('success', "O Usuário ".primeiroNome($user->name)." foi cadastrado");
    }

    public function delete($id){

	    $user = User::findOrFail($id);

	    if($user->id)
	        User::destroy($id);
    }



}
