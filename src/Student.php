<?php

    class Student
    {
        private $first_name;
        private $last_name;

        function __construct($new_first, $new_last)
        {
                $this->first_name = $new_first;
                $this->last_name = $new_last;
        }

        // SET & GET PROPERTIES


        function getFirstName()
        {
            return $this->first_name;
        }

        function setFirstName($newFirst)
        {
            $this->first_name = (string) $newFirst;
        }

        function setLastName($newLast){
            $this->last_name = $newLast;
        }
        function getLastName(){
            return $this->last_name;
        }

        // SAVE, GET ALL & DELETE ALL



        // FIND & DELETE BY CATEGORY


        // UPDATE & DELETE BY ITEM





    }

?>
