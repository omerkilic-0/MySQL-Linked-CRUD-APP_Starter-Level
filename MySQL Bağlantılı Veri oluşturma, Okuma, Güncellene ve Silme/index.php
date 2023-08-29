<?php include_once 'connections.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
                if (isset($title) && isset($contents)) {
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
                            <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>