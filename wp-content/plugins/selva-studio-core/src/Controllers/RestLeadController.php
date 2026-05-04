<?php
namespace SelvaCore\Controllers;

use SelvaCore\Services\LeadService;

class RestLeadController {
    private $service;

    public function __construct(LeadService $service) {
        $this->service = $service;
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes() {
        register_rest_route('selva/v1', '/contact', [
            'methods' => 'POST',
            'callback' => [$this, 'handle_contact'],
            'permission_callback' => '__return_true',
        ]);
    }

    public function handle_contact($request) {
        $success = $this->service->registerNewLead($request->get_params());
        return rest_ensure_response([
            'success' => $success,
            'message' => $success ? '¡Mensaje enviado con éxito!' : 'Hubo un error.'
        ]);
    }
}
