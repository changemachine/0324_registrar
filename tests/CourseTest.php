<?php


    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */


    require_once 'src/Course.php';

    //$DB = new PDO('pgsql:host=localhost;dbname=university_registrar_test');

    class CourseTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Student:deleteAll();
        //     // Course:deleteAll();
        // }


        function testGetCourseName()
        {
            //Arrange
            $course_name = "chemi";
            $course_number = 7;
            $test_course = new Course($course_name, $course_number);

            //Act

            $result = $test_course->getCourseName();

            //Assert
            $this->assertEquals($course_name, $result);
        }

        function testSetCourseName()
        {
            //Arrange
            $course_name = "Dance";
            $course_number = 5;
            $new_course = new Course($course_name, $course_number);

            //Act
            $new_course->setCourseName("Jumping");
            $result = $new_course->getCourseName();

            //Assert
            $this->assertEquals("Jumping", $result);

        }

        function testGetCourseNumber()
        {
            //Arrange
            $course_name = "Corset-making";
            $course_number = 5;
            $new_course_number = new Course($course_name, $course_number);
            //Act
            $result = $new_course_number->getCourseNumber();
            //Assert
            $this->assertEquals($course_number, $result);
        }

        function testSetCourseNumber()
        {
            //Arrange
            $course_name = "Bonnetry";
            $course_number = 4;
            $new_course_number = 5;
            $new_course = new Course($course_name, $course_number);

            //Act
            $new_course->setCourseNumber($new_course_number);
            $result = $new_course->getCourseNumber();

            //Assert
            $this->assertEquals($new_course_number, $result);

        }






    }

?>
