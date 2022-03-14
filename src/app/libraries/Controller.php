<?php
//Load the models and the view
class Controller
{
    //=============change code==========
    public function model($model)
    {
        require_once '../app/libraries/php-activerecord/ActiveRecord.php';

        \ActiveRecord\Config::initialize(function ($cfg)
        {
            $cfg->set_model_directory('../app/models');
            $cfg->set_connections(array(
                'development' => 'mysql://root:secret@mysql-server/blog'));
        });

        require_once '../app/models/'.$model.'.php';

       // $model = '\\App\\Models\\'. $model;
        return new $model;
    }

    //=======================
    // public function model($model)
    // {
    //     require_once '../app/models/'.$model.'.php';
    //      //Instantiate model
    //     return new $model();
    // }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/'.$view.'.php')) {
            require_once '../app/views/'.$view.'.php';
        } else {
            die("View does not exists");
        }
    }
}
