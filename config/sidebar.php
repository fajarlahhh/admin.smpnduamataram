<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'menu' => [[
		'icon' => 'fas fa-th-large',
		'title' => 'Dashboard',
		'url' => '/dashboard'
	],[
		'icon' => 'fas fa-newspaper',
		'title' => 'Berita',
		'url' => '/berita'
	],[
		'icon' => 'fas fa-images',
		'title' => 'Carousel',
		'url' => '/carousel'
	],[
		'icon' => 'fas fa-database',
		'title' => 'Data Master',
		'url' => '#',
		'caret' => true,
		'id' => 'datamaster',
		'sub_menu' => [[
			'url' => '/gallery',
			'title' => 'Gallery'
        ],[
			'url' => '/kategoriberita',
			'title' => 'Kategori Berita'
        ],[
			'url' => '/mapel',
			'title' => 'Mata Pelajaran'
        ]]
	],[
		'icon' => 'fas fa-file-archive',
		'title' => 'Data Sekolah',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
            'title' => 'Tenaga Pendidik',
            'url' => '/tenagapendidik'
        ],[
            'title' => 'Peserta Didik',
            'url' => '#',
            'caret' => true,
            'sub_menu' => [[
                'url' => '/kelastujuh',
                'title' => 'Kelas VII'
            ],[
                'url' => '/kelasdelapan',
                'title' => 'Kelas VIII'
            ],[
                'url' => '/kelassembilan',
                'title' => 'Guru IX'
            ]]
        ]]
	],[
		'icon' => 'fas fa-medal',
		'title' => 'Prestasi',
		'url' => '/prestasi'
	],[
		'icon' => 'fas fa-id-card',
		'title' => 'Profil',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
			'url' => '/kepalasekolah',
			'title' => 'Kepala Sekolah'
        ],[
			'url' => '/sejarahsekolah',
			'title' => 'Sejarah Sekolah'
		],[
			'url' => '/visimisi',
			'title' => 'Visi Misi'
        ],[
			'url' => '/komitesekolah',
			'title' => 'Komite Sekolah'
		],[
			'url' => '/strukturorganisasi',
			'title' => 'Struktur Organisasi'
        ],[
			'url' => '/tatausaha',
			'title' => 'Tata Usaha'
		],[
			'url' => '/kalenderakademik',
			'title' => 'Kalenderakademik'
        ]]
	],[
		'icon' => 'fas fa-cog',
		'title' => 'Setup',
		'url' => '#',
		'caret' => true,
		'id' => 'setup',
		'sub_menu' => [[
			'url' => '/kontak',
			'id' => 'kontak',
			'title' => 'Kontak'
        ],[
			'url' => '/pengguna',
			'id' => 'pengguna',
			'title' => 'Pengguna'
        ]]
	]]
];
