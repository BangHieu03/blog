<?php 
if (isset($_POST['delete'])) {
    $user_id = $_GET['user_id'];
    $result = new user();
    $result->deleteUser($user_id);
    $delete = "delete from users WHERE user_id = '{$user_id}'";
    if($delete){
    header('Location:./index.php?act=users&action=list');
    }else{
        echo "Deletion failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class='container'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa người dùng</h5>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc là xóa người dùng này</p>
                </div>
                <form action="#" method="POST">
                    <button class="btn" data-bs-dismiss="modal">
                        <a class="btn btn-secondary" href="./index.php?act=users&action=list">Không</a>
                    </button>
                    <button class="btn btn-danger" name="delete">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>