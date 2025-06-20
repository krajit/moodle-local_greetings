<?php

namespace local_greetings\output;

use plugin_renderer_base;

class renderer extends plugin_renderer_base {
    public function render_layout_test_page($page): string {
        $data = $page->export_for_template($this);
        return parent::render_from_template('local_greetings/layout-test', $data);
    }

    public function render_layout_newtest_page($page): string {
        $data = $page->export_for_template($this);        
        return parent::render_from_template('local_greetings/layout-test', $data);
    }
}