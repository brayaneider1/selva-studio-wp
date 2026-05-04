<?php
/**
 * Database Seeder - Selva Studio
 * Populates selva_leads with fake historical data.
 */

define('WP_USE_THEMES', false);
require_once('../../../../../wp-load.php');

global $wpdb;
$table_name = $wpdb->prefix . 'selva_leads';

$leads = [
    ['nombre' => 'Alejandro Rivera', 'email' => 'a.rivera@techflow.co', 'servicio' => 'ia', 'budget' => '15000', 'mensaje' => 'Necesitamos automatizar nuestro flujo de soporte con un chatbot personalizado.', 'fecha' => '2023-05-12 10:30:00', 'status' => 'closed'],
    ['nombre' => 'Mariana Costa', 'email' => 'marianac@designers.br', 'servicio' => 'web', 'budget' => '5000', 'mensaje' => 'Requerimos un portfolio de alto impacto para nuestra agencia de diseño.', 'fecha' => '2023-08-24 15:45:00', 'status' => 'closed'],
    ['nombre' => 'Héctor Martínez', 'email' => 'hm@industrialcorp.mx', 'servicio' => 'marketing', 'budget' => '8000', 'mensaje' => 'Estrategia de posicionamiento SEO para el mercado latinoamericano.', 'fecha' => '2024-01-10 09:20:00', 'status' => 'closed'],
    ['nombre' => 'Elena Giraldo', 'email' => 'elena@biogreen.org', 'servicio' => 'web', 'budget' => '12000', 'mensaje' => 'Plataforma e-commerce para productos orgánicos del Amazonas.', 'fecha' => '2024-03-15 11:00:00', 'status' => 'contacted'],
    ['nombre' => 'Carlos Ruiz', 'email' => 'carlos.r@startup.io', 'servicio' => 'ia', 'budget' => '25000', 'mensaje' => 'Integración de modelos LLM para análisis de datos internos.', 'fecha' => '2024-06-20 16:30:00', 'status' => 'closed'],
    ['nombre' => 'Sofía Valente', 'email' => 'sofia@luxuryhomes.com', 'servicio' => 'marketing', 'budget' => '6000', 'mensaje' => 'Campaña de Ads para mercado inmobiliario de lujo.', 'fecha' => '2024-09-05 14:15:00', 'status' => 'closed'],
    ['nombre' => 'Julio Bermúdez', 'email' => 'j.bermudez@logistica.cl', 'servicio' => 'web', 'budget' => '9500', 'mensaje' => 'Sistema de tracking en tiempo real para flota de transporte.', 'fecha' => '2025-01-12 08:50:00', 'status' => 'contacted'],
    ['nombre' => 'Laura Peñaloza', 'email' => 'l.penaloza@fashionlab.pe', 'servicio' => 'marketing', 'budget' => '4000', 'mensaje' => 'Social media strategy para el lanzamiento de nueva colección.', 'fecha' => '2025-02-28 17:10:00', 'status' => 'new'],
    ['nombre' => 'Roberto Sánchez', 'email' => 'rsanchez@fintech.co', 'servicio' => 'ia', 'budget' => '30000', 'mensaje' => 'Detección de fraudes mediante redes neuronales.', 'fecha' => '2025-04-10 12:00:00', 'status' => 'new'],
];

echo "Iniciando sembrado de datos...\n";

foreach ($leads as $lead) {
    $wpdb->insert($table_name, $lead);
    echo "Insertado Lead: " . $lead['nombre'] . " (" . $lead['fecha'] . ")\n";
}

$posts = [
    [
        'post_title'   => 'El futuro de la IA en la arquitectura de software',
        'post_content' => 'Exploramos cómo los modelos de lenguaje están transformando la forma en que escribimos código...',
        'post_date'    => '2023-06-15 09:00:00',
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_category' => [1]
    ],
    [
        'post_title'   => 'Ecosistemas Digitales: Más allá de una simple web',
        'post_content' => 'En Selva Studio creemos que una web debe ser un organismo vivo que crezca con el negocio...',
        'post_date'    => '2023-11-20 14:30:00',
        'post_status'  => 'publish',
        'post_author'  => 1
    ],
    [
        'post_title'   => 'Nuestra llegada al Piedemonte Amazónico',
        'post_content' => 'Hoy celebramos nuestra expansión tecnológica inspirada en la biodiversidad de nuestra tierra...',
        'post_date'    => '2024-04-05 10:00:00',
        'post_status'  => 'publish',
        'post_author'  => 1
    ],
    [
        'post_title'   => 'Clean Architecture en WordPress: Un reto de ingeniería',
        'post_content' => 'Analizamos cómo desacoplar la lógica de negocio del núcleo de WP para mayor escalabilidad...',
        'post_date'    => '2024-10-12 11:45:00',
        'post_status'  => 'publish',
        'post_author'  => 1
    ],
    [
        'post_title'   => 'Lanzamiento de Selva Studio 2.0',
        'post_content' => 'Renovamos nuestra identidad y nuestra infraestructura para los retos del 2026...',
        'post_date'    => '2025-02-18 16:00:00',
        'post_status'  => 'publish',
        'post_author'  => 1
    ]
];

echo "\nInsertando Noticias históricas...\n";

foreach ($posts as $post) {
    wp_insert_post($post);
    echo "Insertada Noticia: " . $post['post_title'] . " (" . $post['post_date'] . ")\n";
}

echo "Sembrado completado con éxito.";
