<?php 

include_once '../configurations/db.php';
$conexionDB = DB::crearInstancia();



//**************************************************************** */

$student_id=isset($_POST['student_id']) ? $_POST['student_id'] : '';
$name=isset($_POST['name']) ? $_POST['name'] : '';
$last_name=isset($_POST['last_name']) ? $_POST['last_name'] : '';

$list_course=isset($_POST['list_course'])  ? $_POST['list_course'] : '';
$action=isset($_POST['action'])  ? $_POST['action'] : '';

$id=isset($_POST['id']) ? $_POST['id'] : ''; //from select

//  print_r($list_course);

if($action != '' ){
    switch ($action) {
        case 'add':
            
            $sql = "INSERT INTO students (id , name, last_name) VALUES (NULL , :name, :last_name)";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':name', $name);
            $consulta->bindParam(':last_name', $last_name);
            $consulta->execute();

            $student_id=$conexionDB->lastInsertId();


            foreach($list_course as $course){
                $sql = "INSERT INTO students_courses (id, course_id, student_id) VALUES (NULL , :course_id, :student_id)";
                $consulta=$conexionDB->prepare($sql);
                $consulta->bindParam(':student_id', $student_id);
                $consulta->bindParam(':course_id', $course);
                $consulta->execute();
            }

            break;
        case 'edit':
            $sql = "UPDATE students SET name=:name, last_name=:last_name  WHERE id=:student_id ";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':student_id', $student_id);
            $consulta->bindParam(':name', $name);
            $consulta->bindParam(':last_name', $last_name);
            $consulta->execute();


            if(isset($list_course)){
                $sql="DELETE FROM students_courses WHERE student_id=:student_id";
                $consulta=$conexionDB->prepare($sql);
                $consulta->bindParam(':student_id', $student_id);
                $consulta->execute();

                    foreach($list_course as $course){
                        $sql = "INSERT INTO students_courses (id, course_id, student_id) VALUES (NULL , :course_id, :student_id)";
                        $consulta=$conexionDB->prepare($sql);
                        $consulta->bindParam(':student_id', $student_id);
                        $consulta->bindParam(':course_id', $course);
                        $consulta->execute();
                    }

                    $arrcourse = $list_course;
            }

            break;
        case 'delete':
            $sql = "DELETE FROM students WHERE id=:student_id ";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':student_id', $student_id);
            $consulta->execute();

            break;

        case 'select':

            $sql="SELECT * FROM students WHERE id=:id";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $student=$consulta->fetch(PDO::FETCH_ASSOC);
            $name= $student['name'];
            $last_name= $student['last_name'];
            $student_id= $student['id'];


            //  USE appcourse;
            // SELECT courses.id FROM students_courses INNER JOIN courses ON courses.id=students_courses.course_id WHERE students_courses.student_id = 2;
            // $sql= "SELECT courses.id FROM students_courses INNER JOIN courses ON courses.id=students_courses.course_id WHERE students_courses.student_id = '".$student_id."' ";
            $sql= "SELECT courses.id FROM students_courses INNER JOIN courses ON courses.id=students_courses.course_id WHERE students_courses.student_id =:student_id";
            
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':student_id', $student_id);
            $consulta->execute() or die('error SQL !<br />'.$sql.'<br />');
            $coursesStudent = $consulta->fetchAll(PDO::FETCH_ASSOC);

            // print_r($coursesStudent);

            foreach($coursesStudent as $course){
                // echo $course['id'];                
                $arrcourse[]=$course['id'];
            }

            break;
        
        default:
            # code...
            break;
    }
}



// print_r($_POST);
// print_r($student_id);

//*************************************************************** */

$consulta=$conexionDB->prepare("SELECT * FROM students");
$consulta->execute();

$liststudents=$consulta->fetchAll();
// print_r($liststudents);

    foreach($liststudents as $key => $student){

        $sql="SELECT * FROM courses 
        WHERE id IN (SELECT course_id FROM students_courses WHERE student_id=:student_id)";
        $consulta=$conexionDB->prepare($sql);
        $consulta->bindParam(':student_id', $student['id']);
        $consulta->execute();
        $courseStudent=$consulta->fetchAll();
        $liststudents[$key]['courseStudent'] = $courseStudent;
    }
// print_r($liststudents);


$sql="SELECT * FROM courses";
$courses=$conexionDB->query($sql);
$listCourses=$courses->fetchAll();
