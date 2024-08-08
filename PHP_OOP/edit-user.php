<?php
include_once "config/database.php";
$obj = new Query();

## Form submit
if (isset($_POST['submit'])) {
    ## Update Data
    $data = $_POST;
    $id = $data['id'];

    unset($data['submit']);
    unset($data['id']);

    $res = $obj->updateData('users', $data, 'id', $id);
    if ($res) {
        $_SESSION['success'] = "User has been updated successfully";
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: index.php");
    exit;
}

## Get Data by ID
$user = array();
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $result = $obj->getDataById('users', '*', 'id', $id);
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
    }
} else {
    header("LOCATION: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <script src="https://kit.fontawesome.com/1c26fb5c51.js" crossorigin="anonymous"></script>
    <title>CRUD Operations in OOP using PHP</title>
</head>

<body>
    <main class="mt-1 pt-3">
        <div class="container mt-4">
            <!--Cards-->
            <div class="row dashboard-counts">
                <div class="col-md-12">
                    <h4 class="fw-bold text-uppercase">Edit User</h4>
                </div>

                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="edit-user.php">
                                <input type="hidden" value="<?php echo $user['id'] ?>" name="id">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" required value="<?php echo $user['name'] ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required value="<?php echo $user['email'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone No</label>
                                            <input type="number" class="form-control" name="phone" required value="<?php echo $user['phone'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success">
                                            Save
                                        </button>

                                        <a href="./" class="btn btn-secondary">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>