<?php 
class User
{
    
    public function getUser($email = null) 
    { 
        global $db;
        $json = array();
        
        try {
            $query = "SELECT users.*, user_role.role_id FROM users  
            INNER JOIN user_role ON users.userid = user_role.user_id ";
            if(isset($email)) {
                $query .= "WHERE users.email = :email";
            }
            $query .= " ORDER BY users.created_at DESC LIMIT 5";
            $stmt = $db->prepare($query);
            if ($stmt === false) {
                die ("Mysql Error: " . $db->error);
            }
            if(isset($email)) {
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            }
            $stmt->execute();
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllUser($email = null) 
    { 
        global $db;
        $json = array();
        
        try {
            $query = "SELECT users.*, user_role.role_id FROM users  
            INNER JOIN user_role ON users.userid = user_role.user_id ";
            if(isset($email)) {
                $query .= "WHERE users.email = :email";
            }
            $query .= " ORDER BY users.created_at DESC";
            $stmt = $db->prepare($query);
            if ($stmt === false) {
                die ("Mysql Error: " . $db->error);
            }
            if(isset($email)) {
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            }
            $stmt->execute();
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getUserType($userId = null) 
    {
        global $db;
        $json = array();

        try {
            $query = "SELECT user_type.role_id, user_type.role FROM user_type ";
            if(isset($userId)) {
                $query .= "INNER JOIN user_role ON user_type.role_id = user_role.role_id
                WHERE user_role.user_id = :userid";
            }
            $stmt = $db->prepare($query);
            if(isset($userId)) {
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function findUserByEmail($email)
    {
        global $db;
        $json = array();

        try {
            $query = "SELECT users.*, user_role.role_id FROM users  INNER JOIN user_role ON users.userid = user_role.user_id WHERE users.email = :email";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
            //return $stmt->fetch();

        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function findUserByMobile($mobile)
    {
        global $db;
        $json = array();

        try {
            $query = "SELECT users.*, user_role.role_id FROM users  INNER JOIN user_role ON users.userid = user_role.user_id WHERE users.mobile = :mobile";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
            //return $stmt->fetch();

        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function findUserById($userId)
    {
        global $db;
        $json = array();

        try {
            $query = "SELECT users.*, user_role.role_id FROM users  INNER JOIN user_role ON users.userid = user_role.user_id WHERE users.userid = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
            //return $stmt->fetch();

        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function selectLimitedBoxers() 
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT users.* FROM users 
            INNER JOIN user_role ON (users.userid = user_role.user_id) 
            WHERE user_role.role_id = :roleid ORDER BY users.id DESC LIMIT 4";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':roleid', '2');
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function selectBoxers() 
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT users.* FROM users 
            INNER JOIN user_role ON (users.userid = user_role.user_id) 
            WHERE user_role.role_id = :roleid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':roleid', '2');
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createUniqueId()
    {
        $unique = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 7)), 0, 7);
        return $unique;
    }
    
    public function createUserEmail($email, $userId, $hashed)
    {
        global $db;

        try {
            $query1 = "INSERT INTO users (userid, email, password, terms, created_at) VALUES (:userid, :email, :password, :tc, now())";
            $query2 = "INSERT INTO user_role (user_id, role_id) VALUES (:userid, :roleid)";

            $stmt1 = $db->prepare($query1);
            $stmt2 = $db->prepare($query2);

            $stmt1->bindParam(':userid', $userId);
            $stmt1->bindParam(':email', $email);
            $stmt1->bindParam(':password', $hashed);
            $stmt1->bindValue(':tc', 'Y');
            if($stmt1->execute()) {
                $stmt2->bindParam(':userid', $userId, PDO::PARAM_STR);
                $stmt2->bindValue(':roleid', 3, PDO::PARAM_INT);
                if($stmt2->execute()) {
                    return $this->findUserByEmail($email); 
                }    
            } 
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createUserMobile($mobile, $userId, $hashed)
    {
        global $db;

        try {
            $query1 = "INSERT INTO users (userid, mobile, password, terms, created_at) VALUES (:userid, :mobile, :password, :tc, now())";
            $query2 = "INSERT INTO user_role (user_id, role_id) VALUES (:userid, :roleid)";

            $stmt1 = $db->prepare($query1);
            $stmt2 = $db->prepare($query2);

            $stmt1->bindParam(':userid', $userId);
            $stmt1->bindParam(':mobile', $mobile);
            $stmt1->bindParam(':password', $hashed);
            $stmt1->bindValue(':tc', 'Y');
            if($stmt1->execute()) {
                $stmt2->bindParam(':userid', $userId, PDO::PARAM_STR);
                $stmt2->bindValue(':roleid', 3, PDO::PARAM_INT);
                if($stmt2->execute()) {
                    return $this->findUserByMobile($mobile); 
                }    
            } 
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createBoxerMobile($mobile, $fname, $lname, $alias, $aboutme, $weight, $height, $stance, $clubName, $coach, $state, $nation, $age, $sex, $userId, $hashed)
    {
        global $db;
        
        try {
            $query1 = "INSERT INTO users (userid, fname, lname, alias, aboutme, mobile, password, weight, height, stance, club_name, coach, state, nationality, age, sex, terms, created_at) VALUES (:userid, :fname, :lname, :alias, :aboutme, :mobile, :password, :weight, :height, :stance, :club_name, :coach, :state, :nation, :age, :sex, :terms, now())";
            $query2 = "INSERT INTO user_role (user_id, role_id) VALUES (:userid, :roleid)";

            $stmt1 = $db->prepare($query1);
            $stmt2 = $db->prepare($query2); 

            $stmt1->bindParam(':userid', $userId);
            $stmt1->bindParam(':fname', $fname);
            $stmt1->bindParam(':lname', $lname);
            $stmt1->bindParam(':alias', $alias);
            $stmt1->bindParam(':aboutme', $aboutme);
            $stmt1->bindParam(':mobile', $mobile);
            $stmt1->bindParam(':password', $hashed);
            $stmt1->bindParam(':weight', $weight);
            $stmt1->bindParam(':height', $height);
            $stmt1->bindParam(':stance', $stance);
            $stmt1->bindParam(':club_name', $clubName);
            $stmt1->bindParam(':coach', $coach);
            $stmt1->bindParam(':state', $state);
            $stmt1->bindParam(':nation', $nation);
            $stmt1->bindParam(':age', $age);
            $stmt1->bindParam(':sex', $sex);
            $stmt1->bindValue(':terms', 'Y');
            if($stmt1->execute()) {
                $stmt2->bindParam(':userid', $userId, PDO::PARAM_STR);
                $stmt2->bindValue(':roleid', 2, PDO::PARAM_INT);
                if($stmt2->execute()) {
                    return $this->findUserByMobile($mobile);
                }    
            } 
        } catch (\Exception $e) {
            throw $e;
        }  
    }
    
    public function createBoxerEmail($email, $fname, $lname, $alias, $aboutme, $weight, $height, $stance, $clubName, $coach, $state, $nation, $age, $sex, $userId, $hashed)
    {
        global $db;
        
        try {
            $query1 = "INSERT INTO users (userid, fname, lname, alias, aboutme, email, password, weight, height, stance, club_name, coach, state, nationality, age, sex, terms, created_at) VALUES (:userid, :fname, :lname, :alias, :aboutme, :email, :password, :weight, :height, :stance, :club_name, :coach, :state, :nation, :age, :sex, :terms, now())";
            $query2 = "INSERT INTO user_role (user_id, role_id) VALUES (:userid, :roleid)";

            $stmt1 = $db->prepare($query1);
            $stmt2 = $db->prepare($query2);

            $stmt1->bindParam(':userid', $userId);
            $stmt1->bindParam(':fname', $fname);
            $stmt1->bindParam(':lname', $lname);
            $stmt1->bindParam(':alias', $alias);
            $stmt1->bindParam(':aboutme', $aboutme);
            $stmt1->bindParam(':email', $email);
            $stmt1->bindParam(':password', $hashed);
            $stmt1->bindParam(':weight', $weight);
            $stmt1->bindParam(':height', $height);
            $stmt1->bindParam(':stance', $stance);
            $stmt1->bindParam(':club_name', $clubName);
            $stmt1->bindParam(':coach', $coach);
            $stmt1->bindParam(':state', $state);
            $stmt1->bindParam(':nation', $nation);
            $stmt1->bindParam(':age', $age);
            $stmt1->bindParam(':sex', $sex);
            $stmt1->bindValue(':terms', 'Y');
            if($stmt1->execute()) {
                $stmt2->bindParam(':userid', $userId, PDO::PARAM_STR);
                $stmt2->bindValue(':roleid', 2, PDO::PARAM_INT);
                if($stmt2->execute()) {
                    return $this->findUserByEmail($email);
                }    
            } 
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateBoxerInfo($fname, $lname, $alias, $aboutme, $weight, $height, $stance, $clubName, $coach, $state, $nation, $age, $sex, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE users SET fname = :fname, lname = :lname, alias = :alias, aboutme = :aboutme, weight = :weight, height = :height, stance = :stance, club_name = :clubname, coach = :coach, state = :state, nationality = :nation, age = :age, sex = :sex WHERE userid = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':alias', $alias);
            $stmt->bindParam(':aboutme', $aboutme);
            $stmt->bindParam(':weight', $weight);
            $stmt->bindParam(':height', $height);
            $stmt->bindParam(':stance', $stance);
            $stmt->bindParam(':clubname', $clubName);
            $stmt->bindParam(':coach', $coach);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':nation', $nation);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':sex', $sex);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateImageUrl($userId, $db_file_url)
    {
        global $db;
        
        try {
            $query = "UPDATE users SET img_url = :imgurl WHERE userid = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':imgurl', $db_file_url);
            $stmt->bindParam(':userid', $userId);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateUserInfo($fname, $lname, $mymobile = null, $myemail = null, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE users SET fname = :fname, lname = :lname, ";
            if(isset($myemail)) {
                $query .= "myemail = :myemail ";
            }
            if(isset($mymobile)) {
                $query .= "mymobile = :mymobile ";
            }
            $query .= "WHERE userid = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            if(isset($myemail)) {
               $stmt->bindParam(':myemail', $myemail); 
            }
            if(isset($mymobile)) {
                $stmt->bindParam(':mymobile', $mymobile); 
            }
            $stmt->bindParam(':userid', $userId); 
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function subscription($email)
    {
        global $db;
        
        try {
            $query = "INSERT INTO newsletter (email, created_at) VALUES (:email, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function saveMessages($msg, $name, $email, $subject)
    {
        global $db;
        
        try {
            $query = "INSERT INTO messages (name, email, subject, message, created_at) VALUES (:name, :email, :subject, :message, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindParam(':message', $msg, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
?>