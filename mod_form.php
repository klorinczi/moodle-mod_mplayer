<?php
<<<<<<< HEAD

/**
* Creates instance of Media Player activity module
* Adapted from mod_form.php template by Jamie Pratt
*
* By Matt Bury - http://matbury.com/ - matbury@gmail.com
* @version $Id: index.php,v 0.2 2009/02/21 matbury Exp $
* @licence http://www.gnu.org/copyleft/gpl.html GNU Public Licence
*
* DB Table name (mdl_)mplayer
* 
*/
/**    Copyright (C) 2009  Matt Bury
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once ($CFG->dirroot.'/mod/mplayer/locallib.php');

class mod_mplayer_mod_form extends moodleform_mod {

    function definition() {
        global $CFG;
        global $COURSE;
        global $USER;

        $mform =& $this->_form;

        $mplayer_url_array = array('size'=>'80');
        $mplayer_int_array = array('size'=>'6');
=======
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
 * Creates instance of Media Player activity module
 * Adapted from mod_form.php template by Jamie Pratt
 *
 * @package     mod_mplayer
 * @category    mod
 * @author      Matt Bury - matbury@gmail.com
 * @author      Valery Fremaux <valery.fremaux@gmail.com>
 * @copyright   (C) 2009 onwards Matt Bury
 * @licence     http://www.gnu.org/copyleft/gpl.html GNU Public Licence
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/mplayer/locallib.php');

class mod_mplayer_mod_form extends moodleform_mod {

    public $descriptionoptions;

    public function definition() {
        global $CFG, $COURSE, $USER, $PAGE;

        $mform =& $this->_form;
<<<<<<< HEAD
        $PAGE->requires->yui_module('moodle-mplayer-technologychooser', 'M.course.init_technologychooser',
                array(array('formid' => $mform->getAttribute('id'))));
=======
        $PAGE->requires->js_call_amd('mod_mplayer/technologychooser', 'init', array('formid' => $mform->getAttribute('id')));
>>>>>>> MOODLE_33_STABLE

        $config = get_config('mplayer');

        if (empty($instance)) {
            $instance = new StdClass();
        }
        if (empty($instance->technology)) {
            $instance->technology = $config->default_player;
        }

        $maxfiles = 99;                // TODO: add some setting.
        $maxbytes = $COURSE->maxbytes; // TODO: add some setting.
        $modcontext = $this->context;
<<<<<<< HEAD
<<<<<<< HEAD
        $this->descriptionoptions = array('trusttext' => true, 'subdirs' => false, 'maxfiles' => $maxfiles, 'maxbytes' => $maxbytes, 'context' => $modcontext);
>>>>>>> MOODLE_32_STABLE
=======
=======
>>>>>>> MOODLE_33_STABLE
        $this->descriptionoptions = array('trusttext' => true,
                                          'subdirs' => false,
                                          'maxfiles' => $maxfiles,
                                          'maxbytes' => $maxbytes,
                                          'context' => $modcontext);
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE

        // Adding the "general" fieldset, where all the common settings are shown.
        $mform->addElement('header', 'general', get_string('general', 'form'));

<<<<<<< HEAD
<<<<<<< HEAD
        // Adding the standard "name" field
        $mform->addElement('text', 'name', get_string('mplayername', 'mplayer'), $mplayer_url_array);
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        // Introduction.
        $this->add_intro_editor(false, get_string('summary', 'mplayer'));

        //--------------------------------------- MEDIA SOURCE ----------------------------------------

        $mform->addElement('header', 'mplayersource', get_string('mplayersource', 'mplayer'));
        $mform->addHelpButton('mplayersource', 'mplayer_source', 'mplayer');

        // mplayerfile
        $mform->addElement('filemanager', 'mplayerfile', get_string('mplayerfile', 'mplayer'), null, array('courseid' => $COURSE->id, 'maxfiles' => 30));
        $mform->addRule('mplayerfile', get_string('required'), 'required', null, 'client');

        // type
        $mform->addElement('select', 'type', get_string('type', 'mplayer'), mplayer_list_type());
        $mform->setDefault('type', 'video');
        $mform->setAdvanced('type');

        // streamer
        $mform->addElement('select', 'streamer', get_string('streamer', 'mplayer'), mplayer_list_streamer());
        $mform->setDefault('streamer', '');
        $mform->setAdvanced('streamer');

        //--------------------------------------- playlists ---------------------------------------
=======
        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
=======
        $mform->addElement('text', 'name', get_string('name'), array('size' => '64'));
>>>>>>> MOODLE_32_STABLE
=======

        // Adding the "general" fieldset, where all the common settings are shown.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size' => '64'));
>>>>>>> MOODLE_33_STABLE
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

<<<<<<< HEAD
        // Introduction.
        $this->standard_intro_elements();

        // TECHNOLOGY.

        if (!empty($config->allowchoice)) {
            $mform->addElement('header', 'headertechnology', get_string('technology', 'mplayer'));
            $mform->addHelpButton('headertechnology', 'mplayer_technology', 'mplayer');
            $mform->setExpanded('headertechnology');

            // Technology.
            $mform->addElement('select', 'technology', get_string('technology', 'mplayer'), mplayer_list_technologies());
            $mform->setDefault('technology', $config->default_player);

        } else {
            $mform->addElement('hidden', 'technology', $config->default_player);
        }

=======
        // TECHNOLOGY.

        if (!empty($config->allowchoice)) {
            // Technology.
            $mform->addElement('select', 'technology', get_string('technology', 'mplayer'), mplayer_list_technologies());
            $mform->setDefault('technology', $config->default_player);
            $mform->addHelpButton('technology', 'mplayer_technology', 'mplayer');

        } else {
            $mform->addElement('hidden', 'technology', $config->default_player);
            $mform->setType('technology', PARAM_ALPHA);
        }

        // Introduction.
        $this->standard_intro_elements();

>>>>>>> MOODLE_33_STABLE
        // MEDIA SOURCE.

        $mform->addElement('header', 'mplayerresources', get_string('mplayerresources', 'mplayer'));
        $mform->addHelpButton('mplayerresources', 'mplayer_resources', 'mplayer');
        $mform->setExpanded('mplayerresources');

        // Mplayerfile.
        $options = array('subdirs' => true, 'courseid' => $COURSE->id, 'maxfiles' => 60);
        $mform->addElement('filemanager', 'mplayerfiles', get_string('mplayerfiles', 'mplayer'), null, $options);
<<<<<<< HEAD

<<<<<<< HEAD
        // Type.
        $mform->addElement('select', 'type', get_string('type', 'mplayer'), mplayer_list_type($instance));
=======

        if (!empty($config->allowchoice)) {
            // Button to update player-specific options on technology change (will be hidden by JavaScript).
            $mform->registerNoSubmitButton('updatetechnology');
            $mform->addElement('submit', 'updatetechnology', get_string('updatetechnology', 'mplayer'));

            // Just a placeholder for the player options.
        }
        $mform->addElement('hidden', 'addtechnologyoptionshere');
        $mform->setType('addtechnologyoptionshere', PARAM_BOOL);

        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }

    public function set_data($defaults) {

        if ($defaults->coursemodule) {
            // This is when updating.
            $context = context_module::instance($defaults->coursemodule);

            $fs = get_file_storage();
            if ($fs->is_area_empty($context->id, 'mod_mplayer', 'mplayerfiles', 0)) {
                $cm = new StdClass();
                $cm->id = $defaults->coursemodule;
                mplayer_init_storage($cm);
            }

            $defaults = file_prepare_standard_editor($defaults, 'notes', $this->descriptionoptions, $context, 'mod_mplayer',
                                                     'notes', $defaults->id);

            // Saves draft customization image files into definitive filearea.
            $instancefiles = array('mplayerfiles', 'playlistfiles', 'configxml', 'audiodescriptionfile', 'captionsfile',
                                   'hdfile', 'livestreamfile', 'livestreamimage', 'logoboxfile', 'logofile');
            foreach ($instancefiles as $if) {
                $draftitemid = file_get_submitted_draft_itemid($if);
                $options = array();
                $options['maxfiles'] = ($if == 'mplayerfiles') ? -1 : 1;
                $options['subdirs'] = ($if == 'mplayerfiles') ? true : false;
                file_prepare_draft_area($draftitemid, $context->id, 'mod_mplayer', $if, 0, $options);
                if ($if == 'configxml') {
                    $defaults->configxmlgroup['configxml'] = $draftitemid;
                } else {
                    $defaults->$if = $draftitemid;
                }
            }
        }

        parent::set_data($defaults);
    }

    public function definition_after_data() {

        parent::definition_after_data();

        $mform = $this->_form;

        if (is_array($mform->getElementValue('technology'))) {
            // True if it is a visible list.
            $technologyvalue = array_pop($mform->getElementValue('technology'));
        } else {
            $technologyvalue = $mform->getElementValue('technology');
        }
        $playerelements = $this->get_player_elements($technologyvalue);

        // Add technology options.
        for ($i = 0; $i < count($playerelements); $i++) {
            $mform->insertElementBefore($mform->removeElement($playerelements[$i]->getName(), false),
                    'addtechnologyoptionshere');
        }

        $mplayerfiles =& $mform->getElement('mplayerfiles');
        $value = $mplayerfiles->getValue();
        if (empty($value)) {
            // This is when creating new.
            $draftitemid = file_get_unused_draft_itemid();
            mplayer_init_storage(null, $draftitemid);
            $value = $mplayerfiles->setValue($draftitemid);
        }
    }

    /**
     * Custom validation
     *
     * @param array $data
     * @param array $files
     * @return array
     */
    public function validation($data, $files) {
        $draftitemid = file_get_submitted_draft_itemid('mplayerfiles');
        $voiddata = file_get_drafarea_files($draftitemid);

        $errors = parent::validation($data, $files);

        return $errors;
    }

    public function add_completion_rules() {
        $mform =& $this->_form;

        $label = get_string('mediaviewed', 'mplayer');
        $mform->addElement('checkbox', 'completionmediaviewed', $label, get_string('completionmediaviewed', 'mplayer'));

        return array('completionmediaviewed');
    }

    public function completion_rule_enabled($data) {
        return(!empty($data['completionmediaviewed']));
    }

    protected function get_player_elements($technology) {
        global $CFG, $COURSE, $USER;

        $mplayerurlarray = array('size' => '80');
        $mplayerintarray = array('size' => '6');

        $mform =& $this->_form;

        $config = get_config('mplayer');

        $elements = array();

        // Type.
        $mform->addElement('select', 'type', get_string('type', 'mplayer'), mplayer_list_type($technology));
>>>>>>> MOODLE_33_STABLE
        $mform->setDefault('type', 'video');

        // External url alternative.
        $attrs = array('rows' => 5, 'style' => 'width:97%', 'height' => 0);
        $mform->addElement('textarea', 'external', get_string('external', 'mplayer'), $attrs);

        $mform->addElement('select', 'streamer', get_string('streamer', 'mplayer'), mplayer_list_streamer());
        $mform->disabledIf('streamer', 'type', 'neq', 'rtmp');
        $mform->setDefault('streamer', 'none');
        $mform->setAdvanced('streamer');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        // Playlists ---------------------------------------.
>>>>>>> MOODLE_32_STABLE
=======
=======
=======
>>>>>>> MOODLE_32_STABLE
        if (!empty($config->allowchoice)) {
            // Button to update player-specific options on technology change (will be hidden by JavaScript).
            $mform->registerNoSubmitButton('updatetechnology');
            $mform->addElement('submit', 'updatetechnology', get_string('updatetechnology', 'mplayer'));

            // Just a placeholder for the player options.
            $mform->addElement('hidden', 'addtechnologyoptionshere');
            $mform->setType('addtechnologyoptionshere', PARAM_BOOL);
        }

        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }

    public function set_data($defaults) {

        if ($defaults->coursemodule) {
            // This is when updating.
            $context = context_module::instance($defaults->coursemodule);

            $fs = get_file_storage();
            if ($fs->is_area_empty($context->id, 'mod_mplayer', 'mplayerfiles', 0)) {
                $cm = new StdClass();
                $cm->id = $defaults->coursemodule;
                mplayer_init_storage($cm);
            }

            $defaults = file_prepare_standard_editor($defaults, 'notes', $this->descriptionoptions, $context, 'mod_techproject',
                                                     'notes', $defaults->id);

            // Saves draft customization image files into definitive filearea.
            $instancefiles = array('mplayerfiles', 'playlistfiles', 'configxml', 'audiodescriptionfile', 'captionsfile',
                                   'hdfile', 'livestreamfile', 'livestreamimage', 'logoboxfile', 'logofile');
            foreach ($instancefiles as $if) {
                $draftitemid = file_get_submitted_draft_itemid($if);
                $maxfiles = ($if == 'mplayerfiles') ? -1 : 1;
                $subdirs = ($if == 'mplayerfiles') ? true : false;
                file_prepare_draft_area($draftitemid, $context->id, 'mod_mplayer', $if, 0, $this->descriptionoptions);
                if ($if == 'configxml') {
                    $defaults->configxmlgroup['configxml'] = $draftitemid;
                } else {
                    $defaults->$if = $draftitemid;
                }
            }
        }

        parent::set_data($defaults);
    }

    public function definition_after_data() {

        parent::definition_after_data();

        $mform = $this->_form;

        $technologyvalue = $mform->getElementValue('technology');
        if (is_array($technologyvalue)) {
            $technologyvalue = array_pop($technologyvalue);
        }
        $playerelements = $this->get_player_elements($technologyvalue);

        // Add technology options.
        for ($i = 0; $i < count($playerelements); $i++) {
            $mform->insertElementBefore($mform->removeElement($playerelements[$i]->getName(), false),
                    'addtechnologyoptionshere');
        }

        $mplayerfiles =& $mform->getElement('mplayerfiles');
        $value = $mplayerfiles->getValue();
        if (empty($value)) {
            // This is when creating new.
            $draftitemid = file_get_unused_draft_itemid();
            mplayer_init_storage(null, $draftitemid);
            $value = $mplayerfiles->setValue($draftitemid);
        }
    }

    /**
     * Custom validation
     *
     * @param array $data
     * @param array $files
     * @return array
     */
    public function validation($data, $files) {
        $draftitemid = file_get_submitted_draft_itemid('mplayerfiles');
        $voiddata = file_get_drafarea_files($draftitemid);

        $errors = parent::validation($data, $files);

        return $errors;
    }

    public function add_completion_rules() {
        $mform =& $this->_form;

        $label = get_string('mediaviewed', 'mplayer');
        $mform->addElement('checkbox', 'completionmediaviewed', $label, get_string('completionmediaviewed', 'mplayer'));

        return array('completionmediaviewed');
    }

    public function completion_rule_enabled($data) {
        return(!empty($data['completionmediaviewed']));
    }

    protected function get_player_elements($technology) {
        global $CFG, $COURSE, $USER;

        $mplayerurlarray = array('size' => '80');
        $mplayerintarray = array('size' => '6');

        $mform =& $this->_form;

        $config = get_config('mplayer');

        $elements = array();

<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
=======
        // Type.
        $mform->addElement('select', 'type', get_string('type', 'mplayer'), mplayer_list_type($technology));
        $mform->setDefault('type', 'video');

        // External url alternative.
        $attrs = array('rows' => 5, 'style' => 'width:97%', 'height' => 0);
        $mform->addElement('textarea', 'external', get_string('external', 'mplayer'), $attrs);

        $mform->addElement('select', 'streamer', get_string('streamer', 'mplayer'), mplayer_list_streamer());
        $mform->disabledIf('streamer', 'type', 'neq', 'rtmp');
        $mform->setDefault('streamer', 'none');
        $mform->setAdvanced('streamer');

>>>>>>> MOODLE_32_STABLE
        // PLAYLISTS.
>>>>>>> MOODLE_32_STABLE

=======
        // PLAYLISTS.

>>>>>>> MOODLE_33_STABLE
        $elements[] = $mform->addElement('header', 'playlists', get_string('playlists', 'mplayer'));
        $mform->addHelpButton('playlists', 'mplayer_playlist', 'mplayer');

        // Local file path template.
        $clipurl = $CFG->wwwroot.'/pluginfile.php/'.$this->context->id.'/mod_mplayer/mplayerfile/0/&lt;filename&gt;';
        $elements[] = $mform->addElement('static', 'playlistlocalpath', get_string('playlistlocalpath', 'mplayer'), $clipurl);
<<<<<<< HEAD

<<<<<<< HEAD
        // Playlistfile.
        $group = array();
        $group[] = $mform->createElement('filepicker', 'playlistfile', get_string('playlistfile', 'mplayer'), array('courseid' => $COURSE->id, 'accepted_types' => '.xml'));
        $mform->setDefault('playlist', 'none');
        $group[] = $mform->createElement('checkbox', 'clearplaylist', '', get_string('clearplaylist', 'mplayer'));
        $mform->addGroup($group, 'playlistgroup', get_string('playlistfile', 'mplayer'), '', array(''), false);

        // Playlist.
        if ($CFG->mplayer_default_player == 'jw') {
=======
        // Playlist.
<<<<<<< HEAD
        if ($instance->technology == 'jw') {
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'playlist', get_string('playlist', 'mplayer'), mplayer_list_playlistposition());
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('select', 'playlist', get_string('playlist', 'mplayer'), mplayer_list_playlistposition());
>>>>>>> MOODLE_32_STABLE
=======

        // Playlist.
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('select', 'playlist', get_string('playlist', 'mplayer'), mplayer_list_playlistposition());
>>>>>>> MOODLE_33_STABLE
        } else {
            $elements[] = $mform->addElement('select', 'playlist', get_string('playliststyle', 'mplayer'), mplayer_list_playliststyles());
        }

        // Playlistsize.
        $elements[] = $mform->addElement('text', 'playlistsize', get_string('playlistsize', 'mplayer'), $mplayerintarray);
        $mform->setType('playlistsize', PARAM_INT);
        $mform->setDefault('playlistsize', '180');
        $mform->setAdvanced('playlistsize');

<<<<<<< HEAD
        // PLaylist thumbs
        $mform->addElement('filemanager', 'playlistthumb', get_string('playlistthumb', 'mplayer'), null, array('courseid' => $COURSE->id, 'maxfiles' => 30));

        // Item.
=======
        // Item.
        // TODO : Check if still necessary.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
        $mform->addElement('text', 'item', get_string('item', 'mplayer'), $mplayer_int_array);
=======
        $mform->addElement('text', 'item', get_string('item', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
        $elements[] = $mform->addElement('text', 'item', get_string('item', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
        $elements[] = $mform->addElement('text', 'item', get_string('item', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_33_STABLE
        $mform->setType('item', PARAM_TEXT);
        $mform->setDefault('item', '');
        $mform->setAdvanced('item');

        // Repeat.
        $elements[] = $mform->addElement('select', 'mplayerrepeat', get_string('mplayerrepeat', 'mplayer'), mplayer_list_repeat());
        $mform->setDefault('mplayerrepeat', 'none');
        $mform->setAdvanced('mplayerrepeat');

        // Shuffle.
        $elements[] = $mform->addElement('select', 'shuffle', get_string('shuffle', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('shuffle', 'false');
        $mform->setAdvanced('shuffle');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- configxml ---------------------------------------

        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('header', 'config', get_string('config', 'mplayer'));
            $mform->addHelpButton('config', 'mplayer_configxml', 'mplayer');
    
=======
        // Subtitle options ---------------------------------------.
=======
        // SUBTITLES.
>>>>>>> MOODLE_32_STABLE
=======
        // SUBTITLES.
>>>>>>> MOODLE_33_STABLE

        if ($technology != 'jw') {
            $elements[] = $mform->addElement('header', 'configsubtitles', get_string('configsubtitles', 'mplayer'));

            $elements[] = $mform->addElement('select', 'langselection', get_string('langselection', 'mplayer'), mplayer_list_langchoiceoptions());
            $mform->setDefault('langselection', 'langcourse');

            $elements[] = $mform->addElement('select', 'langforced', get_string('langforced', 'mplayer'), mplayer_list_availablelangoptions());
            $mform->disabledIf('langforced', 'langselection', 'neq', 'langteacherchoice');
        }

        // CONFIGXML.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'config', get_string('config', 'mplayer'));
            $mform->addHelpButton('config', 'mplayer_configxml', 'mplayer');
<<<<<<< HEAD
<<<<<<< HEAD

>>>>>>> MOODLE_32_STABLE
            // Configxml.
            $group = array();
            $optoins = array('courseid' => $COURSE->id, 'accepted_types' => '.xml');
            $group[] = $mform->createElement('filepicker', 'configxml', get_string('configxml', 'mplayer'), $options);
            $group[] = $mform->createElement('checkbox', 'clearconfigxml', '', get_string('clearconfigxml', 'mplayer'));
            $mform->addGroup($group, 'configxmlgroup', get_string('configxml', 'mplayer'), '', array(''), false);
=======
            $fmoptions = array('maxfiles' => 1, 'subdirs' => false);
            $elements[] = $mform->addElement('filemanager', 'configxml', get_string('configxml', 'mplayer'), $fmoptions);
>>>>>>> MOODLE_32_STABLE
=======
            $fmoptions = array('maxfiles' => 1, 'subdirs' => false);
            $elements[] = $mform->addElement('filemanager', 'configxml', get_string('configxml', 'mplayer'), $fmoptions);
>>>>>>> MOODLE_33_STABLE
        } else {
            $elements[] = $mform->addElement('hidden', 'configxml');
            $mform->setType('configxml', PARAM_FILE);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- APPEARANCE ---------------------------------------
=======
        // APPEARANCE ---------------------------------------.
>>>>>>> MOODLE_32_STABLE
=======
        // APPEARANCE.
>>>>>>> MOODLE_32_STABLE
=======
        // APPEARANCE.
>>>>>>> MOODLE_33_STABLE

        $elements[] = $mform->addElement('header', 'appearance', get_string('appearance', 'mplayer'));
        $mform->addHelpButton('appearance', 'mplayer_appearance', 'mplayer');

<<<<<<< HEAD
<<<<<<< HEAD
        //notes
        $mform->addElement('editor', 'notes', get_string('notes', 'mplayer'), array('canUseHtmlEditor'=>'detect','rows' => 10, 'cols' => 65, 'width' => 0,'height'=>0));
        $mform->setType('notes', PARAM_RAW);
=======
        // Notes.
        $elements[] = $mform->addElement('editor', 'notes_editor', get_string('notes', 'mplayer'), null, $this->descriptionoptions);
        $mform->setType('notes_editor', PARAM_RAW);
>>>>>>> MOODLE_33_STABLE

        // Width.
        $elements[] = $mform->addElement('text', 'width', get_string('width', 'mplayer'), $mplayerintarray);
        $mform->setType('width', PARAM_TEXT);
<<<<<<< HEAD
        $mform->addRule('width', get_string('required'), 'required', null, 'client');
        if (empty($CFG->mplayer_default_width)) {
            $CFG->mplayer_default_width = '100%';
        }
        $mform->setDefault('width', $CFG->mplayer_default_width);

        // height
        $mform->addElement('text', 'height', get_string('height', 'mplayer'), $mplayer_int_array);
        $mform->setType('height', PARAM_TEXT);
        $mform->addRule('height', get_string('required'), 'required', null, 'client');
        if (empty($CFG->mplayer_default_height)) {
            $CFG->mplayer_default_height = '570';
        }
        $mform->setDefault('height', $CFG->mplayer_default_height);

        // skin.
        $mform->addElement('select', 'skin', get_string('skin', 'mplayer'), mplayer_list_skins());
        if (!isset($CFG->mplayer_default_skin)) {
            $CFG->mplayer_default_skin = '';
        }
        $mform->setDefault('skin', $CFG->mplayer_default_skin);

        // image.
        $mform->addElement('filepicker', 'image', get_string('image', 'mplayer'), array('courseid' => $COURSE->id));

        // Icons.
        $mform->addElement('select', 'icons', get_string('icons', 'mplayer'), mplayer_list_truefalse());
        if (empty($CFG->mplayer_default_icons)) {
            $CFG->mplayer_default_icons = 'true';
        }
        $mform->setDefault('icons', $CFG->mplayer_default_icons);
        $mform->setAdvanced('icons');

        // Controlbar.
        $mform->addElement('select', 'controlbar', get_string('controlbar', 'mplayer'), mplayer_list_controlbar());
        if (empty($CFG->mplayer_default_controlbar)) {
            $CFG->mplayer_default_controlbar = 'bottom';
        }
        $mform->setDefault('controlbar', $CFG->mplayer_default_controlbar);
        $mform->setAdvanced('controlbar');
=======
        // Notes.
        $elements[] = $mform->addElement('editor', 'notes_editor', get_string('notes', 'mplayer'), null, $this->descriptionoptions);
        $mform->setType('notes_editor', PARAM_RAW);

        $mform = $this->_form;

        // Width.
        $elements[] = $mform->addElement('text', 'width', get_string('width', 'mplayer'), $mplayerintarray);
        $mform->setType('width', PARAM_TEXT);
=======
>>>>>>> MOODLE_33_STABLE
        // $mform->addRule('width', get_string('required'), 'required', null, 'client');

        if (empty($mform->getElementValue('width'))) {
            if (empty($config->default_width)) {
                set_config('default_width', '100%', 'mplayer');
                $config->default_width = '100%';
            }
            $mform->setDefault('width', $config->default_width);
        }

        // Height.
        $elements[] = $mform->addElement('text', 'height', get_string('height', 'mplayer'), $mplayerintarray);
        $mform->setType('height', PARAM_TEXT);
        // $mform->addRule('height', get_string('required'), 'required', null, 'client');
        if (empty($mform->getElementValue('height'))) {
            if (empty($CFG->default_height)) {
                $CFG->mplayer_default_height = 570;
                $config->default_height = 570;
            }
            $mform->setDefault('height', $config->default_height);
        }

        $elements[] = $mform->addElement('hidden', 'skin', '');
        $mform->setType('skin', PARAM_TEXT);

        // Icons.
        $elements[] = $mform->addElement('select', 'icons', get_string('icons', 'mplayer'), mplayer_list_truefalse());
        if (empty($config->default_icons)) {
            set_config('default_icons', 'true', 'mplayer');
            $config->default_icons = 'true';
        }
        $mform->setDefault('icons', $config->default_icons);
        $mform->setAdvanced('icons');

        // Controlbar.
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('select', 'controlbar', get_string('controlbar', 'mplayer'), mplayer_list_controlbar());
            if (empty($config->default_controlbar)) {
                set_config('default_controlbar', 'bottom', 'mplayer');
                $config->default_controlbar = 'bottom';
            }
            $mform->setDefault('controlbar', $config->default_controlbar);
            $mform->setAdvanced('controlbar');
        }
>>>>>>> MOODLE_32_STABLE

        // Backcolor.
        $elements[] = $mform->addElement('text', 'backcolor', get_string('backcolor', 'mplayer'), $mplayerintarray);
        $mform->setType('backcolor', PARAM_TEXT);
<<<<<<< HEAD
        if (!isset($CFG->mplayer_default_backcolor)) {
            $CFG->mplayer_default_backcolor = '';
        }
        $mform->setDefault('backcolor', $CFG->mplayer_default_backcolor);
=======
        if (!isset($config->default_backcolor)) {
            set_config('default_backcolor', '#000000', 'mplayer');
            $config->default_backcolor = '#000000';
        }
        $mform->setDefault('backcolor', $config->default_backcolor);
>>>>>>> MOODLE_32_STABLE
        $mform->setAdvanced('backcolor');

        // Frontcolor.
        $elements[] = $mform->addElement('text', 'frontcolor', get_string('frontcolor', 'mplayer'), $mplayerintarray);
        $mform->setType('frontcolor', PARAM_TEXT);
<<<<<<< HEAD
        if (!isset($CFG->mplayer_default_frontcolor)) {
            $CFG->mplayer_default_frontcolor = '';
        }
        $mform->setDefault('frontcolor', $CFG->mplayer_default_frontcolor);
=======
        if (!isset($config->default_frontcolor)) {
            set_config('default_frontcolor', '#dddddd', 'mplayer');
            $config->default_frontcolor = '#dddddd';
        }
        $mform->setDefault('frontcolor', $config->default_frontcolor);
>>>>>>> MOODLE_32_STABLE
        $mform->setAdvanced('frontcolor');

        // Lightcolor.
        $elements[] = $mform->addElement('text', 'lightcolor', get_string('lightcolor', 'mplayer'), $mplayerintarray);
        $mform->setType('lightcolor', PARAM_TEXT);
<<<<<<< HEAD
        if (!isset($CFG->mplayer_default_lightcolor)) {
            $CFG->mplayer_default_lightcolor = '';
        }
        $mform->setDefault('lightcolor', $CFG->mplayer_default_lightcolor);
        $mform->setAdvanced('lightcolor');

        // screencolor
        $mform->addElement('text', 'screencolor', get_string('screencolor', 'mplayer'), $mplayer_int_array);
        $mform->setType('screencolor', PARAM_TEXT);
        if (!isset($CFG->mplayer_default_screencolor)) {
            $CFG->mplayer_default_screencolor = '';
        }
        $mform->setDefault('screencolor', $CFG->mplayer_default_screencolor);
        $mform->setAdvanced('screencolor');

        // smoothing
=======
        if (!isset($config->default_lightcolor)) {
            set_config('default_lightcolor', '#ffffff', 'mplayer');
            $config->default_lightcolor = '#ffffff';
        }
        $mform->setDefault('lightcolor', $config->default_lightcolor);
        $mform->setAdvanced('lightcolor');

        // Screencolor.
        $elements[] = $mform->addElement('text', 'screencolor', get_string('screencolor', 'mplayer'), $mplayerintarray);
        $mform->setType('screencolor', PARAM_TEXT);
        if (!isset($config->default_screencolor)) {
            set_config('default_screencolor', '#80ff80', 'mplayer');
            $config->default_screencolor = '#80ff80';
        }
        $mform->setDefault('screencolor', $config->default_screencolor);
        $mform->setAdvanced('screencolor');

        // Smoothing.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
        $mform->addElement('select', 'smoothing', get_string('smoothing', 'mplayer'), mplayer_list_truefalse());
=======
        $elements[] = $mform->addElement('select', 'smoothing', get_string('smoothing', 'mplayer'), mplayer_list_truefalse());
>>>>>>> MOODLE_32_STABLE
        $mform->setDefault('smoothing', 'true');
        $mform->setAdvanced('smoothing');

<<<<<<< HEAD
        // quality
=======
        // Quality.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
        $mform->addElement('select', 'quality', get_string('quality', 'mplayer'), mplayer_list_quality());
=======
        $elements[] = $mform->addElement('select', 'quality', get_string('quality', 'mplayer'), mplayer_list_quality());
>>>>>>> MOODLE_32_STABLE
        $mform->setDefault('quality', 'best');
        $mform->setAdvanced('quality');

<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- BEHAVIOUR ---------------------------------------
=======
        // BEHAVIOUR ---------------------------------------.
>>>>>>> MOODLE_32_STABLE
=======
        // BEHAVIOUR.
>>>>>>> MOODLE_32_STABLE
=======
        $elements[] = $mform->addElement('select', 'smoothing', get_string('smoothing', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('smoothing', 'true');
        $mform->setAdvanced('smoothing');

        // Quality.
        $elements[] = $mform->addElement('select', 'quality', get_string('quality', 'mplayer'), mplayer_list_quality());
        $mform->setDefault('quality', 'best');
        $mform->setAdvanced('quality');

        // BEHAVIOUR.
>>>>>>> MOODLE_33_STABLE

        $elements[] = $mform->addElement('header', 'behaviour', get_string('behaviour', 'mplayer'));
        $mform->addHelpButton('behaviour', 'mplayer_behaviour', 'mplayer');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        // autostart 
        $mform->addElement('select', 'autostart', get_string('autostart', 'mplayer'), mplayer_list_truefalse());
        if (empty($CFG->mplayer_default_autostart)) {
            $CFG->mplayer_default_autostart = 'false';
        }
        $mform->setDefault('autostart', $CFG->mplayer_default_autostart);

        // fullscreen 
        $mform->addElement('select', 'fullscreen', get_string('fullscreen', 'mplayer'), mplayer_list_truefalse());
        if (empty($CFG->mplayer_default_fullscreen)) {
            $CFG->mplayer_default_fullscreen = 'true';
        }
        $mform->setDefault('fullscreen', $CFG->mplayer_default_fullscreen);

        // splashmode 
        if ($CFG->mplayer_default_player == 'jw') {
=======
        // Autostart. 
=======
        // Autostart.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
        $mform->addElement('select', 'autostart', get_string('autostart', 'mplayer'), mplayer_list_truefalse());
=======
        $elements[] = $mform->addElement('select', 'autostart', get_string('autostart', 'mplayer'), mplayer_list_truefalse());
>>>>>>> MOODLE_32_STABLE
=======
        // Autostart.
        $elements[] = $mform->addElement('select', 'autostart', get_string('autostart', 'mplayer'), mplayer_list_truefalse());
>>>>>>> MOODLE_33_STABLE
        if (empty($config->default_autostart)) {
            set_config('default_autostart', 'false', 'mplayer');
            $config->default_autostart = 'false';
        }
        $mform->setDefault('autostart', $config->default_autostart);
        $mform->disabledIf('autostart', 'splashmode', 'eq', 'is-splash');

        // Fullscreen.
        $elements[] = $mform->addElement('select', 'fullscreen', get_string('fullscreen', 'mplayer'), mplayer_list_truefalse());
        if (empty($config->default_fullscreen)) {
            set_config('default_fullscreen', 'true', 'mplayer');
            $config->default_fullscreen = 'true';
        }
        $mform->setDefault('fullscreen', $config->default_fullscreen);

        // Splashmode.
<<<<<<< HEAD
<<<<<<< HEAD
        if ($instance->technology == 'jw') {
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('hidden', 'splashmode');
            $mform->setType('splashmode', PARAM_TEXT);
        } else {
            $splashoptions = array('' => get_string('nosplash', 'mplayer'), 'is-splash' => get_string('splashenabled', 'mplayer'));
            $mform->addElement('select', 'splashmode', get_string('splashmode', 'mplayer'), $splashoptions);
<<<<<<< HEAD
            if (empty($CFG->mplayer_default_splashmode)) {
                set_config('mplayer_default_splashmode', 'is-splash');
            }
            $mform->setDefault('splashmode', $CFG->mplayer_default_splashmode);
            $mform->setAdvanced('splashmode');
        }

        // stretching 
        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('select', 'stretching', get_string('stretching', 'mplayer'), mplayer_list_stretching());
            if (empty($CFG->mplayer_default_stretching)) {
                $CFG->mplayer_default_stretching = 'uniform';
            }
            $mform->setDefault('stretching', $CFG->mplayer_default_stretching);
=======
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('hidden', 'splashmode');
            $mform->setType('splashmode', PARAM_TEXT);
        } else {
            $splashoptions = array('' => get_string('nosplash', 'mplayer'), 'is-splash' => get_string('splashenabled', 'mplayer'));
            $elements[] = $mform->addElement('select', 'splashmode', get_string('splashmode', 'mplayer'), $splashoptions);
>>>>>>> MOODLE_32_STABLE
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('hidden', 'splashmode');
            $mform->setType('splashmode', PARAM_TEXT);
        } else {
            $splashoptions = array('' => get_string('nosplash', 'mplayer'), 'is-splash' => get_string('splashenabled', 'mplayer'));
            $elements[] = $mform->addElement('select', 'splashmode', get_string('splashmode', 'mplayer'), $splashoptions);
>>>>>>> MOODLE_33_STABLE
            if (empty($config->default_splashmode)) {
                set_config('default_splashmode', 'is-splash', 'mplayer');
                $config->default_splashmode = 'is-splash';
            }
            $mform->setDefault('splashmode', $config->default_splashmode);
            $mform->setAdvanced('splashmode');
            $mform->disabledIf('splashmode', 'autostart', 'eq', 'true');
        }

        // Stretching.
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('select', 'stretching', get_string('stretching', 'mplayer'), mplayer_list_stretching());
            if (empty($config->default_stretching)) {
                set_config('default_stretching', 'uniform', 'mplayer');
                $config->default_stretching = 'uniform';
            }
            $mform->setDefault('stretching', $config->default_stretching);
>>>>>>> MOODLE_32_STABLE
            $mform->setAdvanced('stretching');
        } else {
            $elements[] = $mform->addElement('hidden', 'stretching');
            $mform->setType('stretching', PARAM_TEXT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
        // volume 
        $mform->addElement('select', 'volume', get_string('volume', 'mplayer'), mplayer_list_volume());
        if (empty($CFG->mplayer_default_volume)) {
            $CFG->mplayer_default_volume = '90';
        }
        $mform->setDefault('volume', $CFG->mplayer_default_volume);
        $mform->setAdvanced('volume');

        // mute 
=======
=======
>>>>>>> MOODLE_33_STABLE
        // Volume.
        $elements[] = $mform->addElement('select', 'volume', get_string('volume', 'mplayer'), mplayer_list_volume());
        if (empty($config->default_volume)) {
            set_config('default_volume', '90', 'mplayer');
            $config->default_volume = '90';
        }
        $mform->setDefault('volume', $config->default_volume);
        $mform->setAdvanced('volume');

        // Mute.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
        $mform->addElement('select', 'mute', get_string('mute', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('mute', 'false');
        $mform->setAdvanced('mute');

<<<<<<< HEAD
        if ($CFG->mplayer_default_player == 'jw') {
            // mplayerstart 
=======
        if ($instance->technology == 'jw') {
            // Mplayerstart.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'mplayerstart', get_string('mplayerstart', 'mplayer'), $mplayer_int_array);
=======
            $mform->addElement('text', 'mplayerstart', get_string('mplayerstart', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
        $elements[] = $mform->addElement('select', 'mute', get_string('mute', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('mute', 'false');
        $mform->setAdvanced('mute');

        if ($technology == 'jw') {
            // Mplayerstart.
            $elements[] = $mform->addElement('text', 'mplayerstart', get_string('mplayerstart', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
            $mform->setType('mplayerstart', PARAM_INT);
            $mform->setDefault('mplayerstart', '0');
            $mform->setAdvanced('mplayerstart');
<<<<<<< HEAD
    
            // bufferlength 
            $mform->addElement('select', 'bufferlength', get_string('bufferlength', 'mplayer'), mplayer_list_bufferlength());
            $mform->setDefault('bufferlength', '1');
            $mform->setAdvanced('bufferlength');
    
            // resizing - deprecated
            //$mform->addElement('select', 'resizing', get_string('resizing', 'mplayer'), mplayer_list_truefalse());
            //$mform->setAdvanced('resizing');
    
            // plugins 
=======

            // Bufferlength.
            $elements[] = $mform->addElement('select', 'bufferlength', get_string('bufferlength', 'mplayer'), mplayer_list_bufferlength());
            $mform->setDefault('bufferlength', '1');
            $mform->setAdvanced('bufferlength');

            // Plugins.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'plugins', get_string('plugins', 'mplayer'), $mplayer_url_array);
=======
            $mform->addElement('text', 'plugins', get_string('plugins', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'plugins', get_string('plugins', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
        $elements[] = $mform->addElement('select', 'mute', get_string('mute', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('mute', 'false');
        $mform->setAdvanced('mute');

        if ($technology == 'jw') {
            // Mplayerstart.
            $elements[] = $mform->addElement('text', 'mplayerstart', get_string('mplayerstart', 'mplayer'), $mplayerintarray);
            $mform->setType('mplayerstart', PARAM_INT);
            $mform->setDefault('mplayerstart', '0');
            $mform->setAdvanced('mplayerstart');

            // Bufferlength.
            $elements[] = $mform->addElement('select', 'bufferlength', get_string('bufferlength', 'mplayer'), mplayer_list_bufferlength());
            $mform->setDefault('bufferlength', '1');
            $mform->setAdvanced('bufferlength');

            // Plugins.
            $elements[] = $mform->addElement('text', 'plugins', get_string('plugins', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_33_STABLE
            $mform->setType('plugins', PARAM_TEXT);
            $mform->setDefault('plugins', '');
            $mform->setAdvanced('plugins');
        } else {
            $elements[] = $mform->addElement('hidden', 'mplayerstart');
            $mform->setType('mplayerstart', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'bufferlength');
            $mform->setType('bufferlength', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'plugins');
            $mform->setType('plugins', PARAM_TEXT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- metadata ---------------------------------------

        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('header', 'metadata', get_string('metadata', 'mplayer'));
            $mform->addHelpButton('metadata', 'mplayer_metadata', 'mplayer');
    
            // author
=======
        // Metadata ---------------------------------------.
=======
        // Metadata.
>>>>>>> MOODLE_32_STABLE

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'metadata', get_string('metadata', 'mplayer'));
            $mform->addHelpButton('metadata', 'mplayer_metadata', 'mplayer');

            // Author.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'author', get_string('author', 'mplayer'), $mplayer_url_array);
=======
            $mform->addElement('text', 'author', get_string('author', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'author', get_string('author', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
            $mform->setType('author', PARAM_TEXT);
            $mform->setDefault('author', fullname($USER));
            $mform->setAdvanced('author');
<<<<<<< HEAD
    
            // mplayerdate
=======

            // Mplayerdate.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'mplayerdate', get_string('mplayerdate', 'mplayer'), $mplayer_url_array);
=======
            $mform->addElement('text', 'mplayerdate', get_string('mplayerdate', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'mplayerdate', get_string('mplayerdate', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
            $mform->setType('mplayerdate', PARAM_TEXT);
            $mform->setDefault('mplayerdate', date('l jS \of F Y'));
            $mform->setAdvanced('mplayerdate');
<<<<<<< HEAD
    
            // title
            $mform->addElement('text', 'title', get_string('title', 'mplayer'), $mplayer_url_array);
=======
        // Metadata.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'metadata', get_string('metadata', 'mplayer'));
            $mform->addHelpButton('metadata', 'mplayer_metadata', 'mplayer');

            // Author.
            $elements[] = $mform->addElement('text', 'author', get_string('author', 'mplayer'), $mplayerurlarray);
            $mform->setType('author', PARAM_TEXT);
            $mform->setDefault('author', fullname($USER));
            $mform->setAdvanced('author');

            // Mplayerdate.
            $elements[] = $mform->addElement('text', 'mplayerdate', get_string('mplayerdate', 'mplayer'), $mplayerurlarray);
            $mform->setType('mplayerdate', PARAM_TEXT);
            $mform->setDefault('mplayerdate', date('l jS \of F Y'));
            $mform->setAdvanced('mplayerdate');

            // Title.
            $elements[] = $mform->addElement('text', 'title', get_string('title', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_33_STABLE
            $mform->setType('title', PARAM_CLEANHTML);
            $mform->setAdvanced('title');

            // Description.
            $elements[] = $mform->addElement('text', 'description', get_string('description', 'mplayer'), $mplayerurlarray);
            $mform->setType('description', PARAM_CLEANHTML);
            $mform->setAdvanced('description');
<<<<<<< HEAD
    
            // tags
            $mform->addElement('text', 'tags', get_string('tags', 'mplayer'), $mplayer_url_array);
            $mform->setType('tags', PARAM_CLEANHTML);
            $mform->setAdvanced('tags');
=======

            // Title.
            $elements[] = $mform->addElement('text', 'title', get_string('title', 'mplayer'), $mplayerurlarray);
            $mform->setType('title', PARAM_CLEANHTML);
            $mform->setAdvanced('title');

            // Description.
            $elements[] = $mform->addElement('text', 'description', get_string('description', 'mplayer'), $mplayerurlarray);
            $mform->setType('description', PARAM_CLEANHTML);
            $mform->setAdvanced('description');

>>>>>>> MOODLE_32_STABLE
=======

>>>>>>> MOODLE_33_STABLE
        } else {
            $elements[] = $mform->addElement('hidden', 'author');
            $mform->setType('author', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'date');
            $mform->setType('date', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'title');
            $mform->setType('title', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'description');
            $mform->setType('description', PARAM_CLEANHTML);
<<<<<<< HEAD
<<<<<<< HEAD
            $mform->addElement('hidden', 'tags');
            $mform->setType('tags', PARAM_TEXT);
=======

>>>>>>> MOODLE_33_STABLE
        }

        // AUDIODESCRIPTION.

<<<<<<< HEAD
        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('header', 'audiodescription', get_string('audiodescription', 'mplayer'));
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'audiodescription', get_string('audiodescription', 'mplayer'));
>>>>>>> MOODLE_33_STABLE
            $mform->addHelpButton('audiodescription', 'mplayer_audiodescription', 'mplayer');

            // Audiodescriptionfile.
            $options = array('courseid' => $COURSE->id);
            $label = get_string('audiodescriptionfile', 'mplayer');
            $elements[] = $mform->addElement('filepicker', 'audiodescriptionfile', $label, $options);
            $mform->setAdvanced('audiodescriptionfile');
<<<<<<< HEAD
    
            // audiodescriptionstate
=======

        }

        // AUDIODESCRIPTION.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'audiodescription', get_string('audiodescription', 'mplayer'));
            $mform->addHelpButton('audiodescription', 'mplayer_audiodescription', 'mplayer');

            // Audiodescriptionfile.
            $options = array('courseid' => $COURSE->id);
            $label = get_string('audiodescriptionfile', 'mplayer');
            $elements[] = $mform->addElement('filepicker', 'audiodescriptionfile', $label, $options);
            $mform->setAdvanced('audiodescriptionfile');

            // Audiodescriptionstate.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'audiodescriptionstate', get_string('audiodescriptionstate', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('audiodescriptionstate', 'true');
            $mform->setAdvanced('audiodescriptionstate');
    
<<<<<<< HEAD
            // audiodescriptionvolume
=======
            // Audiodescriptionvolume.
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'audiodescriptionvolume', get_string('audiodescriptionvolume', 'mplayer'), mplayer_list_volume());
=======
            $label = get_string('audiodescriptionstate', 'mplayer');
            $elements[] = $mform->addElement('select', 'audiodescriptionstate', $label, mplayer_list_truefalse());
            $mform->setDefault('audiodescriptionstate', 'true');
            $mform->setAdvanced('audiodescriptionstate');

            // Audiodescriptionvolume.
            $label = get_string('audiodescriptionvolume', 'mplayer');
<<<<<<< HEAD
            $mform->addElement('select', 'audiodescriptionvolume', $label, mplayer_list_volume());
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('select', 'audiodescriptionvolume', $label, mplayer_list_volume());
>>>>>>> MOODLE_32_STABLE
=======

            // Audiodescriptionstate.
            $label = get_string('audiodescriptionstate', 'mplayer');
            $elements[] = $mform->addElement('select', 'audiodescriptionstate', $label, mplayer_list_truefalse());
            $mform->setDefault('audiodescriptionstate', 'true');
            $mform->setAdvanced('audiodescriptionstate');

            // Audiodescriptionvolume.
            $label = get_string('audiodescriptionvolume', 'mplayer');
            $elements[] = $mform->addElement('select', 'audiodescriptionvolume', $label, mplayer_list_volume());
>>>>>>> MOODLE_33_STABLE
            $mform->setDefault('audiodescriptionvolume', '90');
            $mform->setAdvanced('audiodescriptionvolume');
        } else {
            $elements[] = $mform->addElement('hidden', 'audiodescriptionstate');
            $mform->setType('audiodescriptionstate', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'audiodescriptionvolume');
            $mform->setType('audiodescriptionvolume', PARAM_INT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- captions ---------------------------------------

        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('header', 'captions', get_string('captions', 'mplayer'));
=======
        // CAPTIONS.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'captions', get_string('captions', 'mplayer'));
>>>>>>> MOODLE_33_STABLE
            $mform->addHelpButton('captions', 'mplayer_captions', 'mplayer');

            // Captionsback.
            $elements[] = $mform->addElement('select', 'captionsback', get_string('captionsback', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('captionsback', 'true');
            $mform->setAdvanced('captionsback');

            // Captionsfile.
            $options = array('courseid' => $COURSE->id);
            $elements[] = $mform->addElement('filepicker', 'captionsfile', get_string('captionsfile', 'mplayer'), $options);
            $mform->setAdvanced('captionsfile');
<<<<<<< HEAD
    
            // captionsfontsize
=======
        // Captions ---------------------------------------.
=======
        // CAPTIONS.
>>>>>>> MOODLE_32_STABLE

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'captions', get_string('captions', 'mplayer'));
            $mform->addHelpButton('captions', 'mplayer_captions', 'mplayer');

            // Captionsback.
            $elements[] = $mform->addElement('select', 'captionsback', get_string('captionsback', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('captionsback', 'true');
            $mform->setAdvanced('captionsback');

            // Captionsfile.
            $options = array('courseid' => $COURSE->id);
            $elements[] = $mform->addElement('filepicker', 'captionsfile', get_string('captionsfile', 'mplayer'), $options);
            $mform->setAdvanced('captionsfile');

            // Captionsfontsize.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'captionsfontsize', get_string('captionsfontsize', 'mplayer'), $mplayer_int_array);
=======
            $mform->addElement('text', 'captionsfontsize', get_string('captionsfontsize', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'captionsfontsize', get_string('captionsfontsize', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
            $mform->setType('captionsfontsize', PARAM_INT);
            $mform->setDefault('captionsfontsize', '14');
            $mform->setAdvanced('captionsfontsize');
<<<<<<< HEAD
    
            // captionsstate
=======

            // Captionsstate.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'captionsstate', get_string('captionsstate', 'mplayer'), mplayer_list_truefalse());
=======
            $elements[] = $mform->addElement('select', 'captionsstate', get_string('captionsstate', 'mplayer'), mplayer_list_truefalse());
>>>>>>> MOODLE_32_STABLE
=======

            // Captionsfontsize.
            $elements[] = $mform->addElement('text', 'captionsfontsize', get_string('captionsfontsize', 'mplayer'), $mplayerintarray);
            $mform->setType('captionsfontsize', PARAM_INT);
            $mform->setDefault('captionsfontsize', '14');
            $mform->setAdvanced('captionsfontsize');

            // Captionsstate.
            $elements[] = $mform->addElement('select', 'captionsstate', get_string('captionsstate', 'mplayer'), mplayer_list_truefalse());
>>>>>>> MOODLE_33_STABLE
            $mform->setDefault('captionsstate', 'true');
            $mform->setAdvanced('captionsstate');
        } else {
            $elements[] = $mform->addElement('hidden', 'captionsback');
            $mform->setType('captionsback', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'captionsfontsize');
            $mform->setType('captionsfontsize', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'captionsstate');
            $mform->setType('captionsstate', PARAM_TEXT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- HD ---------------------------------------

        $mform->addElement('header', 'hd', get_string('hd', 'mplayer'));
        $mform->addHelpButton('hd', 'mplayer_hd', 'mplayer');

        // hdbitrate 
        $mform->addElement('text', 'hdbitrate', get_string('hdbitrate', 'mplayer'), $mplayer_int_array);
        $mform->setType('hdbitrate', PARAM_INT);
        $mform->setDefault('hdbitrate', '1500');
        $mform->setAdvanced('hdbitrate');

        // hdfile 
        $mform->addElement('filepicker', 'hdfile', get_string('hdfile', 'mplayer'), array('courseid'=>$COURSE->id));
        $mform->setAdvanced('hdfile');

        // hdfullscreen 
        $mform->addElement('select', 'hdfullscreen', get_string('hdfullscreen', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('hdfullscreen', 'true');
        $mform->setAdvanced('hdfullscreen');

        // hdstate 
        $mform->addElement('select', 'hdstate', get_string('hdstate', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('hdstate', 'true');
        $mform->setAdvanced('hdstate');

        //--------------------------------------- infobox ---------------------------------------

        $mform->addElement('header', 'infobox', get_string('infobox', 'mplayer'));
        $mform->addHelpButton('infobox', 'mplayer_infobox', 'mplayer');

        // infoboxcolor 
        $mform->addElement('text', 'infoboxcolor', get_string('infoboxcolor', 'mplayer'), $mplayer_int_array);
        $mform->setType('infoboxcolor', PARAM_TEXT);
        $mform->setDefault('infoboxcolor', 'ffffff');
        $mform->setAdvanced('infoboxcolor');

        // infoboxposition
        $mform->addElement('select', 'infoboxposition', get_string('infoboxposition', 'mplayer'), mplayer_list_infoboxposition());
        $mform->setDefault('infoboxposition', 'none');
        $mform->setAdvanced('infoboxposition');

        // infoboxsize
        $mform->addElement('text', 'infoboxsize', get_string('infoboxsize', 'mplayer'), $mplayer_int_array);
        $mform->setType('infoboxsize', PARAM_INT);
        $mform->setDefault('infoboxsize', '85');
        $mform->setAdvanced('infoboxsize');

        //--------------------------------------- livestream ---------------------------------------

        $mform->addElement('header', 'livestream', get_string('livestream', 'mplayer'));
        $mform->addHelpButton('livestream', 'mplayer_livestream', 'mplayer');

        // livestreamfile
        $mform->addElement('filepicker', 'livestreamfile', get_string('livestreamfile', 'mplayer'), array('courseid' => $COURSE->id));
        $mform->setAdvanced('livestreamfile');

        // livestreamimage 
        $mform->addElement('filepicker', 'livestreamimage', get_string('livestreamimage', 'mplayer'), array('courseid'=>$COURSE->id));
        $mform->setAdvanced('livestreamimage');

        // livestreaminterval
        $mform->addElement('text', 'livestreaminterval', get_string('livestreaminterval', 'mplayer'), $mplayer_int_array);
        $mform->setType('livestreaminterval', PARAM_INT);
        $mform->setDefault('livestreaminterval', '15');
        $mform->setAdvanced('livestreaminterval');

        // livestreammessage
        $mform->addElement('text', 'livestreammessage', get_string('livestreammessage', 'mplayer'), $mplayer_url_array);
        $mform->setType('livestreammessage', PARAM_CLEANHTML);
        $mform->setDefault('livestreammessage', 'Checking for livestream...');
        $mform->setAdvanced('livestreammessage');

        // livestreamstreamer
        $mform->addElement('select', 'livestreamstreamer', get_string('livestreamstreamer', 'mplayer'), mplayer_list_streamer());
        $mform->setDefault('livestreamstreamer', '');
        $mform->setAdvanced('livestreamstreamer');

        // livestreamtags
        $mform->addElement('text', 'livestreamtags', get_string('livestreamtags', 'mplayer'), $mplayer_url_array);
        $mform->setType('livestreamtags', PARAM_CLEANHTML);
        $mform->setAdvanced('livestreamtags');

        //--------------------------------------- logobox ---------------------------------------

        $mform->addElement('header', 'logobox', get_string('logobox', 'mplayer'));
        $mform->addHelpButton('logobox', 'mplayer_logobox', 'mplayer');

        // logoboxalign
        $mform->addElement('select', 'logoboxalign', get_string('logoboxalign', 'mplayer'), mplayer_list_logoboxalign());
        $mform->setDefault('logoboxalign', 'left');
        $mform->setAdvanced('logoboxalign');

        // logoboxfile 
        $mform->addElement('filepicker', 'logoboxfile', get_string('logoboxfile', 'mplayer'), array('courseid'=>$COURSE->id));
        $mform->setAdvanced('logoboxfile');

        // logoboxlink
        $mform->addElement('text', 'logoboxlink', get_string('logoboxlink', 'mplayer'), $mplayer_url_array);
        $mform->setType('logoboxlink', PARAM_URL);
        $mform->setAdvanced('logoboxlink');

        // logoboxmargin
        $mform->addElement('text', 'logoboxmargin', get_string('logoboxmargin', 'mplayer'), $mplayer_int_array);
        $mform->setType('logoboxmargin', PARAM_INT);
        $mform->setDefault('logoboxmargin', '15');
        $mform->setAdvanced('logoboxmargin');

        // logoboxposition
        $mform->addElement('select', 'logoboxposition', get_string('logoboxposition', 'mplayer'), mplayer_list_infoboxposition());
        $mform->setDefault('logoboxposition', 'top');
        $mform->setAdvanced('logoboxposition');

        //--------------------------------------- metaviewer ---------------------------------------
        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('header', 'metaviewer', get_string('metaviewer', 'mplayer'));
            $mform->addHelpButton('metaviewer', 'mplayer_metaviewer', 'mplayer');

            // metaviewerposition
=======
        // HD ---------------------------------------.
=======
        // HD.
>>>>>>> MOODLE_32_STABLE

=======
        // HD.

>>>>>>> MOODLE_33_STABLE
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'hd', get_string('hd', 'mplayer'));
            $mform->addHelpButton('hd', 'mplayer_hd', 'mplayer');

            // Hdbitrate.
            $elements[] = $mform->addElement('text', 'hdbitrate', get_string('hdbitrate', 'mplayer'), $mplayerintarray);
            $mform->setType('hdbitrate', PARAM_INT);
            $mform->setDefault('hdbitrate', '1500');
            $mform->setAdvanced('hdbitrate');

            // Hdfile.
            $options = array('courseid' => $COURSE->id);
            $elements[] = $mform->addElement('filepicker', 'hdfile', get_string('hdfile', 'mplayer'), $options);
            $mform->setAdvanced('hdfile');

            // Hdfullscreen.
            $elements[] = $mform->addElement('select', 'hdfullscreen', get_string('hdfullscreen', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('hdfullscreen', 'true');
            $mform->setAdvanced('hdfullscreen');

            // Hdstate.
            $elements[] = $mform->addElement('select', 'hdstate', get_string('hdstate', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('hdstate', 'true');
            $mform->setAdvanced('hdstate');
        } else {
            $elements[] = $mform->addElement('hidden', 'hdbitrate');
            $mform->setType('hdbitrate', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'hdfullscreen');
            $mform->setType('hdfullscreen', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'hdstate');
            $mform->setType('hdstate', PARAM_INT);
        }

        // INFOBOX.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'infobox', get_string('infobox', 'mplayer'));
            $mform->addHelpButton('infobox', 'mplayer_infobox', 'mplayer');

            // Infoboxcolor.
            $elements[] = $mform->addElement('text', 'infoboxcolor', get_string('infoboxcolor', 'mplayer'), $mplayerintarray);
            $mform->setType('infoboxcolor', PARAM_TEXT);
            $mform->setDefault('infoboxcolor', 'ffffff');
            $mform->setAdvanced('infoboxcolor');

            // Infoboxposition.
            $label = get_string('infoboxposition', 'mplayer');
            $elements[] = $mform->addElement('select', 'infoboxposition', $label, mplayer_list_infoboxposition());
            $mform->setDefault('infoboxposition', 'none');
            $mform->setAdvanced('infoboxposition');

            // Infoboxsize.
            $elements[] = $mform->addElement('text', 'infoboxsize', get_string('infoboxsize', 'mplayer'), $mplayerintarray);
            $mform->setType('infoboxsize', PARAM_INT);
            $mform->setDefault('infoboxsize', '85');
            $mform->setAdvanced('infoboxsize');
        } else {
            $elements[] = $mform->addElement('hidden', 'infoboxcolor');
            $mform->setType('infoboxcolor', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'infoboxposition');
            $mform->setType('infoboxposition', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'infoboxsize');
            $mform->setType('infoboxsize', PARAM_INT);
        }

        // LIVESTREAM.
<<<<<<< HEAD

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'livestream', get_string('livestream', 'mplayer'));
            // $mform->addHelpButton('livestream', 'mplayer_livestream', 'mplayer');

=======

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'livestream', get_string('livestream', 'mplayer'));
            // $mform->addHelpButton('livestream', 'mplayer_livestream', 'mplayer');

>>>>>>> MOODLE_33_STABLE
            // Livestreamfile.
            $options = array('courseid' => $COURSE->id);
            $elements[] = $mform->addElement('filepicker', 'livestreamfile', get_string('livestreamfile', 'mplayer'), $options);
            $mform->setAdvanced('livestreamfile');

            // Livestreamimage.
            $elements[] = $mform->addElement('filepicker', 'livestreamimagefile', get_string('livestreamimage', 'mplayer'), $options);
            $mform->setAdvanced('livestreamimagefile');

            // Livestreaminterval.
            $elements[] = $mform->addElement('text', 'livestreaminterval', get_string('livestreaminterval', 'mplayer'), $mplayerintarray);
            $mform->setType('livestreaminterval', PARAM_INT);
            $mform->setDefault('livestreaminterval', '15');
            $mform->setAdvanced('livestreaminterval');

            // Livestreammessage.
            $elements[] = $mform->addElement('text', 'livestreammessage', get_string('livestreammessage', 'mplayer'), $mplayerurlarray);
            $mform->setType('livestreammessage', PARAM_CLEANHTML);
            $mform->setDefault('livestreammessage', 'Checking for livestream...');
            $mform->setAdvanced('livestreammessage');

            // Livestreamstreamer.
            $label = get_string('livestreamstreamer', 'mplayer');
            $elements[] = $mform->addElement('select', 'livestreamstreamer', $label, mplayer_list_streamer());
            $mform->setDefault('livestreamstreamer', '');
            $mform->setAdvanced('livestreamstreamer');

            // Livestreamtags.
            $elements[] = $mform->addElement('text', 'livestreamtags', get_string('livestreamtags', 'mplayer'), $mplayerurlarray);
            $mform->setType('livestreamtags', PARAM_INT);
            $mform->setAdvanced('livestreamtags');
        } else {
            $elements[] = $mform->addElement('hidden', 'livestreaminterval');
            $mform->setType('livestreaminterval', PARAM_CLEANHTML);
            $elements[] = $mform->addElement('hidden', 'livestreammessage');
            $mform->setType('livestreammessage', PARAM_CLEANHTML);
            $elements[] = $mform->addElement('hidden', 'livestreamstreamer');
            $mform->setType('livestreamstreamer', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'livestreamtags');
            $mform->setType('livestreamtags', PARAM_CLEANHTML);
        }

        // LOGOBOX.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'logobox', get_string('logobox', 'mplayer'));
            $mform->addHelpButton('logobox', 'mplayer_logobox', 'mplayer');

            // Logoboxalign.
            $elements[] = $mform->addElement('select', 'logoboxalign', get_string('logoboxalign', 'mplayer'), mplayer_list_logoboxalign());
            $mform->setDefault('logoboxalign', 'left');
            $mform->setAdvanced('logoboxalign');

            // Logoboxfile.
            $options = array('courseid' => $COURSE->id);
            $elements[] = $mform->addElement('filepicker', 'logoboxfile', get_string('logoboxfile', 'mplayer'), $options);
            $mform->setAdvanced('logoboxfile');

            // Logoboxlink.
            $elements[] = $mform->addElement('text', 'logoboxlink', get_string('logoboxlink', 'mplayer'), $mplayerurlarray);
            $mform->setType('logoboxlink', PARAM_URL);
            $mform->setAdvanced('logoboxlink');

            // Logoboxmargin.
            $elements[] = $mform->addElement('text', 'logoboxmargin', get_string('logoboxmargin', 'mplayer'), $mplayerintarray);
            $mform->setType('logoboxmargin', PARAM_INT);
            $mform->setDefault('logoboxmargin', '15');
            $mform->setAdvanced('logoboxmargin');

            // Logoboxposition.
            $label = get_string('logoboxposition', 'mplayer');
            $elements[] = $mform->addElement('select', 'logoboxposition', $label, mplayer_list_infoboxposition());
            $mform->setDefault('logoboxposition', 'top');
            $mform->setAdvanced('logoboxposition');
        } else {
            $elements[] = $mform->addElement('hidden', 'logoboxalign');
            $mform->setType('logoboxalign', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'logoboxlink');
            $mform->setType('logoboxlink', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'logoboxmargin');
            $mform->setType('logoboxmargin', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'logoboxposition');
            $mform->setType('logoboxposition', PARAM_TEXT);
        }

        // Metaviewer ---------------------------------------.
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'metaviewer', get_string('metaviewer', 'mplayer'));
            $mform->addHelpButton('metaviewer', 'mplayer_metaviewer', 'mplayer');

            // Metaviewerposition.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'metaviewerposition', get_string('metaviewerposition', 'mplayer'), mplayer_list_metaviewerposition());
=======
            $label = get_string('metaviewerposition', 'mplayer');
<<<<<<< HEAD
            $mform->addElement('select', 'metaviewerposition', $label, mplayer_list_metaviewerposition());
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('select', 'metaviewerposition', $label, mplayer_list_metaviewerposition());
>>>>>>> MOODLE_32_STABLE
            $mform->setDefault('metaviewerposition', 'none');
            $mform->setAdvanced('metaviewerposition');

<<<<<<< HEAD
            // metaviewersize
=======
            // Metaviewersize.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'metaviewersize', get_string('metaviewersize', 'mplayer'), $mplayer_int_array);
=======
            $mform->addElement('text', 'metaviewersize', get_string('metaviewersize', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'metaviewersize', get_string('metaviewersize', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
            $label = get_string('metaviewerposition', 'mplayer');
            $elements[] = $mform->addElement('select', 'metaviewerposition', $label, mplayer_list_metaviewerposition());
            $mform->setDefault('metaviewerposition', 'none');
            $mform->setAdvanced('metaviewerposition');

            // Metaviewersize.
            $elements[] = $mform->addElement('text', 'metaviewersize', get_string('metaviewersize', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_33_STABLE
            $mform->setType('metaviewersize', PARAM_INT);
            $mform->setDefault('metaviewersize', '100');
            $mform->setAdvanced('metaviewersize');
        } else {
            $elements[] = $mform->addElement('hidden', 'metaviewerposition');
            $mform->setType('metaviewerposition', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'metaviewersize');
            $mform->setType('metaviewersize', PARAM_INT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- searchbar ---------------------------------------

        if ($CFG->mplayer_default_player == 'jw') {
=======
        // Searchbar ---------------------------------------.
=======
        // SEARCHBAR.
>>>>>>> MOODLE_32_STABLE

<<<<<<< HEAD
        if ($instance->technology == 'jw') {
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('header', 'searchbar', get_string('searchbar', 'mplayer'));
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'searchbar', get_string('searchbar', 'mplayer'));
>>>>>>> MOODLE_32_STABLE
            $mform->addHelpButton('searchbar', 'mplayer_searchbar', 'mplayer');
            $mform->setAdvanced('searchbar');

<<<<<<< HEAD
            // searchbarcolor 
=======
            // Searchbarcolor.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'searchbarcolor', get_string('searchbarcolor', 'mplayer'), $mplayer_int_array);
=======
            $mform->addElement('text', 'searchbarcolor', get_string('searchbarcolor', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'searchbarcolor', get_string('searchbarcolor', 'mplayer'), $mplayerintarray);
>>>>>>> MOODLE_32_STABLE
            $mform->setType('searchbarcolor', PARAM_TEXT);
            $mform->setDefault('searchbarcolor', 'CC0000');
            $mform->setAdvanced('searchbarcolor');
<<<<<<< HEAD
    
            // searchbarlabel 
=======

            // Searchbarlabel.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'searchbarlabel', get_string('searchbarlabel', 'mplayer'), $mplayer_url_array);
=======
            $mform->addElement('text', 'searchbarlabel', get_string('searchbarlabel', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'searchbarlabel', get_string('searchbarlabel', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
            $mform->setType('searchbarlabel', PARAM_TEXT);
            $mform->setDefault('searchbarlabel', 'Search');
            $mform->setAdvanced('searchbarlabel');
<<<<<<< HEAD
    
            // searchbarposition 
=======

            // Searchbarposition.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'searchbarposition', get_string('searchbarposition', 'mplayer'), mplayer_list_searchbarposition());
            $mform->setDefault('searchbarposition', '');
            $mform->setAdvanced('searchbarposition');
    
<<<<<<< HEAD
            // searchbarscript 
=======
            // Searchbarscript.
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'searchbarscript', get_string('searchbarscript', 'mplayer'), mplayer_list_searchbarscript());
=======
            $label = get_string('searchbarposition', 'mplayer');
            $elements[] = $mform->addElement('select', 'searchbarposition', $label, mplayer_list_searchbarposition());
            $mform->setDefault('searchbarposition', '');
            $mform->setAdvanced('searchbarposition');

            // Searchbarscript.
            $label = get_string('searchbarscript', 'mplayer');
<<<<<<< HEAD
            $mform->addElement('select', 'searchbarscript', $label, mplayer_list_searchbarscript());
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('select', 'searchbarscript', $label, mplayer_list_searchbarscript());
>>>>>>> MOODLE_32_STABLE
=======
        // SEARCHBAR.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'searchbar', get_string('searchbar', 'mplayer'));
            $mform->addHelpButton('searchbar', 'mplayer_searchbar', 'mplayer');
            $mform->setAdvanced('searchbar');

            // Searchbarcolor.
            $elements[] = $mform->addElement('text', 'searchbarcolor', get_string('searchbarcolor', 'mplayer'), $mplayerintarray);
            $mform->setType('searchbarcolor', PARAM_TEXT);
            $mform->setDefault('searchbarcolor', 'CC0000');
            $mform->setAdvanced('searchbarcolor');

            // Searchbarlabel.
            $elements[] = $mform->addElement('text', 'searchbarlabel', get_string('searchbarlabel', 'mplayer'), $mplayerurlarray);
            $mform->setType('searchbarlabel', PARAM_TEXT);
            $mform->setDefault('searchbarlabel', 'Search');
            $mform->setAdvanced('searchbarlabel');

            // Searchbarposition.
            $label = get_string('searchbarposition', 'mplayer');
            $elements[] = $mform->addElement('select', 'searchbarposition', $label, mplayer_list_searchbarposition());
            $mform->setDefault('searchbarposition', '');
            $mform->setAdvanced('searchbarposition');

            // Searchbarscript.
            $label = get_string('searchbarscript', 'mplayer');
            $elements[] = $mform->addElement('select', 'searchbarscript', $label, mplayer_list_searchbarscript());
>>>>>>> MOODLE_33_STABLE
            $mform->setDefault('searchbarscript', '');
            $mform->setAdvanced('searchbarscript');
        } else {
            $elements[] = $mform->addElement('hidden', 'searchbarcolor');
            $mform->setType('searchbarcolor', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'searchbarlabel');
            $mform->setType('searchbarlabel', PARAM_INT);
            $elements[] = $mform->addElement('hidden', 'searchbarposition');
            $mform->setType('searchbarposition', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'searchbarscript');
            $mform->setType('searchbarscript', PARAM_TEXT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- snapshot ---------------------------------------

        if ($CFG->mplayer_default_player == 'jw') {
            $mform->addElement('header', 'snapshot', get_string('snapshot', 'mplayer'));
            $mform->addHelpButton('snapshot', 'mplayer_snapshot', 'mplayer');

            // snapshotbitmap
=======
        // Snapshot ---------------------------------------.
=======
        // SNAPSHOT.
>>>>>>> MOODLE_32_STABLE

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'snapshot', get_string('snapshot', 'mplayer'));
            $mform->addHelpButton('snapshot', 'mplayer_snapshot', 'mplayer');

            // Snapshotbitmap.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'snapshotbitmap', get_string('snapshotbitmap', 'mplayer'), mplayer_list_truefalse());
=======
            $elements[] = $mform->addElement('select', 'snapshotbitmap', get_string('snapshotbitmap', 'mplayer'), mplayer_list_truefalse());
>>>>>>> MOODLE_32_STABLE
            $mform->setDefault('snapshotbitmap', 'true');
            $mform->setAdvanced('snapshotbitmap');
<<<<<<< HEAD
    
<<<<<<< HEAD
            // snapshotscript
=======
=======

>>>>>>> MOODLE_32_STABLE
            // Snapshotscript.
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('select', 'snapshotscript', get_string('snapshotscript', 'mplayer'), mplayer_list_snapshotscript());
=======
            $elements[] = $mform->addElement('select', 'snapshotscript', get_string('snapshotscript', 'mplayer'), mplayer_list_snapshotscript());
>>>>>>> MOODLE_32_STABLE
=======
        // SNAPSHOT.

        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'snapshot', get_string('snapshot', 'mplayer'));
            $mform->addHelpButton('snapshot', 'mplayer_snapshot', 'mplayer');

            // Snapshotbitmap.
            $elements[] = $mform->addElement('select', 'snapshotbitmap', get_string('snapshotbitmap', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('snapshotbitmap', 'true');
            $mform->setAdvanced('snapshotbitmap');

            // Snapshotscript.
            $elements[] = $mform->addElement('select', 'snapshotscript', get_string('snapshotscript', 'mplayer'), mplayer_list_snapshotscript());
>>>>>>> MOODLE_33_STABLE
            $mform->setDefault('snapshotscript', '');
            $mform->setAdvanced('snapshotscript');
        } else {
            $elements[] = $mform->addElement('hidden', 'snapshotbitmap');
            $mform->setType('snapshotbitmap', PARAM_BOOL);
            $elements[] = $mform->addElement('hidden', 'snapshotscript');
            $mform->setType('snapshotscript', PARAM_TEXT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //--------------------------------------- logo (licenced players only) ---------------------------------------

        $mform->addElement('header', 'logo', get_string('logo', 'mplayer'));
        $mform->addHelpButton('logo', 'mplayer_logo', 'mplayer');
        $mform->setAdvanced('logo');

        // logofile 
        $mform->addElement('filepicker', 'logofile', get_string('logofile', 'mplayer'), array('courseid'=>$COURSE->id));
        $mform->setAdvanced('logofile');

        // logolink 
        $mform->addElement('text', 'logolink', get_string('logolink', 'mplayer'), $mplayer_url_array);
        $mform->setType('logolink', PARAM_URL);
        $mform->setAdvanced('logolink');

        // logohide
        $mform->addElement('select', 'logohide', get_string('logohide', 'mplayer'), mplayer_list_truefalse());
        $mform->setDefault('logohide', 'true');
        $mform->setAdvanced('logohide');

        // logoposition
        $mform->addElement('select', 'logoposition', get_string('logoposition', 'mplayer'), mplayer_list_logoposition());
        $mform->setDefault('logoposition', 'bottom-left');
        $mform->setAdvanced('logoposition');

        //--------------------------------------- ADVANCED ---------------------------------------

        if ($CFG->mplayer_default_player == 'jw') {
=======
        // Logo (licenced players only) ---------------------------------------.
=======
        // JW LOGO (licenced players only).
>>>>>>> MOODLE_32_STABLE

=======
        // JW LOGO (licenced players only).

>>>>>>> MOODLE_33_STABLE
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'logo', get_string('logo', 'mplayer'));
            // $mform->addHelpButton('logo', 'mplayer_logo', 'mplayer');
            $mform->setAdvanced('logo');

            // Logofile.
            $options = array('courseid' => $COURSE->id);
            $elements[] = $mform->addElement('filepicker', 'logofile', get_string('logofile', 'mplayer'), $options);
            $mform->setAdvanced('logofile');

            // Logolink.
            $elements[] = $mform->addElement('text', 'logolink', get_string('logolink', 'mplayer'), $mplayerurlarray);
            $mform->setType('logolink', PARAM_URL);
            $mform->setAdvanced('logolink');

            // logohide.
            $elements[] = $mform->addElement('select', 'logohide', get_string('logohide', 'mplayer'), mplayer_list_truefalse());
            $mform->setDefault('logohide', 'true');
            $mform->setAdvanced('logohide');

            // Logoposition.
            $elements[] = $mform->addElement('select', 'logoposition', get_string('logoposition', 'mplayer'), mplayer_list_logoposition());
            $mform->setDefault('logoposition', 'bottom-left');
            $mform->setAdvanced('logoposition');
        } else {
            $elements[] = $mform->addElement('hidden', 'logolink');
            $mform->setType('logolink', PARAM_URL);
            $elements[] = $mform->addElement('hidden', 'logohide');
            $mform->setType('logohide', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'logoposition');
            $mform->setType('logoposition', PARAM_TEXT);
        }

        // ADVANCED.

<<<<<<< HEAD
<<<<<<< HEAD
        if ($instance->technology == 'jw') {
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('header', 'advanced', get_string('advanced', 'mplayer'));
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'advanced', get_string('advanced', 'mplayer'));
>>>>>>> MOODLE_32_STABLE
            $mform->addHelpButton('advanced', 'mplayer_advanced', 'mplayer');
            $mform->setAdvanced('advanced');
<<<<<<< HEAD
    
<<<<<<< HEAD
            // fpversion
            $mform->addElement('text', 'fpversion', get_string('fpversion', 'mplayer'), array('size'=>'9'));
            $mform->setType('fpversion', PARAM_TEXT);
            $mform->setDefault('fpversion', '9.0.115');
            $mform->addRule('fpversion', get_string('required'), 'required', null, 'client');
            $mform->setAdvanced('fpversion');
    
            // tracecall
=======
=======

>>>>>>> MOODLE_32_STABLE
            // Fpversion.
            $elements[] = $mform->addElement('text', 'fpversion', get_string('fpversion', 'mplayer'), array('size' => '9'));
            $mform->setType('fpversion', PARAM_TEXT);
            $mform->setDefault('fpversion', '9.0.115');
            $mform->setAdvanced('fpversion');

            // Tracecall.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> MOODLE_32_STABLE
            $mform->addElement('text', 'tracecall', get_string('tracecall', 'mplayer'), $mplayer_url_array);
=======
            $mform->addElement('text', 'tracecall', get_string('tracecall', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
            $elements[] = $mform->addElement('text', 'tracecall', get_string('tracecall', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_32_STABLE
=======
        if ($technology == 'jw') {
            $elements[] = $mform->addElement('header', 'advanced', get_string('advanced', 'mplayer'));
            $mform->addHelpButton('advanced', 'mplayer_advanced', 'mplayer');
            $mform->setAdvanced('advanced');

            // Fpversion.
            $elements[] = $mform->addElement('text', 'fpversion', get_string('fpversion', 'mplayer'), array('size' => '9'));
            $mform->setType('fpversion', PARAM_TEXT);
            $mform->setDefault('fpversion', '9.0.115');
            $mform->setAdvanced('fpversion');

            // Tracecall.
            $elements[] = $mform->addElement('text', 'tracecall', get_string('tracecall', 'mplayer'), $mplayerurlarray);
>>>>>>> MOODLE_33_STABLE
            $mform->setType('tracecall', PARAM_TEXT);
            $mform->setAdvanced('tracecall');
        } else {
            $elements[] = $mform->addElement('hidden', 'fpversion');
            $mform->setType('fpversion', PARAM_TEXT);
            $elements[] = $mform->addElement('hidden', 'tracecall');
            $mform->setType('tracecall', PARAM_TEXT);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        //-------------------------------------------------------------------------------
        // add standard elements, common to all modules
        $this->standard_coursemodule_elements();

        //-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
        $this->add_action_buttons();
    }
    
    public function set_data($data) {

        if ($data->coursemodule) {
            $context = context_module::instance($data->coursemodule);

            $maxbytes = -1;

            // Saves draft customization image files into definitive filearea.
            $instancefiles = array('mplayerfile', 'playlistfile', 'playlistthumb', 'configxml', 'image', 'audiodescriptionfile', 'captionsfile', 'hdfile', 'livestreamfile', 'livestreamimage', 'logoboxfile', 'logofile');
            foreach($instancefiles as $if){
                $draftitemid = file_get_submitted_draft_itemid($if);
                $maxfiles = ($if == 'mplayerfile') ? -1 : 1;
                file_prepare_draft_area($draftitemid, $context->id, 'mod_mplayer', $if, 0, array('subdirs' => 0, 'maxbytes' => $maxbytes, 'maxfiles' => $maxfiles));
                if ($if == 'playlistfile') {
                    $data->playlistgroup['playlistfile'] = $draftitemid;
                } elseif($if == 'configxml') {
                    $data->configxmlgroup['configxml'] = $draftitemid;
                } else {
                    $data->$if = $draftitemid;
                }
            }
        }
        parent::set_data($data);
=======
        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }

    public function set_data($defaults) {

        if ($defaults->coursemodule) {
            // This is when updating.
            $context = context_module::instance($defaults->coursemodule);

            $fs = get_file_storage();
            if ($fs->is_area_empty($context->id, 'mod_mplayer', 'mplayerfiles', 0)) {
                $cm = new StdClass();
                $cm->id = $defaults->coursemodule;
                mplayer_init_storage($cm);
            }

            $defaults = file_prepare_standard_editor($defaults, 'notes', $this->descriptionoptions, $context, 'mod_techproject',
                                                     'notes', $defaults->id);

            // Saves draft customization image files into definitive filearea.
            $instancefiles = array('mplayerfiles', 'playlistfiles', 'configxml', 'audiodescriptionfile', 'captionsfile',
                                   'hdfile', 'livestreamfile', 'livestreamimage', 'logoboxfile', 'logofile');
            foreach ($instancefiles as $if) {
                $draftitemid = file_get_submitted_draft_itemid($if);
                $maxfiles = ($if == 'mplayerfiles') ? -1 : 1;
                $subdirs = ($if == 'mplayerfiles') ? true : false;
                file_prepare_draft_area($draftitemid, $context->id, 'mod_mplayer', $if, 0, $this->descriptionoptions);
                if ($if == 'configxml') {
                    $defaults->configxmlgroup['configxml'] = $draftitemid;
                } else {
                    $defaults->$if = $draftitemid;
                }
            }
        }

        parent::set_data($defaults);
    }

    public function definition_after_data() {
        parent::definition_after_data();
        $mform = $this->_form;

        $mplayerfiles =& $mform->getElement('mplayerfiles');
        $value = $mplayerfiles->getValue();
        if (empty($value)) {
            // This is when creating new.
            $draftitemid = file_get_unused_draft_itemid();
            mplayer_init_storage(null, $draftitemid);
            $value = $mplayerfiles->setValue($draftitemid);
        }
    }

    /**
     * Custom validation
     *
     * @param array $data
     * @param array $files
     * @return array
     */
    public function validation($data, $files) {
        $draftitemid = file_get_submitted_draft_itemid('mplayerfiles');
        $voiddata = file_get_drafarea_files($draftitemid);

        $errors = parent::validation($data, $files);

        return $errors;
    }

    public function add_completion_rules() {
        $mform =& $this->_form;

        $label = get_string('mediaviewed', 'mplayer');
        $mform->addElement('checkbox', 'completionmediaviewed', $label, get_string('completionmediaviewed', 'mplayer'));

        return array('completionmediaviewed');
    }

    public function completion_rule_enabled($data) {
        return(!empty($data['completionmediaviewed']));
>>>>>>> MOODLE_32_STABLE
=======
        return $elements;
>>>>>>> MOODLE_32_STABLE
=======
        return $elements;
>>>>>>> MOODLE_33_STABLE
    }
}
