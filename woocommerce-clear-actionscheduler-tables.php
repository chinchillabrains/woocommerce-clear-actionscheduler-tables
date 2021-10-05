<?php

if ( ! function_exists( 'chilla_clear_actionscheduler_tables' ) ) {
  function chilla_clear_actionscheduler_tables () {
    global $wpdb;

		$queries = [
			"DELETE FROM {$wpdb->prefix}actionscheduler_actions WHERE status='failed'",
			"DELETE FROM {$wpdb->prefix}actionscheduler_actions WHERE status='complete'",
			"DELETE FROM {$wpdb->prefix}actionscheduler_logs WHERE action_id NOT IN (SELECT action_id FROM {$wpdb->prefix}actionscheduler_actions)",
		];
		foreach ( $queries as $query ) {
			$wpdb->query( $query );
		}
    
  }
}
