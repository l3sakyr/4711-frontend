<?php

/**
 * Description of Toggle
 * @author Theresa
 */
class Toggle extends Application {

    /**
     * Index
     */
    public function index() {
        $this->load->helper('form');
        $this->load->helper('url');

        $origin = $_SERVER['HTTP_REFERER'];
        $role = $this->session->userdata('userrole');
        if ($role == 'user') {
            $role = 'admin';
        } else if ($role == 'guest') {
            $role = 'user';
        } else if ($role == 'admin') {
            $role = 'guest';
        }
        $this->session->set_userdata('userrole', $role);
        redirect($origin);
    }

}
