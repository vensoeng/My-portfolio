<?php
use LDAP\Result;
session_start();
include '../checkuser/index.php';
include '../geturl/index.php';
admin(getBaseUrl(''));

class posts
{
    public $id;
    public $status;
    public $title;
    public $main_title;
    public $hastag;
    public $img;
    public $file;
    public $created_at;
    public $updated_at;
    public function __construct()
    {
        $this->id = 'id';
        $this->status = 'status';
        $this->title = 'title';
        $this->main_title = 'main_title';
        $this->hastag = 'hastag';
        $this->img = 'img';
        $this->file = 'file';
        $this->created_at = 'created_at';
        $this->updated_at = 'updated_at';

    } 
}
class Request extends posts
{
    public function __construct()
    {
        $post = new posts();
        $this->status = $_POST[$post->status] ?? 1;
        $this->title = $_POST[$post->title];
        $this->main_title = $_POST[$post->main_title];
        $this->hastag = $_POST[$post->hastag];
        $this->img = $_FILES[$post->img]['name'];
        $this->file = $_FILES[$post->file]['name'];
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }
}
class GetItem extends posts
{
    public function __construct($conn, $id)
    {
        $posts = new posts();

        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        if($result){
            $this->id = $result[$posts->id];
            $this->status = $result[$posts->status];
            $this->title = $result[$posts->title];
            $this->main_title = $result[$posts->main_title];
            $this->hastag = $result[$posts->hastag];
            $this->img = $result[$posts->img];
            $this->file = $result[$posts->file];
            $this->created_at = $result[$posts->created_at];
            $this->updated_at = $result[$posts->updated_at];
        }
    }
}
// this Is for add post to database
if ($_SERVER['REQUEST_METHOD']) 
{
    include '../index.php';//for use funtion 
    include '../dbcon/index.php'; //for use database connect
    // add new post 
    if(isset($_POST['action']) && $_POST['action'] == 'POST')
    {
        $posts = new posts();
        $request = new Request();
        if($request->title == "" || $request->img == "" || $request->file == ""){
            location_back();
            return;
        }
        $img_name = '';
        $file_name = '';
        if (isset($request->img) && isset($request->file)) {
            $img_name = getfileImage($request->img);
            $file_name = getfileImage($request->file);
        }
        // this is for run insert data sql 
        $sql = "INSERT INTO 
        posts(
            $posts->title,
            $posts->main_title,
            $posts->hastag,
            $posts->img,
            $posts->file,
            $posts->created_at,
            $posts->updated_at
        ) 
            VALUES
        (
            '$request->title',
            '$request->main_title',
            '$request->hastag',
            '$img_name',
            '$file_name',
           '$request->created_at',
            '$request->updated_at'
        )";
        $result = $conn->query($sql); // this is insert data to db
        if ($result) {
            if(isset($request->img) && isset($request->file))
            {
                move_file($_FILES[$posts->img],$img_name);
                move_file($_FILES[$posts->file],$file_name);
            }
            location_back(); //back to old route
        }else
        {
            echo "Error Add data";
            // location_back();
        }  
    }
    if(isset($_GET['post']))  //show form for edit
    {
        $item = new GetItem($conn,$_GET['post']);
        include '../../admin/edit.php';
    }
    if(isset($_POST['action']) && $_POST['action'] == 'PUT') //this is for update 
    {
        $request = new Request();
        $item = new GetItem($conn, $_POST['id']);
        $postModel = new posts();
        if($request->title == ""){
            location_back();
            return;
        }
        //check use insert file or not 
        $img_name = $item->img;
        $file_name = $item->file;
        if($request->img || $request->file){
            $request->img == '' ? $img_name = $item->img :  $img_name = getfileImage($request->img);
            $request->file == '' ? $file_name = $item->file : $file_name = getfileImage($request->file);
        }
        $sql = "UPDATE posts SET
                $postModel->title = '$request->title',
                $postModel->main_title = '$request->main_title',
                $postModel->hastag = '$request->hastag',
                $postModel->img = '$img_name',
                $postModel->file = '$file_name',
                $postModel->updated_at = '$request->updated_at'
            WHERE
                $postModel->id = '$item->id'
        ";
        $result = $conn->query($sql);
        if($result){
            //move file to store in upload folder 
            $request->img !== '' ? move_file($_FILES[$postModel->img], $img_name) : 'No upload';
            $request->file !== '' ? move_file($_FILES[$postModel->file], $file_name) : 'No upload';
            //delete old file from upload folder
            $request->img !== '' ? delete_file($item->img) : 'Not remove';
            $request->file !== '' ? delete_file($item->file) : 'Not remove';
            //if it work aready it go back to addmin page
            header('location:'.getBaseUrl('admin/'));
        }else
        {
            echo "Error update data";
        }
    }
    if(isset($_GET['delete'])) // delete data post from database 
    {
        $item = new GetItem($conn, $_GET['delete']);
        $postModel = new posts();
        if($item){
            //delete old file from upload folder
            $item->img !== '' ? delete_file($item->img) : 'Not remove';
            $item->file !== '' ? delete_file($item->file) : 'Not remove';
            //this is for delete item form database
            $sql = "DELETE FROM posts WHERE $postModel->id = '$item->id'";
            $result = $conn->query($sql);
            if($result){
                header('location:'.getBaseUrl('admin/'));
                return;
            }else{
                echo "Error delete data from database";
            }
        }
    }
} 
