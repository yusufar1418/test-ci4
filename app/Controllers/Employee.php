<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Controllers\BaseController;


class Employee extends BaseController
{
    protected $employeeModel;
    public function __construct() 
    {
       $this->employeeModel = new EmployeeModel;
    }

    public function index()
    {  
        $data = [
            'title' => 'Employee List',
            'employeelist' => $this->employeeModel->getEmployee()
        ];
        return view('employee/index', $data);
    }

    public function detail($nip)
    {
        $data = [
            'title' => 'Detail Employee',
            'employeebyid' => $this->employeeModel->getEmployee($nip)
        ];

        //jika user tidak ada di tabel
        if(empty($data['employeebyid'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Employee ' . $nip . ' tidak ditemukan');
        }
        return view('employee/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Employee',
            'validation' => \Config\Services::validation()
        ];
        return view('employee/create', $data);
    }

    public function save()
    {

        //validasi input
        if(!$this->validate([
            'name' => 'required|trim',
            'email' => 'required|trim|is_unique[employee.email]|valid_email',
            'phone_number' => 'required|trim',
            'image' => 'max_size[image,300]|is_image[image]|mime_in[image,image/jpg,image/jpeg]',
            'place' => 'required|trim',
            'date_birth' => 'required|trim',
            'gender' => 'required|trim',
            'address' => 'required|trim',
            'position' => 'required|trim',
            'status_employee' => 'required|trim',
            'hire_date' => 'required|trim'
        ])) {
            return redirect()->to('/employee/create')->withInput();
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
            $numRowEmployee = $this->employeeModel->numRowEmployee();
					
            if ($numRowEmployee > 0) {
                $newID = $numRowEmployee + 1;
            } else {
                $newID = 1;
            }

            $jumlah_nol = strlen($newID);
                $angka_nol = 5 - $jumlah_nol;
                $nol = "";
                for($i=1;$i<=$angka_nol;$i++)
                {
                    $nol .= '0';
                }

            $nip = 'EM'.$nol.$newID. date('dm',time()).date('y',time());
        $this->employeeModel->save([
            'name' => $this->request->getVar('name'),
            'image' => $nameImage,
            'email' => $this->request->getVar('email'),
            'phone_number' => $this->request->getVar('phone_number'),
            'nip' => $nip,
            'place' => $this->request->getVar('place'),
            'date_birth' => strtotime($this->request->getVar('date_birth')),
            'gender' => $this->request->getVar('gender'),
            'address' => $this->request->getVar('address'),
            'position' => $this->request->getVar('position'),
            'status_employee' => $this->request->getVar('status_employee'),
            'hire_date' => strtotime($this->request->getVar('hire_date'))
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/employee');
    }

    public function delete($id) 
    {
        $employeebyid = $this->employeeModel->find($id);
        //hapus gambar
        if($employeebyid['image'] != 'default.jpg'){
            unlink('img/profile/' . $employeebyid['image']);
        }

        $this->employeeModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/employee');    
    }

    public function edit($nip)
    {
        $data = [
            'title' => 'Edit Employee',
            'validation' => \Config\Services::validation(),
            'employeebyid' => $this->employeeModel->getEmployee($nip)
        ];
        return view('employee/edit', $data);
    }

    public function update($id) 
    {
        $employeebyid = $this->employeeModel->find($id);
        $emailbyid =  $employeebyid['email'];

        if($emailbyid == $this->request->getVar('email')){
           $rulesEmail = 'required|trim|valid_email'; 
        }else{
            $rulesEmail = 'required|trim|is_unique[employee.email]|valid_email'; 
        }
        //validasi input
        if(!$this->validate([
            'name' => 'required|trim',
            'email' => $rulesEmail,
            'phone_number' => 'required|trim',
            'image' => 'max_size[image,300]|is_image[image]|mime_in[image,image/jpg,image/jpeg]',
            'place' => 'required|trim',
            'date_birth' => 'required|trim',
            'gender' => 'required|trim',
            'address' => 'required|trim',
            'position' => 'required|trim',
            'status_employee' => 'required|trim',
            'hire_date' => 'required|trim'
        ])) {
            return redirect()->to('/employee/edit/'.$this->request->getVar('nip'))->withInput();
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
        
        $this->employeeModel->save([
            'idemployee' => $id,
            'name' => $this->request->getVar('name'),
            'image' => $nameImage,
            'email' => $this->request->getVar('email'),
            'phone_number' => $this->request->getVar('phone_number'),
            'place' => $this->request->getVar('place'),
            'date_birth' => strtotime($this->request->getVar('date_birth')),
            'gender' => $this->request->getVar('gender'),
            'address' => $this->request->getVar('address'),
            'position' => $this->request->getVar('position'),
            'status_employee' => $this->request->getVar('status_employee'),
            'hire_date' => strtotime($this->request->getVar('hire_date'))
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/employee');        
    }
}
