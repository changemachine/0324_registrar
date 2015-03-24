<?php

    class Course
    {
        private $course_name;
        private $course_number;
        private $course_id;

        function __construct($new_course_name, $new_course_number, $new_course_id = null)
        {
                $this->course_name = $new_course_name;
                $this->course_number = $new_course_number;
                $this->course_id = $new_course_id;
        }

        // SET & GET PROPERTIES

        function setId($new_id){
            $this->course_id = (int) $new_id;
        }
        function getId(){
            return $this->course_id;
        }

        function getCourseName()
        {
            return $this->course_name;
        }

        function setCourseName($new_course_name)
        {
            $this->course_name = (string) $new_course_name;
        }

        function setCourseNumber($new_course_number){
            $this->course_number = (int) $new_course_number;
        }

        function getCourseNumber(){
            return $this->course_number;
        }

        // SAVE, GET ALL & DELETE ALL
        function save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO courses (course_name, course_number) VALUES ('{$this->getCourseName()}', '{$this->getCourseNumber()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll()
       {
           $returned_courses = $GLOBALS['DB']->query("SELECT * FROM courses;");
           $courses = array();
           foreach($returned_courses as $course) {
               $course_name = $course['course_name'];
               $course_number = $course['course_number'];
               $course_id = $course['id'];
               $new_course = new Course($course_name, $course_number, $course_id);
               array_push($courses, $new_course);
           }
           return $courses;
       }

       static function deleteAll()
       {
           $GLOBALS['DB']->exec("DELETE FROM courses *;");
       }



        // FIND & DELETE BY CATEGORY


        // UPDATE & DELETE BY ITEM





    }

?>
