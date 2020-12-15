<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                {{ Auth::user()->pengguna_nama }}&nbsp;
                <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#ganti-sandi">
                    Ganti Kata Sandi
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<div class="modal fade" id="ganti-sandi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin-area/gantisandi" method="POST">
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Ganti Kata Sandi</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Kata Sandi Lama</label>
                        <input class="form-control" type="password" name="pengguna_sandi_lama" autocomplete="off" data-parsley-minlength="5" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Kata Sandi Baru</label>
                        <input class="form-control" type="password" name="pengguna_sandi_baru" autocomplete="off" data-parsley-minlength="5" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
