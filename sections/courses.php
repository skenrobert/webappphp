<?php 

include_once '../configurations/db.php';
$conexionDB = DB::crearInstancia();



//**************************************************************** */

$course_id=isset($_POST['course_id']) ? $_POST['course_id'] : '';
$name_course=isset($_POST['name_course']) ? $_POST['name_course'] : '';
$action=isset($_POST['action'])  ? $_POST['action'] : '';

$id=isset($_POST['id']) ? $_POST['id'] : ''; //from select

// print_r($_POST);

if($action != '' ){
    switch ($action) {
        case 'add':
            
            $sql = "INSERT INTO courses (id , name) VALUES (NULL , :name_course)";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':name_course', $name_course);
            $consulta->execute();

            break;
        case 'edit':
            $sql = "UPDATE courses SET name=:name_course WHERE id=:course_id ";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':course_id', $course_id);
            $consulta->bindParam(':name_course', $name_course);
            $consulta->execute();

            break;
        case 'delete':
            $sql = "DELETE FROM courses WHERE id=:course_id ";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':course_id', $course_id);
            $consulta->execute();

            break;

        case 'select':

            $sql="SELECT * FROM courses WHERE id=:id";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $course=$consulta->fetch(PDO::FETCH_ASSOC);
            // print_r($course);
            $name_course= $course['name'];
            $course_id= $course['id'];

            break;
        
        default:
            # code...
            break;
    }
}



// print_r($_POST);
// print_r($course_id);

//*************************************************************** */

$consulta=$conexionDB->prepare("SELECT * FROM courses");
$consulta->execute();

$listCourses=$consulta->fetchAll();
// print_r($listCourses);

?>