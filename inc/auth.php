<?php
class UserAuth
{
    
    public function isAuthenticated() {
        global $session;
        return $session->get('auth_logged_in', false);
    }

    public function requireAuth() {
        if(!$this->isAuthenticated()) {
            global $session;

            $session->getFlashBag()->add('error', 'Not Authorized');
            redirect('login.php');
        }
    }

    public function isAdmin() {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $session->get('auth_roles') === 1;
    }

    public function isBoxer() {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $session->get('auth_roles') === 2;
    }
    
    public function isUser() {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $session->get('auth_roles') === 3;
    }

    public function isAgent() {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $session->get('auth_roles') === 4;
    }

    public function isManager() {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $session->get('auth_roles') === 5;
    }

    public function isRole($roleId) {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $roleId == $session->get('auth_roles');
    }

    public function requireAdmin() {
        if(!$this->isAdmin()) {
            global $session;
            $session->getFlashBag()->add('error', 'Not Authorized');
            redirect('login.php');
        }
    }

    public function isOwner($ownerId) {
        if(!$this->isAuthenticated()) {
            return false;
        }

        global $session;
        return $ownerId == $session->get('auth_user_id');
    }

    public function saveUserSession($user) {
        global $session;

        $session->set('auth_logged_in', true);
        $session->set('auth_user_id', $user[0]['userid']);
        $session->set('auth_roles', (int) $user[0]['role_id']);
        if(isset($user[0]['email']) && !empty($user[0]['email'])) {
            $session->set('auth_email', $user[0]['email']);
        } else if(isset($user[0]['mobile']) && !empty($user[0]['mobile'])) {
            $session->set('auth_mobile', $user[0]['mobile']);
        }  
    }
}
?>