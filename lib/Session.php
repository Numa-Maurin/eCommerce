<?php

class Session {
	// effectuer des opérations pour l’utilisateur
	// dont le login concorde avec celui stocké en session
    public static function is_user($login) {
        return (!empty($_SESSION['loginUtilisateur']) && ($_SESSION['loginUtilisateur'] === $login));
    }

    // identifier un utilisateur de type admin
    public static function is_admin() {
        return (!empty($_SESSION['admin']) && $_SESSION['admin']);
    }
}

?>