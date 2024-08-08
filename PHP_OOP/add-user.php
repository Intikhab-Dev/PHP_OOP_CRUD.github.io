<?php
include_once "config/database.php";
$obj = new Query();

## Form submit
if (isset($_POST['submit'])) {
    ## Insert Data
    $data = $_POST;
    unset($data['submit']);
    $res = $obj->insertData('users', $data);
    if ($res) {
        $_SESSION['success'] = "User has been created successfully";
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
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
                    <h4 class="fw-bold text-uppercase">
                        Add User
                        <a href="./" class="btn btn-primary btn-sm" style="float:right">All Users</a>
                    </h4>
                </div>

                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="add-user.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone No</label>
                                            <input type="number" class="form-control" name="phone" required />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success">
                                            Save
                                        </button>

                                        <button type="reset" class="btn btn-secondary">
                                            Reset
                                        </button>
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