<?php


    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */


    require_once 'src/Student.php';

    $DB = new PDO('pgsql:host=localhost;dbname=university_registrar_test');

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Student::deleteAll();
            Course::deleteAll();
        }


        function testSetFirst(){
            //Arrange
            $first = "Tom";
            $last = "Jones";
            $student_id = null;
            $new_student = new Student($first, $last, $student_id);

            //Act
            $new_student->setFirst("Tomothy");
            $result = $new_student->getFirst();

            //Assert
            $this->assertEquals("Tomothy", $result);
        }

        function testGetFirst(){
            //Arrange
            $first = "Tom";
            $last = "Jones";
            $student_id = null;
            $test_student = new Student($first, $last, $student_id);

            //Act

            $result = $test_student->getFirst();

            //Assert
            $this->assertEquals($first, $result);
        }

        function testSetLast(){
            //Arrange
            $first = "Fred";
            $last = "Fredricks";
            $student_id = null;
            $new_last = "Fredrickson";
            $new_student = new Student($first, $last, $student_id);

            //Act
            $new_student->setLast($new_last);
            $result = $new_student->getLast();

            //Assert
            $this->assertEquals($new_last, $result);
        }

        function testGetLast(){
            //Arrange
            $first = "Fred";
            $last = "Fredricks";
            $student_id = null;
            $new_student = new Student($first, $last, $student_id);
            //Act
            $result = $new_student->getLast();
            //Assert
            $this->assertEquals($last, $result);
        }

        function testSave(){
            //Arrange
            $first = "Jack";
            $last = "Boone";
            $new_student = new Student($first, $last, $student_id = 3);
            $new_student->save();

            //Act
            $result = Student::getAll();

            //Assert
            $this->assertEquals($new_student, $result[0]);
        }

        function testGetAll(){
            //Arrange
            $first = "Jack";
            $last = "Boone";
            $new_student = new Student($first, $last, $student_id = 3);
            $new_student->save();

            $first2 = "Jaqueline";
            $last2 = "Moone";
            $new_student2 = new Student($first2, $last2, $student_id = 3);
            $new_student2->save();

            //Act
            $result = Student::getAll();

            //Assert
            $this->assertEquals([$new_student, $new_student2], $result);
        }





    }

?>
