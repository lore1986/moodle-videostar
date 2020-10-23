<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

//require('../config.php');

class block_videostar_renderer extends plugin_renderer_base {
    
    function time_map_list_link($listelements, $videourl, $videotitle){

        $data_to_render = new stdClass ();

        //print_r($videourl); exit;

        foreach ($listelements as $single){

            $listlinksmap[] = array();
            $listlinksmap['time'] = $single['time'];
            $listlinksmap['tdesc'] = $single['description'];
            $data_to_render->maplistlinks[] = $listlinksmap;
        }

        $data_to_render->urlvideo = $videourl;
        
        //print_r($pagecontent); exit;
        $data_to_render->courseinfo = $pagecontent;
        $data_to_render->titlevideo = $videotitle;


        return $this->render_from_template('block_videostar/block_link', $data_to_render);

    }

    function get_page_content($urlvideo){

        global $DB, $PAGE;

        //$course_id = required_param('id', PARAM_INT);
        //$cm = get_coursemodule_from_id('page', $course_id, 0, false, MUST_EXIST);

        // /$page = $DB->get_record('page', ['id' => $cm->instance], '*' , MUST_EXIST);
        
        //$urlvideo = explode('iframe', $page->content);
        //return $cm->instance;
        //return $urlvideo;
    }
}