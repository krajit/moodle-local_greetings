<?php

namespace local_greetings\output;

use renderable;
use renderer_base;
use templatable;
use stdClass;
use context_system;

class index_page implements renderable, templatable {
    private $messages = null;

    public function __construct($messages){
        $this->messages = $messages;
    }
   

    public function export_for_template(renderer_base $output): stdClass{
        global $USER;
        $data = new stdClass();
        $cardbackgroundcolor = get_config('local_greetings', 'messagecardbgcolor');
        $context = context_system::instance();
        $deletepost = has_capability('local/greetings:deleteownmessage', $context);
        $deleteanypost = has_capability('local/greetings:deleteanymessage', $context);
        
        foreach ($this->messages as $m) {
            // Can this user edit/delete this post?
            $m->candelete = ($deleteanypost || ($deletepost && $m->userid == $USER->id));
        }
        
        $data->messages = array_values($this->messages);
        $data->sesskey = sesskey();
        $data->cardbackgroundcolor = $cardbackgroundcolor;

        return $data;

    }

}
