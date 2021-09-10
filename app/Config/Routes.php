<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// users
$routes->get('home', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('user/login', 'Costumer/Costumer::login');
$routes->get('user/sewa', 'Costumer/costumer::sewa');
$routes->get('user/logout', 'Costumer/costumer::logout');
$routes->get('user/profil', 'Costumer/costumer::profil');
$routes->get('user/transaksi', 'Costumer/costumer::transaksi');
$routes->get('user/foto', 'Costumer/costumer::foto');
$routes->get('transaksi/bayar/(:num)', 'Costumer/costumer::bayar');
$routes->get('transaksi/batal/(:num)', 'Costumer/costumer::batal');
$routes->get('user/carasewa', 'Costumer/costumer::carasewa');
$routes->get('antrian', 'Costumer/Costumer::antrian');

// form action
$routes->add('user/register', 'Costumer/costumer::register');
$routes->add('user/login', 'Costumer/costumer::login');
$routes->add('user/sewa/(:num)', 'Costumer/Costumer::sewa');
$routes->add('user/profil', 'Costumer/costumer::profil');
$routes->add('user/foto', 'Costumer/costumer::foto');
$routes->add('transaksi/bayar/(:num)', 'Costumer/costumer::bayar');
$routes->add('antrian', 'Costumer/Costumer::antrian');

// admin action
$routes->add('admin/login', 'Admin/Admin::login');
$routes->add('admin/tambahproduk', 'Admin/Admin::tambahproduk');
$routes->add('admin/editproduk/(:num)', 'Admin/Admin::editproduk');
$routes->add('admin/edituser/(:num)', 'Admin/Admin::edituser');
$routes->add('admin/gantigambar/(:num)', 'Admin/Admin::gantigambar');


// antrian
$routes->get('antrian', 'Costumer/Costumer::antrian');

// admin
$routes->get('admin', 'Admin/Admin::index');
$routes->get('admin/login', 'Admin/Admin::login');
$routes->get('admin/transaksi', 'Admin/Admin::transaksi');
$routes->get('admin/logout', 'Admin/Admin::logout');
$routes->get('admin/tambahproduk', 'Admin/Admin::tambahproduk');
$routes->get('admin/listproduk', 'Admin/Admin::listproduk');
$routes->get('admin/edituser/(:num)', 'Admin/Admin::edituser');
$routes->get('admin/edittransaksi/(:num)/', 'Admin/Admin::edittransaksi');
$routes->get('admin/editproduk/(:num)', 'Admin/Admin::editproduk');
$routes->get('admin/hapususer/(:num)', 'Admin/Admin::hapususer');
$routes->get('admin/hapustransaksi/(:num)/(:num)', 'Admin/Admin::hapustransaksi');
$routes->get('admin/hapusproduk/(:num)/(:num)', 'Admin/Admin::hapusproduk');
$routes->get('admin/gantigambar/(:num)', 'Admin/Admin::gantigambar');
$routes->get('admin/pengembalian', 'Admin/Admin::pengembalian');
$routes->add('admin/kembalikan/(:num)/(:num)/(:num)', 'Admin/Admin::kembalikan');

// laporan
$routes->get('admin/laporan/', 'Admin/Admin::laporan');
$routes->add('admin/laporan/', 'Admin/Admin::laporan');
$routes->add('admin/export/', 'Admin/Admin::cetak');


// transaksi tolak terima
$routes->get('admin/terima/(:num)/(:num)', 'Admin/Admin::terima');
$routes->get('admin/tolak/(:num)/(:num)', 'Admin/Admin::tolak');
$routes->get('admin/antrian', 'Admin/Admin::antrian');
$routes->get('admin/hapusantrian/(:num)', 'Admin/Admin::hapusantrian');

// hapus produk
$routes->get('admin/hapuproduk/(:num)', 'Admin/Admin::hapusproduk');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
