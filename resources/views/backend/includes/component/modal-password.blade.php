<link href="/assets/plugins/parsleyjs/src/parsley.css" rel="stylesheet" />
<form action="/gantisandi" method="post" data-parsley-validate="true" data-parsley-errors-messages-disabled="">
	<div class="modal-content">
		@method('PATCH')
		@csrf
		<div class="modal-header">
			<h4 class="modal-title">Ganti Kata Sandi</h4>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label class="control-label">Kata Sandi Lama</label>
				<input data-toggle="password" class="form-control" type="password" name="pengguna_sandi_lama"  required />
			</div>
			<div class="form-group">
				<label class="control-label">Kata Sandi Baru</label>
				<input data-toggle="password" class="form-control" type="password" name="pengguna_sandi_baru" data-parsley-minlength="8" required />
			</div>
		</div>
		<div class="modal-footer">
			<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
			<input type="submit" value="Simpan" class="btn btn-success">
		</div>
	</div>
</form>
