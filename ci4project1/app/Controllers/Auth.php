<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User as UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        if($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[3]|max_length[32]|validateUser[username,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'username or password don\'t match'
                ]
            ];

            if(!$this->validate($rules,$errors)) {
                $data['validation'] = $this->validator;
            }else {
                $model = new UserModel();
                $password = $this->request->getVar('password');
                $password1 = md5($password);
                $user = $model->where('username',$this->request->getVar('username'))->first();
                $pass = $user['password'];
                if($password1 == $pass){
                    $this->setUserSession($user);
                    return redirect()->to('/');
                }
            }
            session()->setFlashData('errors',$errors['password']['validateUser']);
        }
        return view('intro',$data);
    }

    private function setUserSession($user) {
        $data = [
            'nama' => $user['nama'],
            'username' => $user['username'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function register(){
        $data = [];
        helper(['form']);
        if($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[2]|max_length[16]',
                'password' => 'required|min_length[2]|max_length[32]',
                'password_confirm' => 'matches[password]',
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else {
                $model = new UserModel();

                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($data);
                session()->setFlashData('success','Register Success!');
                return redirect()->to('/');
            }
        }
        return view('register',$data);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}