<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <h1 class="page-header">Biodata</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Add Data</li>
            </ol>
        </div>
    </div>
 
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            ?>
                            <div class="alert alert-danger">
                                <i class="glyphicons glyphicons-warning-sign"></i> &nbsp; <?php echo $error; ?>
                            </div>
                            <?php
                        }
                    }
                    elseif (isset($_GET['saved'])) {
                        ?>
                        <div class="alert alert-success">
                            <i class="glyphicons glyphicons-log-in"></i>&nbsp;Data Berhasil Disimpan!
                        </div>
                        <?php
                    }
                 ?>
            </div>
 
            <form method="post">
                <div class="form-group">
                    <label>Nama Lengkap:</label>
                    <input type="text" name="nama" placeholder="Contoh: Sigit wasis subekti" class="form-control">
                </div>
 
                <div class="form-group">
                    <label>No. Telepon:</label>
                    <input type="number" name="phone" placeholder="Contoh: 082281458****" class="form-control">
                </div>
 
                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Contoh: Jl. KH ahmad dahlan"></textarea>
                </div>
 
                <div class="form-group">
                    <button type="submit" name="btn-save" class="form-control btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<br>