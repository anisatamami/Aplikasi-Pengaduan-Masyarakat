<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// route masyarakat
$routes->get('/', 'Home::index');
$routes->get('/login/masy', 'Controllermasyarakat::index');
$routes->post('/login', 'Controllermasyarakat::login');
$routes->get('/logout', 'Controllermasyarakat::logout');
$routes->get('/register', 'Controllermasyarakat::register');
$routes->post('/masyarakat/daftar', 'Controllermasyarakat::daftar');
$routes->get('/masyarakat/logout', 'Controllermasyarakat::logout');
$routes->get('/masyarakat/dashboard', 'DashboardMasyarakat::index',['filter'=>'otentifikasimasyarakat']);
$routes->get('/masyarakat/pengaduan', 'Controllermasyarakat::pengaduan',['filter'=>'otentifikasimasyarakat']);
$routes->post('/masyarakat/upload', 'Controllermasyarakat::process',['filter'=>'otentifikasimasyarakat']);
$routes->get('/masyarakat/detail/(:num)', 'Controllermasyarakat::tampilrespon/$1',['filter'=>'otentifikasimasyarakat']);

//route petugas
$routes->get('/dashboard', 'Dashboardpetugas::index',['filter'=>'otentifikasi']);

//route CRUD Tabel Petugas
$routes->get('/petugas/user', 'Petugas::tampilUser',['filter'=>'otentifikasi']);
$routes->get('/petugas/tambah', 'Petugas::tambahPetugas',['filter'=>'otentifikasi']);
$routes->post('/petugas/simpan', 'Petugas::simpanPetugas',['filter'=>'otentifikasi']);
$routes->get('/petugas/edit/(:num)','Petugas::editPetugas/$1',['filter'=>'otentifikasi']);
$routes->post('/petugas/update', 'Petugas::updatePetugas',['filter'=>'otentifikasi']);
$routes->get('/petugas/hapus/(:num)', 'Petugas::hapusPetugas/$1',['filter'=>'otentifikasi']);

//route CRUD Tabel Masyarakat
$routes->get('/petugas/masyarakat', 'Petugas::tampilMasyarakat',['filter'=>'otentifikasi']);
$routes->get('/masyarakat/tambah', 'Petugas::tambahMasyarakat',['filter'=>'otentifikasi']);
$routes->post('/masyarakat/simpan', 'Petugas::simpanMasyarakat',['filter'=>'otentifikasi']);
$routes->get('/masyarakat/edit/(:num)','Petugas::editMasyarakat/$1',['filter'=>'otentifikasi']);
$routes->post('/masyarakat/update', 'Petugas::updateMasyarakat',['filter'=>'otentifikasi']);
$routes->get('/masyarakat/hapus/(:num)', 'Petugas::hapusMasyarakat/$1',['filter'=>'otentifikasi']);

//route validasi pengaduan
$routes->get('/verifikasi', 'Petugas::verifikasi',['filter'=>'otentifikasi']);
$routes->get('/pengaduan/validasi/(:num)', 'Petugas::tanggapan/$1',['filter'=>'otentifikasi']);
$routes->post('/petugas/tanggapan', 'Petugas::simpantanggapan',['filter'=>'otentifikasi']);
$routes->get('/respon', 'Petugas::respon',['filter'=>'otentifikasi']);
$routes->get('/pengaduan/tampilrespon/(:num)', 'Petugas::tampilrespon/$1',['filter'=>'otentifikasi']);

//route laporan
$routes->get('/laporan/pengaduan', 'Laporan::index',['filter'=>'otentifikasi']);
$routes->add('/laporan/data-pengaduan', 'Laporan::pengaduanTampil',['filter'=>'otentifikasi']);
$routes->post('/laporan/downloadexcel', 'Laporan::downloadexcel');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
