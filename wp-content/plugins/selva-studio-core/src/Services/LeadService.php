<?php
namespace SelvaCore\Services;

use SelvaCore\Repositories\LeadRepository;

class LeadService {
    private $repository;

    public function __construct(LeadRepository $repository) {
        $this->repository = $repository;
    }

    public function registerNewLead($params) {
        $data = [
            'nombre'   => sanitize_text_field($params['nombre']),
            'email'    => sanitize_email($params['email']),
            'servicio' => sanitize_text_field($params['servicio']),
            'budget'   => sanitize_text_field($params['budget']),
            'mensaje'  => sanitize_textarea_field($params['mensaje']),
        ];

        return $this->repository->insert($data);
    }
}
