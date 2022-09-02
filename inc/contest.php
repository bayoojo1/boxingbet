<?php
class Contest
{
    public function stake($userId, $contestId, $possibility, $odd, $amount, $stakeType)
    {
        global $db;
        
        try {
            $query = "INSERT INTO stakes (userid, contestid, possibility, odd, stake, stake_type, created_at) VALUES (:userid, :contestid, :possibility, :odd, :stake, :stake_type, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->bindParam(':possibility', $possibility, PDO::PARAM_STR);
            $stmt->bindParam(':odd', $odd, PDO::PARAM_STR);
            $stmt->bindParam(':stake', $amount, PDO::PARAM_STR);
            $stmt->bindParam(':stake_type', $stakeType, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getLimitedStake($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM stakes WHERE status = 'P'";
            if(isset($userId)) {
                $query .= " AND userid = :userid";
            }
            $query .= " ORDER BY created_at DESC LIMIT 3";
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getStake($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM stakes WHERE status = 'P'";
            if(isset($userId)) {
                $query .= " AND userid = :userid";
            }
            
            $query .= " ORDER BY created_at DESC";
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createNewContest($contestId, $contesterA, $contesterB, $a_wins, $b_wins, $a_wins_tko, $b_wins_tko, $a_wins_split, $b_wins_split, $a_wins_unanimous, $b_wins_unanimous, $draw, $a_r1_tko, $b_r1_tko, $a_r2_tko, $b_r2_tko, $a_r3_tko, $b_r3_tko, $a_r4_tko, $b_r4_tko, $a_r5_tko, $b_r5_tko, $a_r6_tko, $b_r6_tko, $a_r7_tko, $b_r7_tko, $a_r8_tko, $b_r8_tko, $a_r9_tko, $b_r9_tko, $a_r10_tko, $b_r10_tko, $a_r11_tko, $b_r11_tko, $a_r12_tko, $b_r12_tko, $event_date, $event_location)
    {
        global $db;
        
        // Insert this contest into the win table
        $this->createWin($contestId, $contesterA, $contesterB);
        
        try {
            $stmt = $db->prepare("INSERT INTO contest (contestid, contester_a, contester_b, a_wins_odd, b_wins_odd, a_wins_tko_odd, b_wins_tko_odd, a_wins_split_odd, b_wins_split_odd, a_wins_unanimous_odd, b_wins_unanimous_odd, draw_odd, a_r1_tko_odd, b_r1_tko_odd, a_r2_tko_odd, b_r2_tko_odd, a_r3_tko_odd, b_r3_tko_odd, a_r4_tko_odd, b_r4_tko_odd, a_r5_tko_odd, b_r5_tko_odd, a_r6_tko_odd, b_r6_tko_odd, a_r7_tko_odd, b_r7_tko_odd, a_r8_tko_odd, b_r8_tko_odd, a_r9_tko_odd, b_r9_tko_odd, a_r10_tko_odd, b_r10_tko_odd, a_r11_tko_odd, b_r11_tko_odd, a_r12_tko_odd, b_r12_tko_odd, event_date, event_location, created_at)
            VALUES(:contestid, :contester_a, :contester_b, :a_wins_odd, :b_wins_odd, :a_wins_tko_odd, :b_wins_tko_odd, :a_wins_split_odd, :b_wins_split_odd, :a_wins_unanimous_odd, :b_wins_unanimous_odd, :draw_odd, :a_r1_tko_odd, :b_r1_tko_odd, :a_r2_tko_odd, :b_r2_tko_odd, :a_r3_tko_odd, :b_r3_tko_odd, :a_r4_tko_odd, :b_r4_tko_odd, :a_r5_tko_odd, :b_r5_tko_odd, :a_r6_tko_odd, :b_r6_tko_odd, :a_r7_tko_odd, :b_r7_tko_odd, :a_r8_tko_odd, :b_r8_tko_odd, :a_r9_tko_odd, :b_r9_tko_odd, :a_r10_tko_odd, :b_r10_tko_odd, :a_r11_tko_odd, :b_r11_tko_odd, :a_r12_tko_odd, :b_r12_tko_odd, :event_date, :event_location, now())");
            if($stmt->execute(array(':contestid' => $contestId, ':contester_a' => $contesterA, ':contester_b' => $contesterB, ':a_wins_odd' => $a_wins, ':b_wins_odd' => $b_wins, ':a_wins_tko_odd' => $a_wins_tko, ':b_wins_tko_odd' => $b_wins_tko, ':a_wins_split_odd' => $a_wins_split, ':b_wins_split_odd' => $b_wins_split, ':a_wins_unanimous_odd' => $a_wins_unanimous, ':b_wins_unanimous_odd' => $b_wins_unanimous, ':draw_odd' => $draw, ':a_r1_tko_odd' => $a_r1_tko, ':b_r1_tko_odd' => $b_r1_tko, ':a_r2_tko_odd' => $a_r2_tko, ':b_r2_tko_odd' => $b_r2_tko, ':a_r3_tko_odd' => $a_r3_tko, ':b_r3_tko_odd' => $b_r3_tko, ':a_r4_tko_odd' => $a_r4_tko, ':b_r4_tko_odd' => $b_r4_tko, ':a_r5_tko_odd' => $a_r5_tko, ':b_r5_tko_odd' => $b_r5_tko, ':a_r6_tko_odd' => $a_r6_tko, ':b_r6_tko_odd' => $b_r6_tko, ':a_r7_tko_odd' => $a_r7_tko, ':b_r7_tko_odd' => $b_r7_tko, ':a_r8_tko_odd' => $a_r8_tko, ':b_r8_tko_odd' => $b_r8_tko, ':a_r9_tko_odd' => $a_r9_tko, ':b_r9_tko_odd' => $b_r9_tko, ':a_r10_tko_odd' => $a_r10_tko, ':b_r10_tko_odd' => $b_r10_tko, ':a_r11_tko_odd' => $a_r11_tko, ':b_r11_tko_odd' => $b_r11_tko, ':a_r12_tko_odd' => $a_r12_tko, ':b_r12_tko_odd' => $b_r12_tko, ':event_date' => $event_date, ':event_location' => $event_location))) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateContest($contestId, $a_wins, $a_wins_tko, $a_wins_split, $a_wins_unanimous, $a_r1_tko, $a_r2_tko, $a_r3_tko, $a_r4_tko, $a_r5_tko, $a_r6_tko, $a_r7_tko, $a_r8_tko, $a_r9_tko, $a_r10_tko, $a_r11_tko, $a_r12_tko, $draw, $b_wins, $b_wins_tko, $b_wins_split, $b_wins_unanimous, $b_r1_tko, $b_r2_tko, $b_r3_tko, $b_r4_tko, $b_r5_tko, $b_r6_tko, $b_r7_tko, $b_r8_tko, $b_r9_tko, $b_r10_tko, $b_r11_tko, $b_r12_tko, $event_date, $event_location)
    {
        global $db;
        
        try {
            $query = "UPDATE contest SET contestid = :contestid, a_wins_odd = :a_wins_odd, b_wins_odd = :b_wins_odd, a_wins_tko_odd = :a_wins_tko_odd, b_wins_tko_odd = :b_wins_tko_odd, a_wins_split_odd = :a_wins_split_odd, b_wins_split_odd = :b_wins_split_odd, a_wins_unanimous_odd = :a_wins_unanimous_odd, b_wins_unanimous_odd = :b_wins_unanimous_odd, draw_odd = :draw_odd, a_r1_tko_odd = :a_r1_tko_odd, b_r1_tko_odd = :b_r1_tko_odd, a_r2_tko_odd = :a_r2_tko_odd, b_r2_tko_odd = :b_r2_tko_odd, a_r3_tko_odd = :a_r3_tko_odd, b_r3_tko_odd = :b_r3_tko_odd, a_r4_tko_odd = :a_r4_tko_odd, b_r4_tko_odd = :b_r4_tko_odd, a_r5_tko_odd = :a_r5_tko_odd, b_r5_tko_odd = :b_r5_tko_odd, a_r6_tko_odd = :a_r6_tko_odd, b_r6_tko_odd = :b_r6_tko_odd, a_r7_tko_odd = :a_r7_tko_odd, b_r7_tko_odd = :b_r7_tko_odd, a_r8_tko_odd = :a_r8_tko_odd, b_r8_tko_odd = :b_r8_tko_odd, a_r9_tko_odd = :a_r9_tko_odd, b_r9_tko_odd = :b_r9_tko_odd, a_r10_tko_odd = :a_r10_tko_odd, b_r10_tko_odd = :b_r10_tko_odd, a_r11_tko_odd = :a_r11_tko_odd, b_r11_tko_odd = :b_r11_tko_odd, a_r12_tko_odd = :a_r12_tko_odd, b_r12_tko_odd = :b_r12_tko_odd, event_date = :event_date, event_location = :event_location
            WHERE contestid = :contestid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->bindParam(':a_wins_odd', $a_wins, PDO::PARAM_STR);
            $stmt->bindParam(':b_wins_odd', $b_wins, PDO::PARAM_STR);
            $stmt->bindParam(':a_wins_tko_odd', $a_wins_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_wins_tko_odd', $b_wins_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_wins_split_odd', $a_wins_split, PDO::PARAM_STR);
            $stmt->bindParam(':b_wins_split_odd', $b_wins_split, PDO::PARAM_STR);
            $stmt->bindParam(':a_wins_unanimous_odd', $a_wins_unanimous, PDO::PARAM_STR);
            $stmt->bindParam(':b_wins_unanimous_odd', $b_wins_unanimous, PDO::PARAM_STR);
            $stmt->bindParam(':draw_odd', $draw, PDO::PARAM_STR);
            $stmt->bindParam(':a_r1_tko_odd', $a_r1_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r2_tko_odd', $a_r2_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r3_tko_odd', $a_r3_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r4_tko_odd', $a_r4_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r5_tko_odd', $a_r5_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r6_tko_odd', $a_r6_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r7_tko_odd', $a_r7_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r8_tko_odd', $a_r8_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r9_tko_odd', $a_r9_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r10_tko_odd', $a_r10_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r11_tko_odd', $a_r11_tko, PDO::PARAM_STR);
            $stmt->bindParam(':a_r12_tko_odd', $a_r12_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r1_tko_odd', $a_r1_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r2_tko_odd', $a_r2_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r3_tko_odd', $a_r3_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r4_tko_odd', $a_r4_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r5_tko_odd', $a_r5_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r6_tko_odd', $a_r6_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r7_tko_odd', $a_r7_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r8_tko_odd', $a_r8_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r9_tko_odd', $a_r9_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r10_tko_odd', $a_r10_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r11_tko_odd', $a_r11_tko, PDO::PARAM_STR);
            $stmt->bindParam(':b_r12_tko_odd', $a_r12_tko, PDO::PARAM_STR);
            $stmt->bindParam(':event_date', $event_date, PDO::PARAM_STR);
            $stmt->bindParam(':event_location', $event_location, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createWin($contestId, $contesterA, $contesterB)
    {
        global $db;
        
        try {
            $query = "INSERT INTO wins (contestid, contester_a, contester_b) VALUES (:contestid, :contester_a, :contester_b)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->bindParam(':contester_a', $contesterA, PDO::PARAM_STR);
            $stmt->bindParam(':contester_b', $contesterB, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getContest()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM contest ORDER BY created_at DESC LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllContest($contestId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM contest";
            if(isset($contestId)) {
                $query .= " WHERE contestid = :contestid";
            }
            $query .= " ORDER BY created_at DESC";
            $stmt = $db->prepare($query);
            if(isset($contestId)) {
                $stmt->bindParam('contestid', $contestId);
            }
            $stmt->execute();
            if(isset($contestId)) {
               $r = $stmt->fetch(); 
            } else {
               $r = $stmt->fetchAll(); 
            }
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getUpcomingContest()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT contest.* FROM contest
            INNER JOIN wins ON (contest.contestid = wins.contestid)
            WHERE wins.contest_result IS NULL ORDER BY contest.created_at DESC LIMIT 3";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllUpcomingContest()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT contest.* FROM contest
            INNER JOIN wins ON (contest.contestid = wins.contestid)
            WHERE wins.contest_result IS NULL ORDER BY contest.created_at DESC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
        
    public function getContestResult($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT wins.contestid, contester_a, contester_b, contest_result, stakes.userid, stakes.contestid, stakes.possibility, stakes.odd, stakes.stake, stakes.stake_type, stakes.created_at FROM wins
            INNER JOIN stakes ON (wins.contestid = stakes.contestid) WHERE stakes.status = 'P' AND wins.contest_result = stakes.possibility";
            if(isset($userId)) {
                $query .= " AND stakes.userid = :userid";
            }
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getOdds()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM odds";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getContestOdd($contestId, $odd)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT $odd FROM contest WHERE contestid = :contestid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateWin($contestId, $odd)
    {
        global $db;
        
        try {
            $query = "UPDATE wins SET contest_result = :contestResult WHERE contestid = :contestId";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':contestResult', $odd, PDO::PARAM_STR);
            $stmt->bindParam(':contestId', $contestId, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getWin($contestId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT contest_result FROM wins WHERE contestid = :contestid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllWins()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT wins.contestid, wins.contester_a, wins.contester_b, wins.contest_result, contest.event_date FROM wins
            INNER JOIN contest ON (wins.contestid = contest.contestid)
            WHERE contest_result IS NOT NULL ORDER BY contest.event_date DESC LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showAllWins()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT wins.contestid, wins.contester_a, wins.contester_b, wins.contest_result, contest.event_date FROM wins
            INNER JOIN contest ON (wins.contestid = contest.contestid)
            WHERE contest_result IS NOT NULL ORDER BY contest.event_date DESC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getContesterName($userId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT fname, lname, alias, img_url FROM users WHERE userid = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getReadableContestResult($possibility)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT value FROM odds WHERE odd = :odd";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':odd', $possibility, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function myWins($odd = null, $stake = null)
    {
        if(!empty($stake)) {
            $stake = $stake;
        } else {
            $stake = 0;
        }
        
        $result = $odd * $stake;
        echo '&#8358;'.number_format((float)$result, 2, '.', ','); 
    }
    
    public function createEventTicket($eventId, $contestId, $fightname, $regular, $vip, $vvip)
    {
        global $db;
        
        try {
            $query = "INSERT INTO ticket (eventid, contestid, fightname, regular, vip, vvip) VALUES (:eventid, :contestid, :fightname, :regular, :vip, :vvip)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->bindParam(':fightname', $fightname, PDO::PARAM_STR);
            $stmt->bindParam(':regular', $regular, PDO::PARAM_STR);
            $stmt->bindParam(':vip', $vip, PDO::PARAM_STR);
            $stmt->bindParam(':vvip', $vvip, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getTicket($eventId = null, $contestId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT ticket.*, contest.contester_a, contest.contester_b, contest.event_date, contest.event_location FROM ticket
            INNER JOIN contest ON (ticket.contestid = contest.contestid)
            INNER JOIN wins ON (ticket.contestid = wins.contestid) 
            WHERE wins.contest_result IS NULL GROUP BY ticket.eventid";
            if(isset($eventId)) {
                $query .= " AND ticket.eventid = :eventid";
            }
            if(isset($contestId)) {
                $query .= " AND ticket.contestid = :contestid";
            }
            $stmt = $db->prepare($query);
            if(isset($eventId)) {
                $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            }
            if(isset($contestId)) {
                $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($eventId) || isset($contestId)) {
                $r = $stmt->fetch();
            } else {
                $r = $stmt->fetchAll();
            }
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getPricedEvents($contestId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM ticket";
            if(isset($contestId)) {
               $query .= " WHERE contestid = :contestid"; 
            }
            if(!isset($contestId)) {
                $query .= " GROUP BY fightname";
            }
            $stmt = $db->prepare($query);
            if(isset($contestId)) {
                $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($contestId)) {
                $r = $stmt->fetch();
            } else {
                $r = $stmt->fetchAll();
            }
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getPromoCode($promoCode)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM promo_code WHERE code = :code";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':code', $promoCode, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getPossibility($contestId, $odd)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM stakes WHERE possibility = :possibility AND contestid = :contestid AND stake_type = 'S' AND status = 'P'";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':possibility', $odd, PDO::PARAM_STR);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getDateOfSubmission($userId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT created_at FROM stakes WHERE userid = :userid ORDER BY id DESC LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateStake($userId, $amount, $date)
    {
        global $db;
        
        try {
            $query = "UPDATE stakes SET status = :status WHERE userid = :userid AND stake = :amount
            AND created_at = :dateCreated";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':status', 'P', PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            $stmt->bindParam(':dateCreated', $date, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showFightTitle($contestId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT eventid, fightname FROM ticket WHERE contestid = :contestid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':contestid', $contestId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function selectTicketsParams($eventId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM ticket WHERE eventid = :eventid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
?>