<?php
function calculate_salary_ajax_handler() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'salary_data';

    $experience = sanitize_text_field($_POST['experience']);
    $japanese = sanitize_text_field($_POST['japanese']);
    $skillset = sanitize_text_field($_POST['skillset']);

    $query = $wpdb->prepare(
        "SELECT expected_salary
        FROM $table_name
        WHERE years_of_experience = %s
        AND japanese_language_level = %s
        AND skillset = %s",
        $experience,
        $japanese,
        $skillset
    );

    $result = $wpdb->get_var($query);

    if ($result !== null) {
        include plugin_dir_path(__FILE__) . '/templates/result-template.php';
    } else {
        echo "Salary data not available for your selection.";
    }

    die(); // Important: Always terminate the AJAX request properly
}
add_action('wp_ajax_calculate_salary_ajax', 'calculate_salary_ajax_handler');
add_action('wp_ajax_nopriv_calculate_salary_ajax', 'calculate_salary_ajax_handler');
