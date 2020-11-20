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
		'icon' => 'fas fa-university',
		'title' => 'Akademik',
		'url' => '#',
		'caret' => true,
		'id' => 'akademik',
		'sub_menu' => [[
			'url' => '/kalenderakademik',
			'title' => 'Kalender Akadmik'
        ],[
			'url' => '/ekskul',
			'title' => 'Ekstrakurikuler'
        ]]
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
			'title' => 'File Gambar'
        ],[
			'url' => '/kategoriberita',
			'title' => 'Kategori Berita'
        ],[
			'url' => '/kategorikegiatan',
			'title' => 'Kategori Kegiatan'
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
            'title' => 'Peserta Pendidik',
            'url' => '/pesertadidik'
        ],[
            'title' => 'Sarana Prasarana',
            'url' => '/fasilitas'
        ],[
            'title' => 'Denah Sekolah',
            'url' => '/denahsekolah'
        ]]
	],[
		'icon' => 'fas fa-snowboarding',
		'title' => 'Kegiatan',
		'url' => '/kegiatan'
	],[
		'icon' => 'fas fa-id-card',
		'title' => 'Kontak',
		'url' => '/kontak'
	],[
		'icon' => 'fas fa-users',
		'title' => 'Pengguna',
		'url' => '/pengguna'
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
		]]
	],[
		'icon' => 'fas fa-graduation-cap',
		'title' => 'Ruang Belajar',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
            'title' => 'Jadwal Belajar',
            'url' => '/jadwalbelajar'
        ],[
            'title' => 'Modul Belajar',
            'url' => '/modulbelajar'
        ],[
            'title' => 'Video Ruang Belajar',
            'url' => '/video'
        ],[
            'title' => 'Informasi',
            'url' => '/informasi'
        ]]
	]]
];
