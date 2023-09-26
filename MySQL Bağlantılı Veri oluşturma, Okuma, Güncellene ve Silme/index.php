<?php include_once 'connections.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Database Operations</title>
</head>

<body>
<div class="container">
    <div class="col-md-6">
        <center>
            <h1>Adding Process</h1>
        </center>
        <form action="" method="post">
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Contents</td>
                    <td>
                        <textarea name="contents" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="add">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST["title"])) {
            $title = $_POST["title"];
            $contents = $_POST["contents"];

            if (empty($title)) {
                echo '<div class="alert alert-danger" role="alert">
                    Title field must be filled!!
                  </div>';
            } else if (strlen($title) < 5) {
                echo '<div class="alert alert-warning" role="alert">
                    The Title field must be at least 5 characters!!
                  </div>';
            } else if (empty($contents)) {
                echo '<div class="alert alert-danger" role="alert">
                    The Content field must be full!!{
                  </div>';
            } else if (strlen($contents) < 5) {
                echo '<div class="alert alert-warning" role="alert">
                    The Content field must be at least 5 characters!!
                  </div>';
            } else if ($title == $contents) {
                echo '<div class="alert alert-warning" role="alert">
                    Title and Content field cannot be the same!!
                  </div>';
            } else {
                if ($connect->query("INSERT INTO article (title, contents) VALUES ('$title','$contents')")) {
                    echo "Data Added";
                } else {
                    echo "Error";
                }
            }
        }
        ?>
    </div>
    <div class="col-md-7">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Contents</th>
                <th></th>
                <th></th>
            </tr>

            <?php
            $query = $connect->query("SELECT * FROM article");

            while ($conclusion = $query->fetch_assoc()) {
                $id = $conclusion['id'];
                $title = $conclusion['title'];
                $contents = $conclusion['contents'];
                ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $contents; ?>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $id; ?>" class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<div class="card-footer text-body-secondary">
    <center>
        <p>Design by <b>ÖMER KILIÇ </b> | &copy; 2023</p>
    </center>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>