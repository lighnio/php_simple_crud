<?php 

// requires
include('db.php');

?>
<!-- HEADER -->
<?php include('includes/header.php');?>

<!-- CONTENT -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <input type="text" name="title" class="form-control mb-3"
                    placeholder="Task Title"
                    autofocus>
                    <div class="form-group mb-3">
                        <textarea name="description" id="" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success w-100"
                    name="save_task" value="Save Task">
                </form>
            </div>

        </div>
        <div class="col-md-8">

        <?php 
            $query = "SELECT * FROM tasks";
            $result_tasks = mysqli_query($conn, $query);
            if(mysqli_num_rows($result_tasks) > 0){?>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">


                <?php while($row = mysqli_fetch_array($result_tasks)) { ?>
                        
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created_at']?></td>
                            <td>
                                <a class='btn btn-primary'
                                href="edit_task.php?id=<?=$row['id']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class='btn btn-danger'
                            href="delete_task.php?id=<?=$row['id']; ?>">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <?php }}else{?>
                    <h3>Create a new task.</h3>
               <?php } ?>

            </table>

        </div>
    </div>
</div>

<!-- FOOTER -->
<?php include('includes/footer.php'); ?>