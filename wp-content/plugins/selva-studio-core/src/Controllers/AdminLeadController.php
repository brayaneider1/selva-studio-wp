<?php
namespace SelvaCore\Controllers;

class AdminLeadController {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
        add_action('admin_menu', [$this, 'add_menu_item']);
        add_action('admin_post_update_lead_status', [$this, 'handle_status_update']);
    }

    public function add_menu_item() {
        add_menu_page(
            'Cotizaciones Selva',
            'Selva Leads',
            'manage_options',
            'selva-leads',
            [$this, 'render_admin_page'],
            'dashicons-chart-area',
            25
        );
    }

    public function handle_status_update() {
        if (!current_user_can('manage_options')) return;
        
        $id = isset($_POST['lead_id']) ? intval($_POST['lead_id']) : 0;
        $status = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : '';

        if ($id && $status) {
            $this->repository->updateStatus($id, $status);
        }

        wp_redirect(admin_url('admin.php?page=selva-leads&updated=true'));
        exit;
    }

    public function render_admin_page() {
        $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
        $page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
        $orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'fecha';
        $order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : 'DESC';
        
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $leads = $this->repository->findAll([
            'search' => $search,
            'orderby' => $orderby,
            'order'   => $order,
            'limit'  => $limit,
            'offset' => $offset
        ]);

        $total_leads = $this->repository->count($search);
        $total_pages = ceil($total_leads / $limit);

        $toggle_order = ($order == 'ASC') ? 'DESC' : 'ASC';
        ?>
        <div class="wrap selva-admin-wrap">
            <h1 class="wp-heading-inline">Gestión de Cotizaciones</h1>
            <hr class="wp-header-end">

            <?php if (isset($_GET['updated'])) : ?>
                <div class="updated notice is-dismissible"><p>Estado actualizado correctamente.</p></div>
            <?php endif; ?>

            <!-- Search and Filter Bar -->
            <div class="tablenav top">
                <form method="get" action="">
                    <input type="hidden" name="page" value="selva-leads">
                    <p class="search-box">
                        <label class="screen-reader-text" for="post-search-input">Buscar cotización:</label>
                        <input type="search" id="post-search-input" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Buscar por nombre o email...">
                        <input type="submit" id="search-submit" class="button" value="Buscar Cliente">
                    </p>
                </form>
            </div>

            <style>
                .selva-admin-wrap { margin-top: 20px; }
                .selva-table { 
                    width: 100%; 
                    background: #fff; 
                    border-collapse: collapse; 
                    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                    border-radius: 8px;
                    overflow: hidden;
                }
                .selva-table th { background: #111; color: #fff; text-align: left; padding: 15px; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 1px; }
                .selva-table th a { color: #fff; text-decoration: none; display: flex; align-items: center; justify-content: space-between; }
                .selva-table th a:hover { color: var(--color-accent, #00ff00); }
                .selva-table td { padding: 15px; border-bottom: 1px solid #eee; color: #444; }
                .selva-table tr:hover { background: #f9f9f9; }
                
                .badge { padding: 4px 10px; border-radius: 4px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; }
                .status-badge { cursor: pointer; }
                .status-new { background: #e3f2fd; color: #1976d2; }
                .status-contacted { background: #fff3e0; color: #e65100; }
                .status-closed { background: #e8f5e9; color: #2e7d32; }
                
                .status-form { display: inline-block; }
                .status-select { font-size: 0.75rem; padding: 2px; border-radius: 4px; }
            </style>

            <table class="selva-table">
                <thead>
                    <tr>
                        <th><a href="<?php echo admin_url('admin.php?page=selva-leads&orderby=id&order=' . $toggle_order); ?>">ID</a></th>
                        <th><a href="<?php echo admin_url('admin.php?page=selva-leads&orderby=nombre&order=' . $toggle_order); ?>">Cliente</a></th>
                        <th>Servicio</th>
                        <th>Presupuesto</th>
                        <th><a href="<?php echo admin_url('admin.php?page=selva-leads&orderby=status&order=' . $toggle_order); ?>">Estado</a></th>
                        <th><a href="<?php echo admin_url('admin.php?page=selva-leads&orderby=fecha&order=' . $toggle_order); ?>">Fecha</a></th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($leads)) : ?>
                        <tr><td colspan="7">No se encontraron cotizaciones.</td></tr>
                    <?php else : ?>
                        <?php foreach ($leads as $lead) : ?>
                            <tr>
                                <td>#<?php echo $lead->id; ?></td>
                                <td>
                                    <strong><?php echo esc_html($lead->nombre); ?></strong><br>
                                    <small><?php echo esc_html($lead->email); ?></small>
                                </td>
                                <td><?php echo esc_html($lead->servicio); ?></td>
                                <td><?php echo esc_html($lead->budget); ?></td>
                                <td>
                                    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" class="status-form">
                                        <input type="hidden" name="action" value="update_lead_status">
                                        <input type="hidden" name="lead_id" value="<?php echo $lead->id; ?>">
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="new" <?php selected($lead->status, 'new'); ?>>Nuevo</option>
                                            <option value="contacted" <?php selected($lead->status, 'contacted'); ?>>Contactado</option>
                                            <option value="closed" <?php selected($lead->status, 'closed'); ?>>Cerrado</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($lead->fecha)); ?></td>
                                <td>
                                    <button class="button" onclick="alert('Mensaje:\n\n<?php echo esc_js($lead->mensaje); ?>')">Ver Mensaje</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="tablenav bottom">
                <div class="tablenav-pages">
                    <span class="displaying-num"><?php echo $total_leads; ?> cotizaciones</span>
                    <span class="pagination-links">
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <a class="button <?php echo ($i == $page) ? 'active' : ''; ?>" href="<?php echo admin_url('admin.php?page=selva-leads&paged=' . $i . '&s=' . urlencode($search)); ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                    </span>
                </div>
            </div>
        </div>
        <?php
    }
}
