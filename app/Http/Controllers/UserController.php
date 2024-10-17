<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use App\Models\Kelas;


class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $this->userModel = new UserModel();

        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm =""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }

    public function create(){
        $kelasModel = new Kelas();
    
        // Mengambil data kelas menggunakan method getKelas
        $kelas = $kelasModel->getKelas();
    
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
    
        return view('create_user', $data);
    }

    public function store(Request $request){
            // Validasi input
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
            'foto' => 'image|file|max:2048', // Validasi foto
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename); // Menyimpan file ke storage

            $this->userModel = new UserModel(); 

            // Simpan data user ke database
            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $filename ?? null, // Menyimpan nama file ke database
            ]);
        }
        return redirect()->to('/user');
    }

    public function view($id){

        $this->userModel = new UserModel(); 

        $this->kelasModel = new Kelas();

        $user = $this->userModel->findOrFail($id);
        
        $kelas = $this->kelasModel->find($user->kelas_id);

        $title = 'View User';

        return view('View_User',compact('user', 'kelas', 'title'));
    }

    public function edit($id){
    
        // Menggunakan findOrFail agar langsung mengembalikan 404 jika tidak ada data
        $user = $this->userModel->findOrFail($id); 
        
        // Mendapatkan daftar kelas
        $kelas = $this->kelasModel->all(); // Mengambil semua kelas, bukan hanya yang terpilih
    
        $title = 'Edit User';
    
        return view('edit_user', compact('user', 'kelas', 'title'));
    }
    

    public function update(Request $request, $id){

        $this->userModel = new UserModel(); 
        $user = $this->userModel->findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;


        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads '), $fileName);
            $user->foto = 'uploads/' .$fileName;
        }
        $user->save();
        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }

    public function destroy($id){

        $this->userModel = new UserModel(); 

        $user = $this->userModel->findOrFail($id);
        
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User has been deleted successfully');
    }

}
