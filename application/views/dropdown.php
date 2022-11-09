<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dropdown</title>
</head>

<body>
    <form action="<?php echo base_url('dropdown/cek') ?>">
        <label for="cars">Fakultas:</label>

        <select name="fakultas" class="fakultas" id="fakultas">

            <option value="0">-PILIH-</option>
            <?php foreach ($fakultas->result() as $row) : ?>
                <option value="<?php echo $row->id_fakultas; ?>"><?php echo $row->nama_fakultas; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="cars">Prodi:</label>
        <select name="prodi" class="prodi" id="prodi">
            <option value="0">-PILIH-</option>

        </select>
        <button type="submit">cek</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#fakultas').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>dropdown/get_prodi",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value =' + data[i].id_prodi + '>' + data[i].nama_prodi;
                            '</option>';
                        }
                        $('#prodi').html(html);

                        // console.log()
                    }
                });
            });
        });
    </script>









</body>
<!-- load jquery chain -->






<!-- load jquery chain -->

</html>