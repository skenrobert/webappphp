<?php include('../templates/header.php'); ?>
<?php include('../sections/courses.php'); ?>


<div class="col-md-3">


    <form action="" method="post">

        <div class="card">
            <div class="card-header">
                Course
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="course_id" class="form-label">N° course</label>
                    <input type="text" value="<?php echo $course_id; ?>" class="form-control" name="course_id" id="course_id" aria-describedby="helpId" placeholder="ID" readonly>
                </div>

                <div class="mb-3">
                    <label for="name_course" class="form-label">Name</label>
                    <input type="text" value="<?php echo $name_course; ?>" class="form-control" name="name_course" id="name_course" aria-describedby="helpId" placeholder="Name Course">
                </div>


                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="submit" name="action" value="add" class="btn btn-success">Add</button>
                    <button type="submit" name="action" value="edit" class="btn btn-primary">Edit</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
                </div>

            </div>

        </div>
    </form>


</div>
<div class="col-md-6 ">


<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Acctions </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listCourses as $course){ ?>
            <tr class="">
                <td scope="row"> <?php echo $course['id'] ?> </td>
                <td><?php echo $course['name'] ?></td>

                <td>
                        <form action="" method="post">
                                <input type="text" name='id' id="id" value="<?php echo $course['id']; ?>" hidden>
                                <input type="submit" name="action" value="select" class="btn btn-info">

                        </form>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>


</div>





<?php include('../templates/footer.php'); ?>