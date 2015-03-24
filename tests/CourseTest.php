<?php


    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */


    require_once 'src/Course.php';

    $DB = new PDO('pgsql:host=localhost;dbname=university_registrar_test');

    class CourseTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Student::deleteAll();
            Course::deleteAll();
        }


        function testSetCourseName()
        {
            //Arrange
            $course_name = "Dance";
            $course_number = 5;
            $course_id = 4;
            $new_course = new Course($course_name, $course_number, $course_id);

            //Act
            $new_course->setCourseName("Jumping");
            $result = $new_course->getCourseName();

            //Assert
            $this->assertEquals("Jumping", $result);

        }
        function testGetCourseName()
        {
            //Arrange
            $course_name = "chemi";
            $course_number = 7;
            $course_id = 4;
            $test_course = new Course($course_name, $course_number, $course_id);

            //Act

            $result = $test_course->getCourseName();

            //Assert
            $this->assertEquals($course_name, $result);
        }

        //setId
        //getId

        function testSetCourseNumber(){
            //Arrange
            $course_name = "Bonnetry";
            $course_number = 4;
            $course_id = 4;
            $new_course_number = 5;
            $new_course = new Course($course_name, $course_number, $course_id);

            //Act
            $new_course->setCourseNumber($new_course_number);
            $result = $new_course->getCourseNumber();

            //Assert
            $this->assertEquals($new_course_number, $result);
        }
        function testGetCourseNumber()
        {
            //Arrange
            $course_name = "Corset-making";
            $course_number = 5;
            $course_id = 4;
            $new_course_number = new Course($course_name, $course_number, $course_id);
            //Act
            $result = $new_course_number->getCourseNumber();
            //Assert
            $this->assertEquals($course_number, $result);
        }

        function testSave(){
            //Arrange
            $course_name = "Scientificness";
            $course_number = 5;
            $course_id = 4;
            $new_course = new Course($course_name, $course_number, $course_id);
            $new_course->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals($new_course, $result[0]);
        }

        function testGetAll(){
            //Arrange
            $course_name = "Woodshop";
            $course_number = 1;
            $course_id = 4;
            $new_course = new Course($course_name, $course_number, $course_id);
            $new_course->save();

            $course_name2 = "Beer";
            $course_number2 = 2;
            $course_id2 = 4;
            $new_course2 = new Course($course_name2, $course_number2, $course_id2);
            $new_course2->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$new_course, $new_course2], $result);
        }





    }

?>
