<?php
class Awards 
{
    public function setCategory($name, $desc)
    {
        global $db;
        
        try {
            $query = "INSERT INTO award_category (name, description) VALUES (:name, :description)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $desc, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getLimitedCategories()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_category ORDER BY id LIMIT 3";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getCategories($catId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_category";
            if(isset($catId)) {
                $query .= " WHERE id = :catId";
            }
            $query .= " ORDER BY id DESC";
            $stmt = $db->prepare($query);
            if(isset($catId)) {
                $stmt->bindParam(':catId', $catId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($catId)) {
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
    
    public function updateCategory($catId, $catname, $catdesc)
    {
        global $db;
        
        try {
            $query = "UPDATE award_category SET name = :name, description = :description WHERE id = :catid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':catid', $catId, PDO::PARAM_STR);
            $stmt->bindParam(':name', $catname, PDO::PARAM_STR);
            $stmt->bindParam(':description', $catdesc, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getLimitedSponsors()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_sponsors ORDER BY id LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllSponsors($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_sponsors";
            if(isset($userId)) {
                $query .= " WHERE id = :userid";
            }
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($userId)) {
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
    
    public function createAwardSponsor($sponsorName, $sponsorMobile)
    {
        global $db;
        
        try {
            $query = "INSERT INTO award_sponsors (name, mobile) VALUES (:name, :mobile)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $sponsorName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $sponsorMobile, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateAwardSponsor($sponsorName, $sponsorMobile, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE award_sponsors SET name = :name, mobile = :mobile WHERE id = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $sponsorName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $sponsorMobile, PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createAwardPresenter($presenterName, $presenterMobile)
    {
        global $db;
        
        try {
            $query = "INSERT INTO award_presenters (name, mobile) VALUES (:name, :mobile)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $presenterName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $presenterMobile, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateAwardPresenter($presenterName, $presenterMobile, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE award_presenters SET name = :name, mobile = :mobile WHERE id = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $presenterName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $presenterMobile, PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getLimitedPresenters()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_presenters ORDER BY id LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllPresenters($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_presenters";
            if(isset($userId)) {
                $query .= " WHERE id = :userid";
            }
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($userId)) {
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
    
    public function getLimitedEndorsers()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_endorsers ORDER BY id LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllEndorsers($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_endorsers";
            if(isset($userId)) {
                $query .= " WHERE id = :userid";
            }
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($userId)) {
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
    
    public function createAwardEndorser($endorserName, $endorserMobile)
    {
        global $db;
        
        try {
            $query = "INSERT INTO award_endorsers (name, mobile) VALUES (:name, :mobile)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $endorserName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $endorserMobile, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateAwardEndorser($endorserName, $endorserMobile, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE award_endorsers SET name = :name, mobile = :mobile WHERE id = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $endorserName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $endorserMobile, PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getAllNominees($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_nominees";
            if(isset($userId)) {
                $query .= " WHERE id = :userid";
            }
            $stmt = $db->prepare($query);
            if(isset($userId)) {
                $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($userId)) {
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
    
    public function getLimitedNominees()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_nominees ORDER BY id LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function createAwardNominee($nomineeName, $nomineeMobile)
    {
        global $db;
        
        try {
            $query = "INSERT INTO award_nominees (name, mobile) VALUES (:name, :mobile)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $nomineeName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $nomineeMobile, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateAwardNominee($nomineeName, $nomineeMobile, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE award_nominees SET name = :name, mobile = :mobile WHERE id = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $nomineeName, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $nomineeMobile, PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateNomineeImageUrl($nomineeMobile, $db_file_url)
    {
        global $db;
        
        try {
            $query = "UPDATE award_nominees SET img_url = :imgUrl WHERE mobile = :mobile";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':imgUrl', $db_file_url, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $nomineeMobile, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateSponsorImageUrl($sponsorMobile, $db_file_url)
    {
        global $db;
        
        try {
            $query = "UPDATE award_sponsors SET img_url = :imgUrl WHERE mobile = :mobile";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':imgUrl', $db_file_url, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $sponsorMobile, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showLimitedAwards()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM awards ORDER BY id DESC LIMIT 3";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showAllAwards($awardId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM awards";
            if(isset($awardId)) {
                $query .= " WHERE id = :awardid";
            }
            $query .= " ORDER BY id DESC";
            $stmt = $db->prepare($query);
            if(isset($awardId)) {
                $stmt->bindParam(':awardid', $awardId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($awardId)) {
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
    
    public function getAllAwards($awardId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM awards";
            if(isset($awardId)) {
                $query .= " WHERE id = :awardid";
            }
            $query .= " ORDER BY id DESC";
            $stmt = $db->prepare($query);
            if(isset($awardId)) {
                $stmt->bindParam(':awardid', $awardId, PDO::PARAM_STR);
            }
            $stmt->execute();
            if(isset($awardId)) {
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
    
    public function createAward($category, $nominee1, $nominee2 = null, $nominee3 = null, $nominee4 = null, $nominee5 = null, $sponsor = null, $presenter = null, $endorser = null)
    {
        global $db;
        
        try {
            $query = "INSERT INTO awards (category_id, nominee1_id, nominee2_id, nominee3_id, nominee4_id, nominee5_id, sponsor_id, presenter_id, endorser_id, created_at) VALUES (:category_id, :nominee1_id, :nominee2_id, :nominee3_id, :nominee4_id, :nominee5_id, :sponsor_id, :presenter_id, :endorser_id, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':category_id', $category, PDO::PARAM_STR);
            $stmt->bindParam(':nominee1_id', $nominee1, PDO::PARAM_STR);
            if(isset($nominee2)) {
                $stmt->bindParam(':nominee2_id', $nominee2, PDO::PARAM_STR); 
            }
            if(isset($nominee3)) {
                $stmt->bindParam(':nominee3_id', $nominee3, PDO::PARAM_STR);  
            }
            if(isset($nominee4)) {
                $stmt->bindParam(':nominee4_id', $nominee4, PDO::PARAM_STR); 
            }
            if(isset($nominee5)) {
                $stmt->bindParam(':nominee5_id', $nominee5, PDO::PARAM_STR); 
            }
            if(isset($sponsor)) {
                $stmt->bindParam(':sponsor_id', $sponsor, PDO::PARAM_STR);
            }
            if(isset($presenter)) {
                $stmt->bindParam(':presenter_id', $presenter, PDO::PARAM_STR);
            }
            if(isset($endorser)) {
                $stmt->bindParam(':endorser_id', $endorser, PDO::PARAM_STR);
            }
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateAward($awardId, $category, $nominee1 = null, $nominee2 = null, $nominee3 = null, $nominee4 = null, $nominee5 = null, $sponsor = null, $presenter = null, $endorser = null)
    {
        global $db;
        
        try {
            $query = "UPDATE awards SET category_id = :catId, nominee1_id = :nom1, nominee2_id = :nom2, nominee3_id = :nom3, nominee4_id = :nom4, nominee5_id = :nom5, sponsor_id = :sponsor_id, presenter_id = :presenter_id, endorser_id = :endorser_id WHERE id = :awardId";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':awardId', $awardId, PDO::PARAM_STR);
            $stmt->bindParam(':catId', $category, PDO::PARAM_STR);
            if(isset($nominee1)) {
                $stmt->bindParam(':nom1', $nominee1, PDO::PARAM_STR);
            }
            if(isset($nominee2)) {
                $stmt->bindParam(':nom2', $nominee2, PDO::PARAM_STR); 
            }
            if(isset($nominee3)) {
                $stmt->bindParam(':nom3', $nominee3, PDO::PARAM_STR);  
            }
            if(isset($nominee4)) {
                $stmt->bindParam(':nom4', $nominee4, PDO::PARAM_STR); 
            }
            if(isset($nominee5)) {
                $stmt->bindParam(':nom5', $nominee5, PDO::PARAM_STR); 
            }
            if(isset($sponsor)) {
                $stmt->bindParam(':sponsor_id', $sponsor, PDO::PARAM_STR);
            }
            if(isset($presenter)) {
                $stmt->bindParam(':presenter_id', $presenter, PDO::PARAM_STR);
            }
            if(isset($endorser)) {
                $stmt->bindParam(':endorser_id', $endorser, PDO::PARAM_STR);
            }
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getCategoryName($catId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT name, description FROM award_category WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $catId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getNomineeName($nomId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_nominees WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $nomId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getSponsorName($sponsorId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_sponsors WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $sponsorId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getPresenterName($presenterId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_presenters WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $presenterId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getEndorserName($endorserId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM award_endorsers WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $endorserId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showVotes($catId, $nomineeId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT SUM(vote) AS voteCount FROM award_votes 
            WHERE category_id = :catId AND nominee_id = :nomId";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':catId', $catId, PDO::PARAM_STR);
            $stmt->bindParam(':nomId', $nomineeId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateVote($catId, $nomineeId, $voteCounts)
    {
        global $db;
        
        try {
            $query = "INSERT INTO award_votes (category_id, nominee_id, vote, created_at) VALUES (:category_id, :nominee_id, :vote, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':category_id', $catId, PDO::PARAM_STR);
            $stmt->bindParam(':nominee_id', $nomineeId, PDO::PARAM_STR);
            $stmt->bindParam(':vote', $voteCounts, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function closeAward($awardId, $status)
    {
        global $db;
        
        try {
            $query = "UPDATE awards SET openOrclosed = :closed WHERE id = :awardid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':awardid', $awardId, PDO::PARAM_STR);
            $stmt->bindParam(':closed', $status, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function openAward($awardId, $status)
    {
        global $db;
        
        try {
            $query = "UPDATE awards SET openOrclosed = :open WHERE id = :awardid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':awardid', $awardId, PDO::PARAM_STR);
            $stmt->bindParam(':open', $status, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

?>