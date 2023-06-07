<?php include('../templates/header.php'); ?>
<?php include('../sections/students.php'); ?>


<div class="col-md-3">


    <form action="" method="post">

        <div class="card">
            <div class="card-header">
                student
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="student_id" class="form-label">N° student</label>
                    <input type="text" value="<?php echo $student_id; ?>" class="form-control" name="student_id" id="student_id" aria-describedby="helpId" placeholder="ID" readonly>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="<?php echo $name; ?>" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Name student">
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" value="<?php echo $last_name; ?>" class="form-control" name="last_name" id="last_name" aria-describedby="helpId" placeholder="Name student">
                </div>

                <div class="mb-3">
                    <label for="list_course" class="form-label">Course</label>
                    <select multiple class="form-select form-select-lg" name="list_course" id="list_course">
                        <option selected>Select one</option>
                        <option value="1">New Delhi</option>
                        <option value="2">Istanbul</option>
                        <option value="3">Jakarta</option>
                    </select>
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
                <th scope="col">Last Name</th>
                <th scope="col">Acctions </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($liststudents as $student){ ?>
            <tr class="">
                <td scope="row"> <?php echo $student['id'] ?> </td>
                <td><?php echo $student['name'] ?></td>
                <td><?php echo $student['last_name'] ?></td>

                <td>
                        <form action="" method="post">
                                <input type="text" name='id' id="id" value="<?php echo $student['id']; ?>" hidden>
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