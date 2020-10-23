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

class block_videostar_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
 
        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocktitle', 'block_videostar'));
 
        // A sample string variable with a default value.
        $mform->addElement('text', 'config_text', get_string('defaultitle', 'block_videostar'));
        $mform->setDefault('config_text', 'default value');
        $mform->setType('config_text', PARAM_RAW);        

         // A sample string variable with a default value.
         $mform->addElement('text', 'config_videourl', get_string('blockvideo', 'block_videostar'));
         $mform->setDefault('config_videourl', get_string('defaulturl', 'block_videostar'));
         $mform->setType('config_videourl', PARAM_RAW);    

         $mform->addElement('text', 'config_videoid', get_string('blockid', 'block_videostar'));
         $mform->setDefault('config_videoid', get_string('defaultid', 'block_videostar'));
         $mform->setType('config_videoid', PARAM_RAW);    


        $mform = &$this->_form;
        $instancesNumber = $mform->_elementIndex['config_countinstances'];

        $repeatarray = array();
        $repeatarray[] = $mform->createElement('text', 'config_timevideo', get_string('instancevideo', 'block_videostar'));
        $repeatarray[] = $mform->createElement('textarea', 'config_description', get_string('descriptionvideo', 'block_videostar'), 'rows="1" cols="60"');
        $repeatarray[] = $mform->createElement('hidden', 'config_timevideoid', 0);
        
        if ($this->_instance){
            $repeatno = $DB->count_records('choice_options', array('choiceid'=>$this->_instance));
            $repeatno += 2;
        } else {
            $repeatno = 3;
        }

        //      $mform = &$this->_form;
        //      $instancesNumber = $mform->_elementIndex['config_countinstances'];
        
        $repeateloptions = array();
        //$repeateloptions['config_timevideo']['default'] = 0;
        $repeateloptions['config_timevideo']['rule'] = 'numeric';
        $repeateloptions['config_timevideo']['type'] = PARAM_INT;
 
        $repeateloptions['config_timevideo']['helpbutton'] = array('choiceoptions', 'choice'); //change text 
        
        $mform->setType('config_timevideo', PARAM_CLEANHTML);
        $mform->setType('config_timevideoid', PARAM_INT);
        
           /**
             * Method to add a repeating group of elements to a form.
             *
             * @param array $elementobjs Array of elements or groups of elements that are to be repeated
             * @param int $repeats no of times to repeat elements initially
             * @param array $options a nested array. The first array key is the element name.
             *    the second array key is the type of option to set, and depend on that option,
             *    the value takes different forms.
             *         'default'    - default value to set. Can include '{no}' which is replaced by the repeat number.
             *         'type'       - PARAM_* type.
             *         'helpbutton' - array containing the helpbutton params.
             *         'disabledif' - array containing the disabledIf() arguments after the element name.
             *         'rule'       - array containing the addRule arguments after the element name.
             *         'expanded'   - whether this section of the form should be expanded by default. (Name be a header element.)
             *         'advanced'   - whether this element is hidden by 'Show more ...'.
             * @param string $repeathiddenname name for hidden element storing no of repeats in this form
             * @param string $addfieldsname name for button to add more fields
             * @param int $addfieldsno how many fields to add at a time
             * @param string $addstring name of button, {no} is replaced by no of blanks that will be added.
             * @param bool $addbuttoninside if true, don't call closeHeaderBefore($addfieldsname). Default false.
             * @return int no of repeats of element in this page
            */

        $this->repeat_elements($repeatarray, $repeatno,
                    $repeateloptions, 'config_timevideo_repeats', 'config_timevideoid_add_fields', 1, null, true);

    }
}

