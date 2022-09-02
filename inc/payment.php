<?php
class Payment
{

    public function paystack_api($reference, $amountUpdate, $email)
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
        'email' => $email,
        'amount' => $amountUpdate,
        'reference' => $reference,
        'callback_url' => 'https://www.dcolossus.com/payment_success.php'
      ];
      $fields_string = http_build_query($fields);
      //open connection
      $ch = curl_init();
      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_fd14bf3f812c3f1041bf88640c17cc1651eee7f3",
        "Cache-Control: no-cache",
      ));
      //So that curl_exec returns the contents of the cURL; rather than echoing it
      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
      //execute post
      $result = curl_exec($ch);
      //echo $result;
      if($result === false)
        {
            echo "Error Number:".curl_errno($ch)."<br>";
            echo "Error String:".curl_error($ch);
        } else {
            return $result;
        }
        curl_close($ch);
    }
    
    public function paystack_api_ticket($reference, $price, $email)
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
        'email' => $email,
        'amount' => $price,
        'reference' => $reference,
        'callback_url' => 'https://www.dcolossus.com/payment_success_ticket.php'
      ];
      $fields_string = http_build_query($fields);
      //open connection
      $ch = curl_init();
      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_fd14bf3f812c3f1041bf88640c17cc1651eee7f3",
        "Cache-Control: no-cache",
      ));
      //So that curl_exec returns the contents of the cURL; rather than echoing it
      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
      //execute post
      $result = curl_exec($ch);
      //echo $result;
      if($result === false)
        {
            echo "Error Number:".curl_errno($ch)."<br>";
            echo "Error String:".curl_error($ch);
        } else {
            return $result;
        }
        curl_close($ch);
    }
    
    public function paystack_api_refill($reference, $amountPaid, $email)
    {
       $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
        'email' => $email,
        'amount' => $amountPaid,
        'reference' => $reference,
        'callback_url' => 'https://www.dcolossus.com/payment_success_refill.php'
      ];
      $fields_string = http_build_query($fields);
      //open connection
      $ch = curl_init();
      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_fd14bf3f812c3f1041bf88640c17cc1651eee7f3",
        "Cache-Control: no-cache",
      ));
      //So that curl_exec returns the contents of the cURL; rather than echoing it
      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
      //execute post
      $result = curl_exec($ch);
      //echo $result;
      if($result === false)
        {
            echo "Error Number:".curl_errno($ch)."<br>";
            echo "Error String:".curl_error($ch);
        } else {
            return $result;
        }
        curl_close($ch); 
    }
    
    public function paystack_api_vote($reference, $price, $email)
    {
       $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
        'email' => $email,
        'amount' => $price,
        'reference' => $reference,
        'callback_url' => 'https://www.dcolossus.com/payment_success_vote.php'
      ];
      $fields_string = http_build_query($fields);
      //open connection
      $ch = curl_init();
      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_fd14bf3f812c3f1041bf88640c17cc1651eee7f3",
        "Cache-Control: no-cache",
      ));
      //So that curl_exec returns the contents of the cURL; rather than echoing it
      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
      //execute post
      $result = curl_exec($ch);
      //echo $result;
      if($result === false)
        {
            echo "Error Number:".curl_errno($ch)."<br>";
            echo "Error String:".curl_error($ch);
        } else {
            return $result;
        }
        curl_close($ch); 
    }
    
    public function verifyApi($trxref)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($trxref),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer sk_test_fd14bf3f812c3f1041bf88640c17cc1651eee7f3",
          "Cache-Control: no-cache",
        ),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        return $response;
      }
      curl_close($curl);
    }
    
    public function updatePaymentWPM($userId, $promoCode, $price, $eventId, $ticketType, $mobile, $fightname, $eventPassCode)
    {
        global $db;
        
        try {
            $query = "INSERT INTO payment (userid, code, price, eventid, ticket_type, mobile, fightname, event_code, created_at) VALUES (:userid, :code, :price, :eventid, :ticket_type, :mobile, :fightname, :event_code, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':code', $promoCode, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            $stmt->bindParam(':ticket_type', $ticketType, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $stmt->bindParam(':fightname', $fightname, PDO::PARAM_STR);
            $stmt->bindParam(':event_code', $eventPassCode, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updatePaymentWPE($userId, $promoCode, $price, $eventId, $ticketType, $email, $fightname, $eventPassCode)
    {
       global $db;
        
        try {
            $query = "INSERT INTO payment (userid, code, price, eventid, ticket_type, email, fightname, event_code, created_at) VALUES (:userid, :code, :price, :eventid, :ticket_type, :email, :fightname, :event_code, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':code', $promoCode, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            $stmt->bindParam(':ticket_type', $ticketType, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':fightname', $fightname, PDO::PARAM_STR);
            $stmt->bindParam(':event_code', $eventPassCode, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        } 
    }

    public function updatePaymentWTPE($userId, $price, $eventId, $ticketType, $email, $fightname, $eventPassCode)
    {
        global $db;
        
        try {
            $query = "INSERT INTO payment (userid, price, eventid, ticket_type, email, fightname, event_code, created_at) VALUES (:userid, :price, :eventid, :ticket_type, :email, :fightname, :event_code, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            $stmt->bindParam(':ticket_type', $ticketType, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':fightname', $fightname, PDO::PARAM_STR);
            $stmt->bindParam(':event_code', $eventPassCode, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updatePaymentWTPM($userId, $price, $eventId, $ticketType, $mobile, $fightname, $eventPassCode)
    {
        global $db;
        
        try {
            $query = "INSERT INTO payment (userid, price, eventid, ticket_type, mobile, fightname, event_code, created_at) VALUES (:userid, :price, :eventid, :ticket_type, :mobile, :fightname, :event_code, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':eventid', $eventId, PDO::PARAM_STR);
            $stmt->bindParam(':ticket_type', $ticketType, PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $stmt->bindParam(':fightname', $fightname, PDO::PARAM_STR);
            $stmt->bindParam(':event_code', $eventPassCode, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function setPromoCode($boxerId, $discount, $promoCode)
    {
        global $db;
        
        try {
            $query = "INSERT INTO promo_code (boxerid, code, discount) VALUES (:boxerid, :code, :discount)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':boxerid', $boxerId, PDO::PARAM_STR);
            $stmt->bindParam(':code', $promoCode, PDO::PARAM_STR);
            $stmt->bindParam(':discount', $discount, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function promoCode($userid)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM promo_code WHERE boxerid = :boxerid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':boxerid', $userid, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function deletePromoCode($boxerId)
    {
        global $db;
        
        try {
            $query = "DELETE FROM promo_code WHERE boxerid = :boxerid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':boxerid', $boxerId, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getBalance($userid)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT SUM(amount) AS balance FROM balance WHERE userid = :userid";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetch();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateBalance($userId, $amount, $paymentType)
    {
        global $db;
        
        try {
            $query = "INSERT INTO balance (userid, payment_type, amount, created_at) VALUES (:userid, :payment_type, :amount, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':payment_type', $paymentType, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function checkWithdrawRequest($userId)
    {
        global $db;
        
        try {
            $query = "SELECT id FROM withdraw_request WHERE paid = 'N' AND userid = :userid ORDER BY id DESC LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateWithdrawRequest($userId, $bankname, $bankaccount, $amount)
    {
        global $db;
        
        try {
            $query = "INSERT INTO withdraw_request (userid, bank_name, bank_account, amount, requested_date) VALUES (:userid, :bank_name, :bank_account, :amount, now())";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':bank_name', $bankname, PDO::PARAM_STR);
            $stmt->bindParam(':bank_account', $bankaccount, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function getWithrawRequest($userId = null)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM withdraw_request";
            if(isset($userId)) {
               $query .= " WHERE userid = :userid"; 
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
    
    public function confirmWithdrawReqPayment($requesterId, $amount, $paymentRef, $userId)
    {
        global $db;
        
        try {
            $query = "UPDATE withdraw_request SET paid = 'Y', payment_ref = :paymentRef, paid_by_who = :userid, paid_date = now()
            WHERE userid = :requesterid AND amount = :amount AND paid = 'N'";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':paymentRef', $paymentRef, PDO::PARAM_STR);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->bindParam(':requesterid', $requesterId, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            if($stmt->execute()) {
                return true;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showLimitedTicketPurchase()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM payment ORDER BY created_at DESC LIMIT 3";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showAllTicketPayment()
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM payment ORDER BY created_at DESC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showLimitedWalletTrans($userId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM balance WHERE userid = :userid ORDER BY created_at DESC LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showAllWalletTrans($userId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM balance WHERE userid = :userid ORDER BY created_at DESC";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showMyLimitedTicketPurchase($userId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM payment WHERE userid = :userid ORDER BY created_at DESC LIMIT 5";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function showAllMyTicketsPurchase($userId)
    {
        global $db;
        $json = array();
        
        try {
            $query = "SELECT * FROM payment WHERE userid = :userid ORDER BY created_at DESC";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':userid', $userId, PDO::PARAM_STR);
            $stmt->execute();
            $r = $stmt->fetchAll();
            $json[] = $r;
            return json_encode($json, JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
?>