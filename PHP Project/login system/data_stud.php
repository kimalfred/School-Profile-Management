<?php
    session_start();
    require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student List</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin_page.php">Admin Page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="schoolweb.html">Student Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="schoolweb.html">Contacts</a>        
      </ul>

      <form class="d-flex">
        <input type="text" name="search" required value = "<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search Student">
        <button type="submit" class="btn btn-primary">Search</button>
      </form>

    </div>
  </div>
</nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="logout.php" class="btn btn-primary float-end">Logout</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Phone Number</th>
                                    <th>Buttons</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM student  WHERE CONCAT(id, name, email, course, year) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items )
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?> </td>
                                                    <td><?= $items['name']; ?> </td>
                                                    <td><?= $items['email']; ?> </td>
                                                    <td><?= $items['course']; ?> </td>
                                                    <td><?= $items['year']; ?> </td>                                                  
                                                </tr>
                                            <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <tr>
                                                <td colspan = "7"> No Record Found </td>
                                        </tr>
                                        <?php
                                        }
                                    }       

                                    $query = "SELECT * FROM student";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['id']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['course']; ?></td>
                                                <td><?= $student['year']; ?></td>
                                                <td><?= $student['pnum']; ?></td>
                                                <td>
                                                    <a href="data_view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="data_edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>