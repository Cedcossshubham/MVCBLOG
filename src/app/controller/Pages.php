<?php

class Pages extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }


    public function index()
    {
        $users = $this->userModel->getUser();
        $data = [
            'users'=>$users
        ];
        $this -> view('pages/index', $data);
    }


    public function about()
    {
        $this -> view('pages/about');
    }


    public function login()
    {
        $this -> view('pages/login');
    }

    public function signup()
    {
        $this -> view('pages/signup');
    }



    public function home()
    {
        $this -> view('pages/home');
    }

    public function post()
    {
        $this -> view('pages/post');
    }


    public function contact()
    {
        $this -> view('pages/contact');
    }
}
