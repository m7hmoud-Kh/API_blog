
<?php


class Categories
{

    private $cat_id;
    private $cat_name;
    private $created_at;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function set_cat_id($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    public function get_cat_id()
    {
        return  $this->cat_id;
    }

    public function set_cat_name($cat_name)
    {
        $this->cat_name = $cat_name;
    }
    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function get_cat_name()
    {
        return $this->cat_name;
    }
    public function get_created_at()
    {
        return  $this->created_at;
    }

    public function creat()
    {
        $stmt = $this->conn->prepare("INSERT INTO category SET cat_name = ? ,created_at = ? ");
        $stmt->execute(array($this->get_cat_name(), $this->get_created_at()));
        $num = $stmt->rowCount();
        if ($num) {
            return True;
        }
    }
    public function read_all()
    {

        $stmt = $this->conn->prepare("SELECT * from category ORDER BY cat_name DESC");
        $stmt->execute();
        return $stmt;
    }
    public function read_single()
    {
        $stmt = $this->conn->prepare("SELECT * from category WHERE cat_id = ?");
        $stmt->execute(array($this->get_cat_id()));
        $num = $stmt->rowCount();
        if ($num > 0) {
            return $stmt->fetch();
        }
    }
    public function update()
    {
        $stmt = $this->conn->prepare("UPDATE category SET  cat_name = ? , created_at = ? WHERE cat_id = ?");
        $stmt->execute(array($this->get_cat_name(), $this->get_created_at() , $this->get_cat_id()));
        if($stmt){return TRUE;}
    }
    public function delete()
    {

        $stmt = $this->conn->prepare("DELETE FROM category WHERE cat_id = ?");
        $stmt->execute(array($this->get_cat_id()));
        if($stmt){return TRUE;}
    }

    public function check_id($cat_id)
    {
        $stmt = $this->conn->prepare("SELECT cat_id FROM category WHERE cat_id = ?");
        $stmt->execute(array($cat_id));
        $num = $stmt->rowCount();
        if($num > 0){return TRUE;}
    }
}
