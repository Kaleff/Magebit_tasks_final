<?php

namespace App\Models;

use PDO;

class Main extends Model
{
    public function verifyEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        } elseif (substr($email, -2) == "co") {
            return "We don't accept emails from Columbia";
        } else {
            $pdoInfo = $this->pdo->query('SELECT *
                                                   FROM `email_list`');
            while ($row = $pdoInfo->fetch(PDO::FETCH_ASSOC)) {
                if ($row['email'] == $email) {
                    return "This e-mail is already subscribed to our newsletter!";
                }
            }
            $array1 = explode("@", $email);
            $domain = array_pop($array1);
            $email = strtolower($email);
            $domainId = $this->domainRegister($domain);

            $sql = "INSERT INTO `email_list` (email, domain_id) 
                    VALUES (:email, :domain_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['email' => $email, 'domain_id' => $domainId]);
            return true;
        }
    }
    protected function domainRegister($domain)
    {
        $pdoInfo = $this->pdo->query('SELECT * 
                                               FROM `email_domains`');
        while ($row = $pdoInfo->fetch(PDO::FETCH_ASSOC)) {
            if ($row['domain_name'] == $domain) {
                return $row['id'];
            }
        }
        $sql = "INSERT INTO `email_domains` (domain_name)  
                VALUE (:domain_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['domain_name' => $domain]);
        return $this->domainRegister($domain);
        // WHEN NEW DOMAIN IS ADDED, THE METHOD STARTS AGAIN TO DETERMINE THE ID OF NEW DOMAIN
    }
}
