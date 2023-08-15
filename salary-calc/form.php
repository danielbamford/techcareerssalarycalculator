<?php
function salary_calculator_form() {
    ob_start();
       include plugin_dir_path(__FILE__) . '/templates/form-template.php';
    ?>
    <div id="salary-result-container">
        <!-- Result will be displayed here -->
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#calculate-salary-form').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    data: {
                        action: 'calculate_salary_ajax',
                        experience: $('#experience').val(),
                        japanese: $('#japanese').val(),
                        skillset: $('#skillset').val()
                    },
                    success: function(response) {
                        $('#salary-result-container').html(response);
                    }
                });
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('salary_calculator', 'salary_calculator_form');
