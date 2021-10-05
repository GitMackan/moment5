<?php

class Course {
    private $db;
    private $code;
    private $name;
    private $prog;
    private $syllabus;

    // Constructor 
    public function __construct() {
        // MySQLi connection
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        // Check connection
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    /**
     * Add course
     * @param string $code
     * @param string $name
     * @param string $prog
     * @param string $syllabus
     */

    public function addCourse(string $code, string $name, string $prog, string $syllabus) : bool {
        $this->code = $code;
        $this->name = $name;
        $this->prog = $prog;
        $this->syllabus = $syllabus;
        
        // Check for empty values
        if(strlen($code) > 0 && strlen($name) > 0 && strlen($prog) > 0 && strlen($syllabus) > 0) {
            // Prepare statement 
            $stmt = $this->db->prepare("INSERT INTO courses (code, name, prog, syllabus) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $this->code, $this->name, $this->prog, $this->syllabus);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
            $stmt->close();
        } else {
            // Return false if a value is empty
            return false;
        }
    }

        
    
    /**
     * Get courses
     * @return array
     */

     public function getCourses () : array {
         $sql = "SELECT * FROM courses ORDER BY code;";
         $result = $this->db->query($sql);

         return $result->fetch_all(MYSQLI_ASSOC);
     }

     /**
      * Delete course by id
      * @param int $id
      * @return boolean
      */

      public function deleteCourse(int $id) : bool {
          $id = intval($id);

          $sql = "DELETE FROM courses WHERE id=$id;";
          $result = $this->db->query($sql);

          return $result;
      }


      /**
       * Get specific course by id
       * @param int $id
       * @return array
       */

       public function getCourseById(int $id) : array {
           $id = intval($id);
           
           $sql = "SELECT * FROM courses WHERE id=$id;";
           $result = $this->db->query($sql);

           return $result->fetch_all(MYSQLI_ASSOC);
       }

       /**
        * Update course
        * @param int $id
        * @param string $code
        * @param string $name
        * @param string $prog
        * @param string $syllabus
        * @return boolean
        */
       public function updateCourse(int $id, string $code, string $name, string $prog, string $syllabus) : bool {
           $this->id = $id;
           $this->code = $code;
           $this->name = $name;
           $this->prog = $prog;
           $this->syllabus = $syllabus;
           $id = intval($id);

           // Prepare statement 
           $stmt = $this->db->prepare("UPDATE courses SET code=?, name=?, prog=?, syllabus=? WHERE id=$id;");
           $stmt->bind_param("ssss", $this->code, $this->name, $this->prog, $this->syllabus);

           if ($stmt->execute()) {
               return true;
           } else {
               return false;
           }

           $stmt->close();
       }
}

