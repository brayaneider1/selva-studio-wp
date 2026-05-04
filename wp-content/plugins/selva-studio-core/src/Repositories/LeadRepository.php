<?php
namespace SelvaCore\Repositories;

class LeadRepository {
    private $table;

    public function __construct() {
        global $wpdb;
        $this->table = $wpdb->prefix . 'selva_leads';
    }

    public function insert(array $data) {
        global $wpdb;
        return $wpdb->insert($this->table, $data);
    }

    public function findAll($args = []) {
        global $wpdb;
        $search = isset($args['search']) ? $args['search'] : '';
        $orderby = isset($args['orderby']) ? $args['orderby'] : 'fecha';
        $order = isset($args['order']) ? $args['order'] : 'DESC';
        $limit = isset($args['limit']) ? (int)$args['limit'] : 10;
        $offset = isset($args['offset']) ? (int)$args['offset'] : 0;

        $where = "";
        if (!empty($search)) {
            $where = $wpdb->prepare("WHERE nombre LIKE %s OR email LIKE %s OR mensaje LIKE %s", "%$search%", "%$search%", "%$search%");
        }

        $sql = "SELECT * FROM {$this->table} $where ORDER BY $orderby $order LIMIT $limit OFFSET $offset";
        return $wpdb->get_results($sql);
    }

    public function count($search = '') {
        global $wpdb;
        $where = "";
        if (!empty($search)) {
            $where = $wpdb->prepare("WHERE nombre LIKE %s OR email LIKE %s", "%$search%", "%$search%");
        }
        return (int) $wpdb->get_var("SELECT COUNT(*) FROM {$this->table} $where");
    }

    public function updateStatus($id, $status) {
        global $wpdb;
        return $wpdb->update($this->table, ['status' => $status], ['id' => $id]);
    }

    public function delete($id) {
        global $wpdb;
        return $wpdb->delete($this->table, ['id' => $id]);
    }
}
