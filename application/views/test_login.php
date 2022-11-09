<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek login berhasil</title>
</head>

<body>
    udah bisa login dah<br>
    anda login sebagai <br>
    username : <?php echo $this->session->userdata('username') ?><br>
    level : <?php echo $this->session->userdata('level') ?><br>
    id pengguna : <?php echo $this->session->userdata('id') ?><br>
    email : <?php echo $this->session->userdata('email') ?><br>

    <?php var_dump($this->session->userdata());
    die

    ?>



</body>

</html>