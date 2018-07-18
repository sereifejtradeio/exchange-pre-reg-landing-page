<?php
session_start();

if ( hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) || hash_equals($_SESSION['previous_csrf_token'], $_POST['csrf_token'])) {

    $password_regex = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-+_!@#$%^&*.,?]).{8}/';

    //Sanitiazing post variables
    $username = strip_tags( trim($_POST['username']) );
    $email = strip_tags( trim($_POST['email']) );
    $password = strip_tags( trim($_POST['password']) );
    $confirmPassword = strip_tags( trim($_POST['confirm_password']) );
    //$referredByAffiliateId = strip_tags( trim($_COOKIE['affiliateID']) );
    $registrationSource = strip_tags( trim($_POST['registrationSource']) );
    //$userLanguage = strip_tags( trim($_POST['userLanguage']) );
    $utmSource = strip_tags( trim($_POST['utmSource']) );
    $utmMedium = strip_tags( trim($_POST['utmMedium']) );
    $utmCampaign = strip_tags( trim($_POST['utmCampaign']) );
    $utmTerm = strip_tags( trim($_POST['utmTerm']) );
    $utmContent = strip_tags( trim($_POST['utmContent']) );

    //Verify reCaptcha Server Side
    $post_data = http_build_query(
        array(
            'secret' => '6Lehw1cUAAAAAKo74gKZw72Kt87m4W0GVA4w8qQI',
            'response' => $_POST['token'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $result = json_decode($response);

    //Validate post variables
    $error_array = array(
        'error' => array()
    );

    if( empty($username) ) {
        $error_array['error'][] = array(
            'element' => 'username',
            'message' => 'Username cannot be empty!'
        );
    }

    if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $error_array['error'][] = array(
            'element' => 'email',
            'message' => 'Email is invalid!'
        );
    }

    if( empty($password) ) {
        $error_array['error'][] = array(
            'element' => 'password',
            'message' => 'Password cannot be empty!'
        );
    }

    if( !preg_match($password_regex, $password) ) {
        $error_array['error'][] = array(
            'element' => 'password',
            'message' => 'Password must have 8 chars, one lowercase, one uppercase, one number, and one special character!'
        );
    }

    if( empty($confirmPassword) ) {
        $error_array['error'][] = array(
            'element' => 'confirm_password',
            'message' => 'Repeat password cannot be empty!'
        );
    }

    if( !preg_match($password_regex, $confirmPassword) ) {
        $error_array['error'][] = array(
            'element' => 'confirm_password',
            'message' => 'Repeat Password must have 8 chars, one lowercase, one uppercase, one number, and one special character!'
        );
    }

    if( (!empty($password) && !empty($confirmPassword) ) && ($password != $confirmPassword) ) {
        $error_array['error'][] = array(
            'element' => 'confirm_password',
            'message' => 'Password and Repeat password do not match!'
        );
    }

    if( !$result->success ) {
        $error_array['error'][] = array(
            'element' => 'captcha',
            'message' => 'Captcha is invalid!'
        );
    }

    $fields = array(
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'confirmPassword' => $confirmPassword,
        'registrationSource' => $registrationSource,
        'utmSource' => $utmSource,
        'utmMedium' => $utmMedium,
        'utmCampaign' => $utmCampaign,
        'utmTerm' => $utmTerm,
        'utmContent' => $utmContent
    );

    $request_json = '{
        "username": "' . $fields['username'] . '",
        "email": "' . $fields['email'] . '",
        "password": "' . $fields['password'] . '",
        "confirmPassword": "' . $fields['confirmPassword'] . '",
        "registrationSource": "' . $fields['registrationSource'] . '",
        "utm_source": "' . $fields['utmSource'] . '",
        "utm_medium": "' . $fields['utmMedium'] . '",
        "utm_campaign": "' . $fields['utmCampaign'] . '",
        "utm_term": "' . $fields['utmTerm'] . '",
        "utm_content": "' . $fields['utmContent'] . '"
    }';


    $url = 'https://tio-temp-affiliate-api.herokuapp.com/users';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Basic OjIyZDdkMjcwM2M3NjY3NDdiNDJkZWIyNjVmODQ1NWYzODExMWExMmNlYzE4MzkwOTI2YTUzMjgyOWFmOTg4ODM=',
            'Origin: https://signup.trade.io'
        )
    );


    if(isset($error_array['error']) && !empty($error_array['error'])) {
        echo json_encode($error_array);
    } else {

        //if no errors execute post
        $result = curl_exec($ch);

        $result_decoded = json_decode($result);

        if( isset($result_decoded->jwt) ) {

            $jwtParts = explode('.', $result_decoded->jwt);
            $jwtPortionToCheck = $jwtParts[0] . '.' . $jwtParts[1];
            $jwtSignatureCheckBinary = hash_hmac('sha256', $jwtPortionToCheck, '16d38c7ccf82349e640b03fc03862858a363813d77f2f405d9ad74cbe2a92645', true);
            $jwtSignatureCheck = rtrim(strtr(base64_encode($jwtSignatureCheckBinary), '+/', '-_'), '=');
            if($jwtSignatureCheck == $jwtParts[2]) {
                $decodedJwtPayload = base64_decode(str_pad(strtr($jwtParts[1], '-_', '+/'), strlen($jwtParts[1]) % 4, '=', STR_PAD_RIGHT));
                $jwtPayloadJson = json_decode($decodedJwtPayload, true);
                $_SESSION['jwt'] = $result_decoded->jwt;
                $_SESSION['jwt_payload'] = $jwtPayloadJson;
            }
        }

        //close connection
        curl_close($ch);

        echo $result;
    }
}
?>