<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('intro');
    }
    public function log()
    {
        return view('login');
    }
    public function read()
    {
        return view('/pages/read');
    }
    public function update()
    {
        return view('/pages/update');
    }
    public function delete()
    {
        return view('/pages/delete');
    }
    public function forUpdate()
    {       
        $id = $_POST["subject"];
        $db = \Config\Database::connect();

        $query = $db->query('UPDATE users SET nama="'.$_POST["nama"].'", alamat="'.$_POST["alamat"].'", username="'.$_POST["username"].'" WHERE id='.$id);
        $data = [
            'nama' => $_POST["nama"],
            'username' => $_POST["username"],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return view('intro');
    }
    public function forDelete()
    {       
        $id = $_POST["subject"];
        $db = \Config\Database::connect();

        $query = $db->query('DELETE from users where id='.$id);
        return view('/pages/delete');
    }
}
