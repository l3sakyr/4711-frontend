<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct() {
        parent::__construct();
        $this->load->library('session');

        //  Set basic view parameters
        $this->data = array();
        $this->data['pagetitle'] = 'Aromatherapy Store';
        $this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '';
        $this->data['userrole'] = $this->session->userdata('userrole');
        if ($this->data['userrole'] == NULL){
            $this->data['userrole'] = 'guest';
        }
        
        $this->data['menudata'] = $this->config->item('menudata');
    }

    /**
     * Render this page
     */
    function render($template = 'template') {
        $this->data['navbar'] = $this->parser->parse('navbar', $this->data, true);
        if (!isset($this->data['content'])) {
            $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        }


        // integrate any needed CSS framework & components
        $this->data['caboose_styles'] = $this->caboose->styles();
        $this->data['caboose_scripts'] = $this->caboose->scripts();
        $this->data['caboose_trailings'] = $this->caboose->trailings();

        $this->parser->parse($template, $this->data);
    }

}
