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
		'url' => '/admin-area/dashboard'
	],[
		'icon' => 'fas fa-university',
		'title' => 'Akademik',
		'url' => '#',
		'caret' => true,
		'id' => 'akademik',
		'sub_menu' => [[
			'url' => '/admin-area/ekskul',
			'title' => 'Ekstrakurikuler'
        ],[
			'url' => '/admin-area/kalenderakademik',
			'title' => 'Kalender Akadmik'
        ]]
	],[
		'icon' => 'fas fa-university',
		'title' => 'Berita',
		'url' => '#',
		'caret' => true,
		'id' => 'berita',
		'sub_menu' => [[
            'title' => 'Data Berita',
            'url' => '/admin-area/berita'
        ],[
			'url' => '/admin-area/kategoriberita',
			'title' => 'Kategori Berita'
        ]]
	],[
		'icon' => 'fas fa-images',
		'title' => 'Carousel',
		'url' => '/admin-area/carousel'
	],[
		'icon' => 'fas fa-database',
		'title' => 'Data Master',
		'url' => '#',
		'caret' => true,
		'id' => 'datamaster',
		'sub_menu' => [[
			'url' => '/admin-area/gallery',
			'title' => 'File Gambar'
        ],[
			'url' => '/admin-area/mapel',
			'title' => 'Mata Pelajaran'
        ]]
	],[
		'icon' => 'fas fa-file-archive',
		'title' => 'Data Sekolah',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
            'title' => 'Denah Sekolah',
            'url' => '/admin-area/denahsekolah'
        ],[
            'title' => 'Peserta Pendidik',
            'url' => '/admin-area/pesertadidik'
        ],[
            'title' => 'Sarana Prasarana',
            'url' => '/admin-area/fasilitas'
        ],[
            'title' => 'Tenaga Pendidik',
            'url' => '/admin-area/tenagapendidik'
        ]]
	],[
		'icon' => 'fas fa-snowboarding',
		'title' => 'Kegiatan',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
			'url' => '/admin-area/kegiatan',
			'title' => 'Data Kegiatan'
        ],[
			'url' => '/admin-area/kategorikegiatan',
			'title' => 'Kategori Kegiatan'
        ]]
	],[
		'icon' => 'fas fa-id-card',
		'title' => 'Kontak',
		'url' => '/admin-area/kontak'
	],[
		'icon' => 'fas fa-users',
		'title' => 'Pengguna',
		'url' => '/admin-area/pengguna'
	],[
		'icon' => 'fas fa-medal',
		'title' => 'Prestasi',
		'url' => '/admin-area/prestasi'
	],[
		'icon' => 'fas fa-id-card',
		'title' => 'Profil',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
			'url' => '/admin-area/kepalasekolah',
			'title' => 'Kepala Sekolah'
        ],[
			'url' => '/admin-area/sejarahsekolah',
			'title' => 'Sejarah Sekolah'
		],[
			'url' => '/admin-area/visimisi',
			'title' => 'Visi Misi'
        ],[
			'url' => '/admin-area/komitesekolah',
			'title' => 'Komite Sekolah'
		],[
			'url' => '/admin-area/strukturorganisasi',
			'title' => 'Struktur Organisasi'
        ],[
			'url' => '/admin-area/tatausaha',
			'title' => 'Tata Usaha'
		]]
	],[
		'icon' => 'fas fa-graduation-cap',
		'title' => 'Ruang Belajar',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
            'title' => 'Jadwal Belajar',
            'url' => '/admin-area/jadwalbelajar'
        ],[
            'title' => 'Modul Belajar',
            'url' => '/admin-area/modulbelajar'
        ],[
            'title' => 'Video Ruang Belajar',
            'url' => '/admin-area/video'
        ],[
            'title' => 'Informasi',
            'url' => '/admin-area/informasi'
        ]]
	]]
];
