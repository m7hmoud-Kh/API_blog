
<?php


class Posts
{

    private $post_id;
    private $post_title;
    private $post_desc;
    private $author;
    private $post_cate_id;
    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function set_post_id($post_id)
    {
        $this->post_id = $post_id;
    }

    public function get_post_id()
    {
        return  $this->post_id;
    }

    public function set_post_title($post_title)
    {
        $this->post_title = $post_title;
    }

    public function get_post_title()
    {
        return  $this->post_title;
    }


    public function set_post_desc($post_desc)
    {
        $this->post_desc = $post_desc;
    }

    public function get_post_desc()
    {
        return  $this->post_desc;
    }

    public function set_author($author)
    {
        $this->author = $author;
    }

    public function get_author()
    {
        return  $this->author;
    }

    public function set_post_cate_id($post_cate_id)
    {
        $this->post_cate_id = $post_cate_id;
    }

    public function get_post_cate_id()
    {
        return  $this->post_cate_id;
    }



    public function creat()
    {
        $stmt = $this->conn->prepare("INSERT INTO posts VALUES(?,?,?,?,?)");
        $stmt->execute(array(
            $this->get_post_id(),
            $this->get_post_title(),
            $this->get_post_desc(),
            $this->get_author(),
            $this->get_post_cate_id()
        ));
        if ($stmt) {
            return TRUE;
        }
    }

    public function read_all()
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts ORDER BY post_id DESC");
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num > 0) {
            return $stmt->fetchAll();
        }
    }
    public function read_single()
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE post_id = ?");
        $stmt->execute(array($this->get_post_id()));
        $num = $stmt->rowCount();
        if ($num == 1) {
            return $stmt->fetch();
        }
    }
    public function update()
    {
        $stmt = $this->conn->prepare("UPDATE posts SET  post_title = ? , post_desc = ? , author = ? , post_cate_id = ? WHERE post_id = ? ");
        $stmt->execute(array(
            $this->get_post_title(),
            $this->get_post_desc(),
            $this->get_author(),
            $this->get_post_cate_id(),
            $this->get_post_id()
        ));
        if($stmt){return TRUE;}
    }
    public function delete(){
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE post_id = ?");
        $stmt->execute(array(
            $this->get_post_id()
        ));
        if($stmt){return TRUE;}
    }

    public function checkPostId($post_id)
    {
        $stmt = $this->conn->prepare("SELECT post_id FROM posts WHERE post_id = ?");
        $stmt->execute(array($post_id));
        $num = $stmt->rowCount();
        if($num ==1){return TRUE;}
    }
}
