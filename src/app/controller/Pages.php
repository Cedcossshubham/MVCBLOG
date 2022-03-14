<?php

use ActiveRecord\Model;

class Pages extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }


    public function index()
    {
        // $users = $this->userModel->getUser();

        $users = $this->model('User')::find('all');
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



    public function validate()
    {
        $user =[
            'email' => $_REQUEST['email']??"",
            'password' => $_REQUEST['password']??""
        ];

        $data = [
            'msg'=>"Trouble Logging Check email or Password !"
        ];

        $result = $this->userModel::find($user);

        if ($result) {
            // $this -> view('pages/home');
            header("location:home");
        } else {
            $this -> view('pages/login', $data);
        }
    }

    public function signup()
    {
        $pass = $_REQUEST['password']??"NONE";
        $email = $_REQUEST['email']??"NONE";

        $user =  $this->model('User');
        $user->username = $_REQUEST['username']??"NONE";
        $user->fullname = $_REQUEST['fullname']??"NONE";
        $user->email = $_REQUEST['email']??"NONE";
        $user->password = $_REQUEST['password']??"NONE";
        $confirmpassword = $_REQUEST['confirmpassword']??"NONE";

        $result = $this->userModel::find(array(
            'email'=> $email
        ));
        
        if ($pass != $confirmpassword) {
            $data = [
                'msg'=>"passwords not match!"
            ];
        } elseif ($result) {
            $data = [
                'msg'=>"email already exist!"
            ];
        } else {
            $data = [
                'msg'=>"Account created Successfully !"
            ];
            $user->save();
        }
      
        $this -> view('pages/signup', $data);
    }

    public function home()
    {
        $this -> view('pages/home');
    }

    public function post()
    {
        $this -> view('pages/post');
    }

    public function addpost()
    {
        $this -> view('pages/addpost');
    }

    public function contact()
    {
        $this -> view('pages/contact');
    }

    public function admindashboard()
    {
        $this -> view('pages/admindashboard');
    }
}
