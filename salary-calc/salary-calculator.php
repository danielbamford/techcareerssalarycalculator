<?php
/**
 * Plugin Name: Salary Calculator
 * Description: Calculate expected salary based on years of experience, Japanese language level, and skillset.
 * Version: 0.1
 * Author: Daniel Bamford
 */

// Include the form and calculation code
require_once plugin_dir_path(__FILE__) . 'form.php';
require_once plugin_dir_path(__FILE__) . 'calculate.php';

// Create custom table
function create_salary_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'salary_data'; // Prefix with WordPress table prefix
    $wpdb_collate = $wpdb->collate;

    $sql = "CREATE TABLE $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        years_of_experience VARCHAR(50),
        japanese_language_level VARCHAR(50),
        skillset VARCHAR(50),
        expected_salary DECIMAL(10, 2),
        PRIMARY KEY  (id)
    ) COLLATE {$wpdb_collate}";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_salary_table');


// clean up table on removal

function drop_salary_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'salary_data';

    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
register_deactivation_hook(__FILE__, 'drop_salary_table');
