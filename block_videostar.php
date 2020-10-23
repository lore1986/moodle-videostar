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
 * block_videostar main file
 *
 * @package   block_videostar
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Modified for use in MoodleBites for Developers Level 1
 * by Richard Jones & Justin Hunt.
 *
 * See: https://www.moodlebites.com/mod/page/view.php?id=24546
 */

defined('MOODLE_INTERNAL') || die();

/*

Notice some rules that will keep plugin approvers happy when you want
to register your plugin in the plugins database

    Use 4 spaces to indent, no tabs
    Use 8 spaces for continuation lines
    Make sure every class has php doc to describe it
    Describe the parameters of each class and function

    https://docs.moodle.org/dev/Coding_style
*/

/**
 * Class videostar minimal required block class.
 *
 */


class block_videostar extends block_base {

    public function init() {
        $this->title = get_string('videostar', 'block_videostar');
    }
    
    public function get_content() {

        $renderer = $this->page->get_renderer('block_videostar');

        if ($this->content !== null) {
          return $this->content;
        }
        
        $this->content         =  new stdClass;
        $this->content->text   = '';
        $this->content->footer = '';
        
        
        //print_r($this->config);
        
        $list= $this->config->timevideo;
        $listdescriptions= $this->config->description;
        
        $listitems = array();
        $listed = count($list);

        for($x = 0; $x < $listed; $x++){
            $singlelement = array();
            $singlelement['time'] = $list[$x];
            $singlelement['description'] = $listdescriptions[$x];

            $listitems[] = $singlelement;
        }

        $videourl = $this->config->videourl;
        $videotitle = $this->config->text;
        
        $this->content->text .= $renderer->time_map_list_link($listitems, $videourl, $videotitle);

        return $this->content;


    }


    public function instance_allow_multiple() {
        return true;
    }
    
    public function applicable_formats() {
        return array('all' => false,
                     'site' => true,
                     'site-index' => true,
                     'course-view' => true,
                     'mod' => true,
                     'my' => true);
    }
}