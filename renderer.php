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

    /**
     * Videostar Block to navigate a page embedded video.
     * See: https://github.com/lore1986
     */

class block_videostar_renderer extends plugin_renderer_base {
    
    function time_map_list_link($listelements, $videoattributes){

        $data_to_render = new stdClass ();

        //print_r($videourl); exit;

        foreach ($listelements as $single){

            $listlinksmap[] = array();
            $listlinksmap['time'] = $single['time'];
            $listlinksmap['tdesc'] = $single['description'];
            $data_to_render->maplistlinks[] = $listlinksmap;
        }

        $data_to_render->urlvideo = $videoattributes['url'];
        $data_to_render->titlevideo = $videoattributes['title'];
        $data_to_render->titleid = $videoattributes['idhtml'];


        return $this->render_from_template('block_videostar/block_link', $data_to_render);

    }
}