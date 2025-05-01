<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Notes";
$insert = false;
$update = false;
$delete = false;
//conn
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Sorry we failed to connect" . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `note` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['snoEdit'])) {
    //update
    $sno = $_POST['snoEdit'];
    $title = $_POST['titleedit'];
    $des = $_POST['desedit'];

    $sql = "UPDATE `note` SET `title` = '$title', `des` = '$des' WHERE `note`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
  } else {
    $title = $_POST['title'];
    $des = $_POST['des'];
    // INSERT INTO `trip` (`sno`, `firstname`, `lastname`, `dest`) VALUES ('5', 'ari', 'dutta', 'india');
    $sql = "INSERT INTO `note` (`title`, `des`, `datetime`) VALUES ('$title ', '$des ', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      // echo "The table is  created successfully";
      $insert = true;
    } else {
      echo "The table is not created successfully because -->" . mysqli_error($conn);
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>
  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit Notes</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/practice/CRUD/" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="title" class="form-label">Note title</label>
              <input type="Text" name="titleedit" class="form-control" id="titleedit" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Note Description</label>
              <textarea class="form-control" name="desedit" id="desedit" rows="5"></textarea>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img height="65px" width="130px" src= "image.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Contact Us</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong>Success!</strong> Your records has benn submitted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }

  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong>Success!</strong> Your records has been Updated successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }

  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong>Success!</strong> Your records has been Deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  ?>

  <div class="container mt-2">
    <h1>My Notes</h1>
    <form action="/practice/CRUD/" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Note title</label>
        <input type="Text" name="title" class="form-control" id="title" aria-describedby="Notes">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Note Description</label>
        <textarea class="form-control" name="des" id="des" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary mb-4">Add Note</button>
    </form>

    <table class="table table-light table-hover text-center mt-5" aling="center" id="myTable">
      <thead>
        <tr>
          <th scope="col">s.no</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `note`";
        $result = mysqli_query($conn, $sql);
        $n = 0;
        while ($row = mysqli_fetch_array($result)) {
          $n++;
          echo " <tr>
            <th scope='row'>" . $n . "</th>
            <td>" . $row['title'] . "</td>
            <td>" . $row['des'] . "</td>
            <td><button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button>  <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Delete</button></td>
          </tr>";

        }
        ?>
      </tbody>
    </table>
    <!-- </center> -->
    <!-- </div> -->
  </div>
  <footer class="bg-dark text-light text-center py-4 mt-5">
    <div class="containerfooter">
      <h5>Contact Us Page</h5>
      <p>If you have any questions, feel free to reach out using the form above.</p>
      <hr class="border-light" style="width: 60%; margin: auto;">
      <p class="mt-3 mb-0">&copy; Abhijit Dutta</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>

  <script>
    $('#myTable').DataTable({
      responsive: true,
      pagingType: 'full_numbers',
      dom: "<'row mb-3'<'col-sm-6'l><'col-sm-6 text-end'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row mt-3'<'col-sm-5'i><'col-sm-7'p>>"
    });

  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        // titleedit.value = title;
        // desedit.value = des;
        document.getElementById('titleedit').value = title;
        document.getElementById('desedit').value = description;
        document.getElementById('snoEdit').value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
        // $('#editModal').modal('toggle'); 
      });
    });

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        sno = e.target.id.substr(1,);
        if (confirm("Are You sure you want to delete this note !")) {
          console.log("Yes");
          window.location = `/practice/CRUD/index.php?delete=${sno}`;
        }
        else {
          console.log("No");
        }
      })
    })
  </script>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      document.body.classList.add('fade-in');
    });
  </script>
</body>

</html>