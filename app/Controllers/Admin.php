<?php

namespace App\Controllers;

use Myth\Auth\Password;
use App\Models\AdminModel;
use App\Controllers\BaseController;


class Admin extends BaseController
{
    protected $adminModel;
    public function __construct() 
    {
       $this->adminModel = new AdminModel;
    }

    public function index()
    {  
        $data = [
            'title' => 'User List',
            'userlist' => $this->adminModel->getUser()
        ];
        return view('admin/index', $data);
    }

    public function detail($username)
    {
        $data = [
            'title' => 'Detail User',
            'userbyid' => $this->adminModel->getUser($username)
        ];

        //jika user tidak ada di tabel
        if(empty($data['userbyid'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User ' . $username . ' tidak ditemukan');
        }
        return view('admin/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add User',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/create', $data);
    }

    public function save()
    {

        //validasi input
        if(!$this->validate([
            'fullname' => 'required|trim',
            'username' => 'required|trim|is_unique[users.username]',
            'email' => 'required|is_unique[users.email]|valid_email',
            'password1' => 'required|trim|min_length[6]|matches[password2]',
            'image' => 'max_size[image,300]|is_image[image]|mime_in[image,image/jpg,image/jpeg]'
        ])) {
            return redirect()->to('/admin/create')->withInput();
        }

        //ambil gambar
        $fileImage = $this->request->getFile('image');

        if($fileImage->getError() == 4){
            $nameImage = 'default.jpg';
        }else{
            //generate nama file randomm
            $nameImage = $fileImage->getRandomName();
            //pindah file ke folder img
            $fileImage->move('img/profile', $nameImage);
        }

        $username = url_title($this->request->getVar('username'), '-', true);
        $this->adminModel->save([
            'fullname' => $this->request->getVar('fullname'),
            'username' => $username,
            'password_hash' => Password::hash($this->request->getVar('password1')),
            'email' => $this->request->getVar('email'),
            'active' => '1',
            'image' => $nameImage
            
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin');
    }

    public function delete($id) 
    {
        $admin = $this->adminModel->find($id);
        //hapus gambar
        if($admin['image'] != 'default.jpg'){
            unlink('img/profile/' . $admin['image']);
        }

        $this->adminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin');    
    }

    public function edit($username)
    {
        $data = [
            'title' => 'Edit User',
            'validation' => \Config\Services::validation(),
            'userbyid' => $this->adminModel->getUser($username)
        ];
        return view('admin/edit', $data);
    }

    public function update($id) 
    {
         //validasi input
        if(!$this->validate([
            'fullname' => 'required|trim',
            'image' => 'max_size[image,300]|is_image[image]|mime_in[image,image/jpg,image/jpeg]'
        ])) {
            return redirect()->to('/admin/edit/'.$this->request->getVar('username'))->withInput();
        }

        //ambil gambar
        $fileImage = $this->request->getFile('image');

        if($fileImage->getError() == 4){
            $nameImage = $this->request->getVar('oldImage');
        }else{
            //generate nama file randomm
            $nameImage = $fileImage->getRandomName();
            //pindah file ke folder img
            $fileImage->move('img/profile', $nameImage);
            //hapus file lama
            unlink('img/profile/' . $this->request->getVar('oldImage'));
        }
        
        $this->adminModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'image' => $nameImage
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/admin');        
    }
}
