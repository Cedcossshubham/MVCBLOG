<?php

use ActiveRecord\Model;

class Pages extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->blogModel = $this->model('Blog');
    }


    public function index()
    {
        $users = $this->model('User')::find('all');
        $data = [
            'users'=>$users
        ];
         $this -> view('pages/index', $data);
    }


    /**
     * redirct to login page
     *
     * @return void
     */
    public function login()
    {
        $this -> view('pages/login');
    }


    /**
     * validate user details before signin
     *
     * @return void
     */
    public function validate()
    {
        $email = $_REQUEST['email']??"";
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $user =[
            'email' => $email,
            'password' => $_REQUEST['password']??""
        ];

        $result = $this->userModel::find($user);

        $userdata = [
            'user_id'=>$result->user_id??"",
            'username'=>$result->username??"",
            'fullname'=>$result->fullname??"",
            'email'=>$result->email??"",
            'role'=>$result->role??""
        ];

        if (isset($result) && $result->status == 'approved') {
            $data = [
                'msg'=>""
            ];

            if (isset($_SESSION['user'])) {
                $_SESSION['user'] = $userdata;
            } else {
                $_SESSION['user'] = $userdata;
            }
            if ($result->role == 'admin') {
                header("location:dashboard");
            } else {
                header("location:userdashboard");
            }
        } elseif (isset($result) && $result->status == 'pending') {
            $data = [
                'msg'=>"Account Not approved yet!"
            ];
            $this -> view('pages/login', $data);
        } else {
            $data = [
                'msg'=>"Trouble Logging check email or Password !"
            ];
            $this -> view('pages/login', $data);
        }
    }


    /**
     * signup user
     * @return void
     */
    public function signup()
    {
        $pass = $_REQUEST['password']??"";
        $pass =filter_var($pass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        $email = $_REQUEST['email']??"";
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $username = $_REQUEST['username']??"";
        $username =filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        $fullname = $_REQUEST['fullname']??"";
        $fullname =filter_var($fullname, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        
        $confirmpassword = $_REQUEST['confirmpassword']??"";
        $confirmpassword =filter_var($confirmpassword, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
               

        $result = $this->userModel::find(array(
            'email'=> $email
        ));

        if (empty($pass) || empty($email) || empty($username) || empty($fullname) || empty($pass) || empty($confirmpassword)) {
            $data = [
                'msg'=>"All fields are required!"
            ];
        } elseif ($pass != $confirmpassword) {
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

            $user =  $this->model('User');
            $user->username = $_REQUEST['username']??"";
            $user->fullname = $_REQUEST['fullname']??"";
            $user->email = $_REQUEST['email']??"";
            $user->password = $_REQUEST['password']??"";
            $confirmpassword = $_REQUEST['confirmpassword']??"";
            $user->save();
        }
      
        $this -> view('pages/signup', $data);
    }
    
    /**
     * populate blogs on home page
     *
     * @return void
     */
    public function home()
    {
        $blog = $this->blogModel::find('all', array('status'=>'show'));

        $data=[
            'blogs'=>$blog
        ];

        $this->view('pages/home', $data);
    }


    /**
     * redirect to add post page
     *
     * @return void
     */
    public function addpost()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $this -> view('pages/addpost');
    }

    /**
     * create blog post
     *
     * @return void
     */
    public function createPost()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }
        $title = $_REQUEST['blogtitle']??"";
        $title =filter_var($title, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        $content = $_REQUEST['blogcontent']??"";
        $content = filter_var($content, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


        $blog =  $this->model('Blog');
        $blog->blogtitle = $title;
        $blog->content = $content;
        $blog->user_id = $_SESSION['user']['user_id']??"";
        $blog->username = $_SESSION['user']['username']??"";
        $blog->save();
        
        $data =[
            'msg'=>"Blog successfully created"
        ];
        $this -> view('pages/addpost', $data);
    }

    
    public function admindashboard()
    {
        $this -> view('pages/admindashboard');
    }


    /**
     * display users on admin dashboard
     *
     * @return void
     */
    public function dashboard()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $users = $this->model('User')::find('all');
        $data = [
            'users'=>$users
        ];

        $this->view('pages/dashboard', $data);
    }

    
    /**
     * change user account status as pending or approved
     *
     * @return void
     */
    public function changeStatus()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }
    
        $id = $_REQUEST['id']??"";

        $result = $this->userModel::find(array(
            'user_id'=>$id,
        ));

        if ($result->status == 'pending') {
            $result->status = 'approved';
            $result->save();
            header('Location:dashboard');
        } elseif ($result->status == 'approved') {
            $result->status = 'pending';
            $result->save();
            header('Location:dashboard');
        }
    }

    /**
     * delete specific user
     *
     * @return void
     */
    public function deleteUser()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $id = $_REQUEST['id']??"";
        
        $result = $this->userModel::find(array(
                'user_id'=>$id,
        ));
        $result->delete();
        header('Location:dashboard');
    }



    /**
     * display user profile
     *
     * @return void
     */
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $this -> view('pages/profile');
    }

    public function userdashboard()
    {
        $this -> view('pages/profile');
    }

    /**
     * display blog on profiles based on userrole
     *
     * @return void
     */
    public function viewblog()
    {
        $id = $_SESSION['user']['user_id']??"";
        $role = $_SESSION['user']['role']??"";

        if ($role == 'user') {
            $data = [$this->blogModel::find('all', array('user_id'=>$id))];
            // $data = [
            //     'blogs'=>$blog,
            // ];
        } else {
            $data = [$this->blogModel::find('all')];
            // $data = [
            //     'blogs'=>$blog,
            // ];
        }
        
         $this->view('pages/viewblog', $data);
    }

    /**
     * change status to hide of specific blog
     *
     * @return void
     */
    public function hideblog()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $blogid = $_REQUEST['id']??"";

        $result = $this->blogModel::find(array(
            'blog_id'=>$blogid,
        ));

        if ($result->status == 'hide') {
            $result->status = 'show';
            $result->save();
            header('Location:viewblog');
        } elseif ($result->status == 'show') {
            $result->status = 'hide';
            $result->save();
            header('Location:viewblog');
        }
    }


    /**
     * populate blog details on edit blog page
     *
     * @return void
     */
    public function editBlog()
    {
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $blogid = $_REQUEST['id']??"";
        $blog = $this->blogModel::find(array($blogid));
        $data=[
            'title' => $blog->blogtitle,
            'content' => $blog->content
        ];

        $this->view('pages/addpost', $data);
    }

    
    /**
     * delete specific blog
     *
     * @return void
     */
    public function deleteblog()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $id = $_REQUEST['id']??"";
        $result = $this->blogModel::find(array(
                'blog_id'=>$id,
        ));
        $result->delete();
        header('Location:viewblog');
    }


    /**
     * update specific blog
     *
     * @return void
     */
    public function updatePost()
    {
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $id = $_REQUEST['id']??"";
        $blog = $this->blogModel::find(array(
                'blog_id'=>$id,
        ));

        $title = $_REQUEST['blogtitle']??"";
        $title =filter_var($title, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        $content = $_REQUEST['blogcontent']??"";
        $content = filter_var($content, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);


        $blog->blogtitle = $title;
        $blog->content = $content;
        $blog->save();
        $data=[
            'msg'=>'Blog successfully updated!'
        ];
        $this->view('pages/addpost', $data);
    }

    /**
     * display details of a specific blog
     *
     * @return void
     */
    public function fullpost()
    {
        $id = $_REQUEST['id']??"";
        $blog = $this->blogModel::find(array(
            'blog_id'=>$id,
        ));

        $data=[
            'title' => $blog->blogtitle,
            'content' => $blog->content,
            'username' => $blog->username,
            'date' => $blog->date
        ];
        
        $this->view('pages/fullpost', $data);
    }
    
    /**
     * populate user details on edit profile page
     */

    public function editprofile()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $id = $_REQUEST['id']??"";

        $users = $this->model('User')::find(array('user_id'=>$id));
        $data = [
            'user'=>$users
        ];

        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $this->view('pages/editprofile', $data);
    }

    /**
     * update user profile function
     *
     * @return void
     */
    public function updateProfile()
    {
         
        if (!isset($_SESSION['user'])) {
            header('Location:login');
        }

        $email = $_REQUEST['email']??"";
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $username =$_REQUEST['username']??"";
        $fullname =$_REQUEST['fullname']??"";

       
        $username =filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $fullname =filter_var($fullname, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        $id = $_REQUEST['id']??"";

        $user = $this->model('User')::find(array('user_id'=>$id));

        $user->username = $username;
        $user->fullname = $fullname;
        $user->email = $email;
        $user->save();

        // rewrite session data
        $result = $this->model('User')::find(array('user_id'=>$id));

        $userdata = [
            'user_id'=>$result->user_id??"",
            'username'=>$result->username??"",
            'fullname'=>$result->fullname??"",
            'email'=>$result->email??"",
            'role'=>$result->role??""
        ];

        $_SESSION['user'] = $userdata;


        $data =[
            'msg'=>"profile updated successfully!"
        ];
        $this->view('pages/editprofile', $data);
    }

    /**
     * signout function
     *
     * @return void
     */
    public function signout()
    {
        session_destroy();
        header('Location:login');
    }
}
