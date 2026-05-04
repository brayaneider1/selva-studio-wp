<?php
/*
Plugin Name: Selva Studio Core
Description: Engine de Backend para Selva Studio .
Version: 1.0
Author: Brayan Esneider
*/

namespace SelvaCore;

if (!defined('ABSPATH')) exit;

// Autoloader PSR-4 para cargar las clases automáticamente
spl_autoload_register(function ($class) {
    $prefix = 'SelvaCore\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

// Inicialización de componentes
add_action('plugins_loaded', function() {
    $db_migrator = new Database\Migrator();
    $repository  = new Repositories\LeadRepository();
    $service     = new Services\LeadService($repository);
    
    // API Controller
    new Controllers\RestLeadController($service);
    
    // Admin View Controller
    new Controllers\AdminLeadController($repository);
});

// Registro de activación para crear las tablas
register_activation_hook(__FILE__, [new Database\Migrator(), 'create_tables']);
