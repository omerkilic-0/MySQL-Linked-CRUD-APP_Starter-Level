<?php include("connections.php");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Database Operations</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>

<?php
$query = $connect->query("SELECT * FROM article WHERE id =" . (int)$_GET['id']);
$conclusion = $query->fetch_assoc();
?>
<div class="container">
    <div class="col-md-6">
        <center>
            <h1>Update Process</h1>
        </center>
        <form action="" method="post">
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" class="form-control"
                               value="<?php echo $conclusion['title']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Contents</td>
                    <td>
                            <textarea name="contents" class="form-control">
                                <?php echo trim($conclusion['contents']); ?>
                            </textarea>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" value="Submit" style="width: 49%;">
                        <input type="text" class="btn btn-primary" value="Cancel" style="width: 49%;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <?php
        if ($_POST) {
            $title = $_POST['title'];
            $contents = $_POST['contents'];

            if ($title <> "" && $contents <> "") {
                if ($connect->query("UPDATE article SET title = '$title', contents = '$contents' WHERE id =" . $_GET['id'])) {
                    header("location:index.php");
                } else {
                    echo "Error";
                }
            }
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>