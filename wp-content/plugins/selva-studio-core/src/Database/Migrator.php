<?php
namespace SelvaCore\Database;

class Migrator {
    public function create_tables() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'selva_leads';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            fecha datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            nombre varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            servicio varchar(50) NOT NULL,
            budget varchar(50) NOT NULL,
            mensaje text,
            status varchar(20) DEFAULT 'new' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
