<?php
/**
 * tzNIC registrar module
 * @author: Marcel Ruhf
 * @version: 1.0
 * @copyright: ©2016 Marcel Ruhf & Xonova Solutions Ltd.
 * @license: GNU General Public License v3.0 (see LICENSE file)
 */

function tznic_getConfigArray() {
    $configarray = array(
        "Username" => array( "Type" => "text", "Size" => "20", "Description" => "Enter your username here", ),
        "Password" => array( "Type" => "password", "Size" => "20", "Description" => "Enter your password here", ),
        "TestMode" => array( "Type" => "yesno", ),
    );
    return $configarray;
}

function tznic_GetNameservers($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Put your code to get the nameservers here and return the values below
    $values["ns1"] = $nameserver1;
    $values["ns2"] = $nameserver2;
    $values["ns3"] = $nameserver3;
    $values["ns4"] = $nameserver4;
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_SaveNameservers($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $nameserver1 = $params["ns1"];
    $nameserver2 = $params["ns2"];
    $nameserver3 = $params["ns3"];
    $nameserver4 = $params["ns4"];
    # Put your code to save the nameservers here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_GetRegistrarLock($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Put your code to get the lock status here
    if ($lock=="1") {
        $lockstatus="locked";
    } else {
        $lockstatus="unlocked";
    }
    return $lockstatus;
}

function tznic_SaveRegistrarLock($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    if ($params["lockenabled"]) {
        $lockstatus="locked";
    } else {
        $lockstatus="unlocked";
    }
    # Put your code to save the registrar lock here
    # If error, return the error message in the value below
    $values["error"] = $Enom->Values["Err1"];
    return $values;
}

function tznic_GetEmailForwarding($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Put your code to get email forwarding here - the result should be an array of prefixes and forward to emails (max 10)
    foreach ($result AS $value) {
        $values[$counter]["prefix"] = $value["prefix"];
        $values[$counter]["forwardto"] = $value["forwardto"];
    }
    return $values;
}

function tznic_SaveEmailForwarding($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    foreach ($params["prefix"] AS $key=>$value) {
        $forwardarray[$key]["prefix"] =  $params["prefix"][$key];
        $forwardarray[$key]["forwardto"] =  $params["forwardto"][$key]
	}
    # Put your code to save email forwarders here
}

function tznic_GetDNS($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Put your code here to get the current DNS settings - the result should be an array of hostname, record type, and address
    $hostrecords = array();
    $hostrecords[] = array( "hostname" => "ns1", "type" => "A", "address" => "192.168.0.1", );
    $hostrecords[] = array( "hostname" => "ns2", "type" => "A", "address" => "192.168.0.2", );
    return $hostrecords;

}

function tznic_SaveDNS($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Loop through the submitted records
    foreach ($params["dnsrecords"] AS $key=>$values) {
        $hostname = $values["hostname"];
        $type = $values["type"];
        $address = $values["address"];
        # Add your code to update the record here
    }
    # If error, return the error message in the value below
    $values["error"] = $Enom->Values["Err1"];
    return $values;
}

function tznic_RegisterDomain($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $regperiod = $params["regperiod"];
    $nameserver1 = $params["ns1"];
    $nameserver2 = $params["ns2"];
    $nameserver3 = $params["ns3"];
    $nameserver4 = $params["ns4"];
    # Registrant Details
    $RegistrantFirstName = $params["firstname"];
    $RegistrantLastName = $params["lastname"];
    $RegistrantAddress1 = $params["address1"];
    $RegistrantAddress2 = $params["address2"];
    $RegistrantCity = $params["city"];
    $RegistrantStateProvince = $params["state"];
    $RegistrantPostalCode = $params["postcode"];
    $RegistrantCountry = $params["country"];
    $RegistrantEmailAddress = $params["email"];
    $RegistrantPhone = $params["phonenumber"];
    # Admin Details
    $AdminFirstName = $params["adminfirstname"];
    $AdminLastName = $params["adminlastname"];
    $AdminAddress1 = $params["adminaddress1"];
    $AdminAddress2 = $params["adminaddress2"];
    $AdminCity = $params["admincity"];
    $AdminStateProvince = $params["adminstate"];
    $AdminPostalCode = $params["adminpostcode"];
    $AdminCountry = $params["admincountry"];
    $AdminEmailAddress = $params["adminemail"];
    $AdminPhone = $params["adminphonenumber"];
    # Put your code to register domain here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_TransferDomain($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $regperiod = $params["regperiod"];
    $transfersecret = $params["transfersecret"];
    $nameserver1 = $params["ns1"];
    $nameserver2 = $params["ns2"];
    # Registrant Details
    $RegistrantFirstName = $params["firstname"];
    $RegistrantLastName = $params["lastname"];
    $RegistrantAddress1 = $params["address1"];
    $RegistrantAddress2 = $params["address2"];
    $RegistrantCity = $params["city"];
    $RegistrantStateProvince = $params["state"];
    $RegistrantPostalCode = $params["postcode"];
    $RegistrantCountry = $params["country"];
    $RegistrantEmailAddress = $params["email"];
    $RegistrantPhone = $params["phonenumber"];
    # Admin Details
    $AdminFirstName = $params["adminfirstname"];
    $AdminLastName = $params["adminlastname"];
    $AdminAddress1 = $params["adminaddress1"];
    $AdminAddress2 = $params["adminaddress2"];
    $AdminCity = $params["admincity"];
    $AdminStateProvince = $params["adminstate"];
    $AdminPostalCode = $params["adminpostcode"];
    $AdminCountry = $params["admincountry"];
    $AdminEmailAddress = $params["adminemail"];
    $AdminPhone = $params["adminphonenumber"];
    # Put your code to transfer domain here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_RenewDomain($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $regperiod = $params["regperiod"];
    # Put your code to renew domain here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_GetContactDetails($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Put your code to get WHOIS data here
    # Data should be returned in an array as follows
    $values["Registrant"]["First Name"] = $firstname;
    $values["Registrant"]["Last Name"] = $lastname;
    $values["Admin"]["First Name"] = $adminfirstname;
    $values["Admin"]["Last Name"] = $adminlastname;
    $values["Tech"]["First Name"] = $techfirstname;
    $values["Tech"]["Last Name"] = $techlastname;
    return $values;
}

function tznic_SaveContactDetails($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Data is returned as specified in the GetContactDetails() function
    $firstname = $params["contactdetails"]["Registrant"]["First Name"];
    $lastname = $params["contactdetails"]["Registrant"]["Last Name"];
    $adminfirstname = $params["contactdetails"]["Admin"]["First Name"];
    $adminlastname = $params["contactdetails"]["Admin"]["Last Name"];
    $techfirstname = $params["contactdetails"]["Tech"]["First Name"];
    $techlastname = $params["contactdetails"]["Tech"]["Last Name"];
    # Put your code to save new WHOIS data here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_GetEPPCode($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    # Put your code to request the EPP code here - if the API returns it, pass back as below - otherwise return no value and it will assume code is emailed
    $values["eppcode"] = $eppcode;
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_RegisterNameserver($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $nameserver = $params["nameserver"];
    $ipaddress = $params["ipaddress"];
    # Put your code to register the nameserver here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_ModifyNameserver($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $nameserver = $params["nameserver"];
    $currentipaddress = $params["currentipaddress"];
    $newipaddress = $params["newipaddress"];
    # Put your code to update the nameserver here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

function tznic_DeleteNameserver($params) {
    $username = $params["Username"];
    $password = $params["Password"];
    $testmode = $params["TestMode"];
    $tld = $params["tld"];
    $sld = $params["sld"];
    $nameserver = $params["nameserver"];
    # Put your code to delete the nameserver here
    # If error, return the error message in the value below
    $values["error"] = $error;
    return $values;
}

?>