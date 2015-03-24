<?php

    class Course
    {
        private $course_name;
        private $course_number;

        function __construct($new_course_name, $new_course_number)
        {
                $this->course_name = $new_course_name;
                $this->course_number = $new_course_number;
        }

        // SET & GET PROPERTIES


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



        // FIND & DELETE BY CATEGORY


        // UPDATE & DELETE BY ITEM





    }

?>
