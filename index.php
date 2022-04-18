<html>
<head>
    <title>UOC-File merging system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script></head>
<body>
<div class="container">
    <br>
    <h4 align="center">UOC - Upload directory and merge files</h4>
    <br><br><br>
    <div class="row">
        <div class="col-md-12">
            <form action="controller.php" method="post" enctype='multipart/form-data' >
                <label>Author's first name</label><br>
                <input type="text" name="fname" class="form-control">
                <br>
                <label>Author's last name</label><br>
                <input type="text" name="lname" class="form-control">
                <br>
                <label>Date</label><br>
                <input type="date" name="date" value="<?php echo date("Y-m-d") ?>">
                <br><br>
                <label>Choose directory</label><br>
                <!--    Upload directory-->
                <input type="file" name="file[]" id="file" webkitdirectory mozdirectory multiple>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2" align="right">
                        <input type="submit" name="submit" value="Upload directory" class="btn btn-info">

                    </div>
                    <div class="col-md-2" align="right">
                        <a href="convert.php" class="btn btn-secondary">Merge files</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    <!--    Upload directory-->
    var iptEls = document.querySelectorAll('input');
    [].forEach.call(inps, function(iptEl) {
        iptEl.onchange = function(e) {
            console.log(this.files);
        };
    });

</script>
</html>

