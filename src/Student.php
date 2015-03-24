<?php

    class Student
    {
        private $first;
        private $last;
        //private $enroll_date;
        private $student_id;

        function __construct($first, $last, $student_id)
        {
                $this->first = $first;
                $this->last = $last;
                $this->student_id = $student_id;
        }

        // SET & GET PROPERTIES
        function setId($new_id){
            $this->student_id = (int) $new_id;
        }

        function getId(){
            return $this->student_id;
        }


        function setFirst($newFirst){
            $this->first = (string) $newFirst;
        }

        function getFirst(){
            return $this->first;
        }

        function setLast($newLast){
            $this->last = $newLast;
        }
        function getLast(){
            return $this->last;
        }

        // SAVE, GET ALL & DELETE ALL
        function save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO students (first, last) VALUES ('{$this->getFirst()}', '{$this->getLast()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll()
       {
           $returned_students = $GLOBALS['DB']->query("SELECT * FROM students;");
           $students = array();
           foreach($returned_students as $student) {
               $first = $student['first'];
               $last = $student['last'];
               $student_id = $student['id'];
               $new_student = new Student($first, $last, $student_id);
               array_push($students, $new_student);
           }
           return $students;
       }

       static function deleteAll()
       {
           $GLOBALS['DB']->exec("DELETE FROM students *;");
       }

       // FIND, DELETE & UPDATE
       static function find($search_id)
      {
          $found_student = null;
          $students = Student::getAll();
          foreach($students as $student) {
              $student_id = $student->getId();
              if ($student_id == $search_id) {
                $found_student = $student;
              }
          }
          return $found_student;
      }

      function deleteStudent(){

          //delete any tasks from the tasks table where their id matches the current one.
          $GLOBALS['DB']->exec("DELETE FROM students WHERE student_id = {$this->getId()};");

          //also delete any rows from the categories_tasks table where the task id is the current one.
          $GLOBALS['DB']->exec("DELETE FROM students_courses WHERE student_id = {$this->getId()};");


      }

      function updateFirst($new_first)
      {
          $GLOBALS['DB']->exec("UPDATE students SET first = '{$new_first}' WHERE id = {$this->getId()};");
          $this->setFirst($new_first);
      }

      function updateLast($new_last)
      {
          $GLOBALS['DB']->exec("UPDATE students SET last = '{$new_last}' WHERE id = {$this->getId()};");
          $this->setLast($new_last);
      }










    }

?>
