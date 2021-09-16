<?php 

include('db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];

        
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = "Task edited successfully";
    $_SESSION['message_type'] = "success";

    header("Location: index.php");
}

?>

<?php include('./includes/header.php')?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?= $id?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control mb-3" placeholder="Update Title" value="<?= $title ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control mb-3" placeholder="Update Description"><?= $description ?></textarea>
                    </div>
                    <button class="btn btn-success w-100" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php')?>