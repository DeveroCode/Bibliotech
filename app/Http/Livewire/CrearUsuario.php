<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearUsuario extends Component
{
    public $datas;
    public $name; // ->
    public $apellido_paterno;
    public $apellido_materno;
    public $fecha;
    public $email; // ->
    public $password; // ->
    public $genero;
    public $rol; // ->
    public $telefono;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'fecha' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'genero' => 'required',
        'rol' => 'required',
        'telefono' => 'required',
        'imagen' => 'image|max:1024',
    ];

    public function mount()
    {
        $generos = public_path('js/generos.json');
        $this->datas = json_decode(file_get_contents($generos), true);
    }

    public function crearUsuario()
    {
        $datos = $this->validate();
        $imagen = $this->imagen->store('public/users-profile');
        $datos['imagen'] = str_replace('public/users-profile/', '', $imagen);

        // dd($datos);
        $user = User::create([
            'name' => $datos['name'],
            'apellido_paterno' => $datos['apellido_paterno'],
            'apellido_materno' => $datos['apellido_materno'],
            'fecha' => $datos['fecha'],
            'email' => $datos['email'],
            'password' => bcrypt($datos['password']),
            'genero' => $datos['genero'],
            'rol' => $datos['rol'],
            'telefono' => $datos['telefono'],
            'imagen' => $datos['imagen'],
        ]);

      

        session()->flash('message', 'Usuario creado exitosamente');

        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.crear-usuario', [
            'generos' => $this->datas['generos'],
            'roles' => $this->datas['roles'],
        ]);
    }
}