<?php
include "lib/database.php";
?>

<?php
 class Blog
 {
     private $db;

     public function __construct()
     {
         $this->db = new Database();
     }


     public function insertPost($text,$description,$cat)
     {
         $text = mysqli_real_escape_string($this->db->link, $text);
         $description = mysqli_real_escape_string($this->db->link, $description);
         $cat = mysqli_real_escape_string($this->db->link, $cat);


         if ($text == "" || $description == "")
         {
             echo "Empty";
         }
         else
         {
             $query = "INSERT INTO tbl_post (name,description,category) VALUES ('$text','$description','$cat')";
             $result = $this->db->insert($query);
         }
     }


     public function selectPost($start_form, $per_page)
     {
         $query = "SELECT * FROM tbl_post LIMIT $start_form, $per_page";
         $result = $this->db->select($query);
         return $result;
     }

     public function countTotalPost(){
         $query = "SELECT * FROM tbl_post";
         $result = $this->db->select($query);
         return $result->num_rows;
     }

     public function countTotalPostByCategory($cat_name){
         $query = "SELECT * FROM tbl_post WHERE category = '$cat_name'";
         $result = $this->db->select($query);
         return $result->num_rows;
     }

     public function insertCategory($text)
     {
         $text = mysqli_real_escape_string($this->db->link, $text);

         if ($text == "")
         {
             echo "Empty";
         }
         else
         {
             $query = "INSERT INTO tbl_category (cname) VALUES ('$text')";
             $result = $this->db->insert($query);
         }
     }


     public function selectPostById()
     {
         $id = $_GET['id'];
         $query = "SELECT * FROM tbl_post WHERE id = '$id'";
         $result = $this->db->select($query);
         return $result;
     }

     public function selectPostByCategory($start_form, $limit, $catName){
         $query = "SELECT * FROM tbl_post WHERE category = '$catName' LIMIT $start_form, $limit";
         $result = $this->db->select($query);
         return $result;
     }

     public function selectCAT()
     {
         $query = "SELECT DISTINCT(cname) FROM tbl_category";
         $result = $this->db->select($query);
         return $result;
     }


     public function DeletePost()
     {
         $id = $_GET['id'];
         $query = "DELETE  FROM tbl_post WHERE id='$id'";
         $result = $this->db->delete($query);
         header("Location :delete.php");
     }


     public function UpdatesPost($text,$description,$cat)
     {

         if (isset($_GET['id']))
         {
             $id = $_GET['id'];
             $text = mysqli_real_escape_string($this->db->link, $text);
             $description = mysqli_real_escape_string($this->db->link, $description);
             $cat = mysqli_real_escape_string($this->db->link, $cat);

             $query = "UPDATE tbl_post SET name = '$text', description = '$description', category = '$cat' WHERE id ='$id'";
             $result = $this->db->update($query);
             header("Location: index.php");
         }
     }


 }
 ?>
