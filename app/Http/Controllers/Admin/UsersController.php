<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
//spatie
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;
use PhpParser\Node\Expr\Assign;

class UsersController extends Controller
{

    public function __construct(){

      $this->middleware('can:admin.users.index')->only('index');
      $this->middleware('can:admin.users.create')->only('create','store');
      $this->middleware('can:admin.users.edit')->only('edit','update');
      $this->middleware('can:admin.users.destroy')->only('destroy');
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // $users = User::all();$informes = Informe::where('status',1)->latest('id')->paginate(6);
        $users = User::where('status', 1)->latest('id')->paginate(8);
         return view('admin.users.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck('name','name')->all();
        $roles = Role::all();
         return view('admin.users.create', compact('roles'));    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'email' => 'email address'
        //'email' => 'El campo :attribute debe ser una dirección de correo válida.',
        //'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
        //'fechaFinal' => 'required|gte:fechaInicial',
        //'fechaFinal' => 'required|after_or_equal:fechaInicial',
       // 'title' => 'required|unique:posts|max:255',
       
       //$request->validate(['name' => 'required|string|max:255'
       //'email'=>'required|string|email|max255|unique:users'
        //'password'=>['required','confirmed',
        //rules\Password::min(8)
        //],
        //]);
             
        // Controlador

        // $data = request()->validate([
        //       'nombre' => 'required',
        //       'username' => 'required|unique:users,userName',
        //       'email' => 'required|unique:users,email|email',
        //       'password' => 'required|min:6|confirmed'
        //     ]);
        // Vista
        
        // <div class="form-group">
        //    <label for="password">Password</label>
        //    <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese password">
        // </div>
        
        // <div class="form-group">
        //  <label for="confirm_password">Confirm Password</label>
        //  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
        // </div>
//este 1
        $request->validate([

            'name' => 'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
            // 'roles'=> 'required'
        ]);
        
      //  return $request;
//este 2


      // $input =$request->all();
      // $input['password'] = Hash::make($input['password']);

      $user = User::create([
        'name' => $request->name,
        'email'=> $request->email,
        'password'=> bcrypt($request->password),
        'created_at' =>Carbon::now(),
        'updated_at' =>Carbon::now()
      ]);

      $user->assignRole($request->input('roles'));
    //    User::create([
        
    //     'email' => $data['email'],
    //     'password' => bcrypt($data['password']),
    // ]);
       
    // //    // return $request->tipoequipo_id;
  //este 3
      return redirect()->route('admin.users.index',$user)->with('crear', 'si');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $tipoequipos=Tipoequipo::where('status', 1)->pluck('Descripcion','id');
      $roles = Role::all();
      return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            $request->validate([

            'name' => 'required',
            'email'=>"required|email|unique:users,email,$user->id",
            'password'=>'required|min:8|confirmed',
            'roles'=> 'required'
        ]); 

                                    // $input = $request->all();
                                  // if(!empty($input['password'])){
                                  //   $input['password'] = Hash::make($input['password']);
                                  // }else{
                                  //   $input = Arr::except($input, array('password'));
                                  // }
      
      $user->update([
        'name' => $request->name,
        'email'=> $request->email,
        'password'=> bcrypt($request->password),
        'updated_at' =>Carbon::now()
      ]);

     $user->roles()->sync($request->roles); 
     

    return redirect()->route('admin.users.index',$user)->with('actualiza', 'si');
    // return $user;
      
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $userborra = DB::table('users')
        ->where('id',$user->id)
        ->update(['status'=>2]);
     
    return redirect()->route('admin.users.index')->with('eliminar', 'ok');
    }
}