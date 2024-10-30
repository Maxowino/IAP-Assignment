  <?php

  session_start();

  require "includes/constants.php";
  require "includes/dbconnection.php";

  require "lang/en.php";

function classAutoLoad($classname){
$directories=["headings","layout","menus","pages"];

foreach ($directories As $dir){
    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir .DIRECTORY_SEPARATOR . $classname. ".php";
    if(file_exists($filename) AND is_readable($filename)){
         require_once $filename;
         }
    }
}

spl_autoload_register('classAutoLoad');

    $ObjGlob = new fncs();
    $ObjSendMail= new SendMail();



require_once "user_details.php";
// require_once "layout/layout.php";
// require_once "menus/menus.php";
// require_once "headings/headings.php";

//create class instance
     $Objlayout = new layout();
    $Objmenus=new menus();
    // $Objheading=new heading();
    $Objheading= new headings();
    $ObjCont = new content();
    $ObjForm= new user_forms();
    

    require "includes/constants.php";
    require "includes/dbconnection.php";

    $conn = new dbconnection(DBTYPE,HOSTNAME,DBPORT,HOSTUSER,HOSTPASS,DBNAME);


    $ObjAuth = new auth();
    $ObjAuth->signup($conn, $ObjGlob,$ObjSendMail,$lang,$conf);
    $ObjAuth->verify_code($conn, $ObjGlob,$ObjSendMail,$lang,$conf);
    $ObjAuth->set_passphrase($conn, $ObjGlob,$ObjSendMail,$lang,$conf);
    $ObjAuth->signin($conn, $ObjGlob,$ObjSendMail,$lang,$conf);
    $ObjAuth->signout($conn, $ObjGlob,$ObjSendMail,$lang,$conf);
    $ObjAuth->save_details($conn, $ObjGlob,$ObjSendMail,$lang,$conf);
// $Obj = new user_details();
// $arr= [ "Black", "white", "green","red"];
// foreach ($arr as $color){
//     print $color . "<br>";  
// }
//  print dirname(__FILE__);
//  print "<br>";
//  print "<br>";

//  print $_SERVER["PHP_SELF"]; 
//  if(file_exists("index.php") AND is_readable("index.php")){
//     print "yes";
//  }
//   else{
//     print "No";
//   }