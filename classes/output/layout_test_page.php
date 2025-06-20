<?php

namespace local_greetings\output;

use renderable;
use renderer_base;
use templatable;
use stdClass;

class layout_test_page implements renderable, templatable {
    private $sometext = null;

    public function __construct($sometext){
        $this->sometext = $sometext;
    }
   

    public function export_for_template(renderer_base $output): stdClass{
        $data = new stdClass();
        $data->sometext1 = $this->sometext;
        $data->sometext2 = "Love";
        return $data;
    }

}
