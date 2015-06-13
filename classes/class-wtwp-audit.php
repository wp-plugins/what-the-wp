<?php

class WTWP_Audit {
    public static function boot() {
        add_action('transition_post_status', array(__CLASS__, 'transition_post_status'), 10, 3);
        add_action('activated_plugin', array(__CLASS__, 'activated_plugin'), 10, 2);
        add_action('deactivated_plugin', array(__CLASS__, 'deactivated_plugin'), 10, 2);
        add_action('switch_theme', array(__CLASS__, 'switch_theme'), 10, 2);
    }

    public static function transition_post_status($new_status, $old_status, $post) {
        $u = wp_get_current_user();
        error_log("audit:transition_post_status {$post->ID} from $old_status to $new_status as {$u->ID}");
    }

    public static function activated_plugin($plugin, $network_activation) {
        error_log("audit:activated_plugin $plugin network=$network_activation");
    }

    public static function deactivated_plugin($plugin, $network_activation) {
        error_log("audit:deactivated_plugin $plugin network=$network_activation");
    }

    public static function switch_theme($new_name, $new_theme) {
        error_log("audit:switch_theme $new_name");
    }
}
