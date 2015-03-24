<?php


    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */


    require_once 'src/Student.php';

    //$DB = new PDO('pgsql:host=localhost;dbname=university_registrar_test');

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Student:deleteAll();
        //     // Course:deleteAll();
        // }


        function testGetFirstName()
        {
            //Arrange
            $first = "Tom";
            $last = "Jones";
            $test_student = new Student($first, $last);

            //Act

            $result = $test_student->getFirstName();

            //Assert
            $this->assertEquals($first, $result);
        }

        function testSetFirstName()
        {
            //Arrange
            $first = "Tom";
            $last = "Jones";
            $new_student = new Student($first, $last);

            //Act
            $new_student->setFirstName("Tomothy");
            $result = $new_student->getFirstName();

            //Assert
            $this->assertEquals("Tomothy", $result);

        }

        function testGetLastName()
        {
            //Arrange
            $first = "Fred";
            $last = "Fredricks";
            $new_student = new Student($first, $last);
            //Act
            $result = $new_student->getLastName();
            //Assert
            $this->assertEquals($last, $result);
        }

        function testSetLastName()
        {
            //Arrange
            $first = "Fred";
            $last = "Fredricks";
            $new_last = "Fredrickson";
            $new_student = new Student($first, $last);

            //Act
            $new_student->setLastName($new_last);
            $result = $new_student->getLastName();

            //Assert
            $this->assertEquals($new_last, $result);

        }
        





    }

?>
