<?php include('../templates/header.php'); ?>


<div class="col-md-3">


    <form class="">

        <div class="card">
            <div class="card-header">
                Course
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="course_id" class="form-label">N° course</label>
                    <input type="text" class="form-control" name="course_id" id="course_id" aria-describedby="helpId" placeholder="ID">
                </div>

                <div class="mb-3">
                    <label for="name_course" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name_course" id="name_course" aria-describedby="helpId" placeholder="Name Course">
                </div>


                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="button" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
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
            <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
            </tr>

        </tbody>
    </table>
</div>


</div>





<?php include('../templates/footer.php'); ?>