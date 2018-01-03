<?php

use Illuminate\Support\Facades\Hash;

class InstallationController extends BaseController {

    public $mysql_connectable = true;

    public function __construct() {
        
    }

    public function index() {
        return View::make('installation');
    }

    public function postinstall() {
        $input = Input::all();
        error_reporting(E_ALL ^ E_DEPRECATED);
        try {
            $conn = mysql_connect($input['dbhostname'], $input['dbusername'], $input['dbpassword']);
        } catch (Exception $ex) {
            echo 'Error connecting database: ' . mysql_error() . "\n";
            die;
        }
        $sql = 'CREATE Database ' . $input['dbname'];
        $retval = mysql_query($sql, $conn);
//        if (!$retval) {
//            die('Could not create database: ' . mysql_error());
//        }
        
        $sqlpath = base_path() . '\database\fundstarter_ins.sql';
        $this->filewrite($input);
        DB::unprepared(file_get_contents($sqlpath));
        
        $password = Hash::make($input['adminpassword']);
        if (DB::connection()->getDatabaseName()) {
        Admin::where('id', '=', 1)->update(array('name' => $input['adminname'], 'email' => $input['adminemail'], 'password' => $password));
        }else{
            "not connected";
        }
        return Redirect::to('/');
    }

    public function filewrite(array $input) {
        $config = '<?php if ($_SERVER["HTTP_HOST"] == "192.168.1.251:8081") {';
        $config.='$host="' . $input['dbhostname'] . '";';
        $config.='$dbname="' . $input['dbname'] . '";';        
        $config.='$dbusername="' . $input['dbusername'] . '";';
        $config.='$dbpassword="' . $input['dbpassword'] . '";';
        $config.='} else {';
        $config.='$host="' . $input['dbhostname'] . '";';
        $config.='$dbname="' . $input['dbname'] . '";';        
        $config.='$dbusername="' . $input['dbusername'] . '";';
        $config.='$dbpassword="' . $input['dbpassword'] . '";';
        $config.='}';
        //$file = fopen("/dbconfig.php", "w");
        $info = "Remove file for fresh database installation";
        $dummyfile = base_path() . '\dummy.php';
        file_put_contents($dummyfile, $info);
        $file = base_path() . '\fundstarterdbconfig.php';
        return file_put_contents($file, $config);
    }

}
