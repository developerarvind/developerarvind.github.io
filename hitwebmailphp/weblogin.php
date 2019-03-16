<?php

	// Example of logging into user account using email and
	// password for incorporating into another web application

	// utilizing WebMail Lite API
	include_once __DIR__.'/../libraries/afterlogic/api.php';

	if (class_exists('CApi') && CApi::IsValid())
	{
		// data for logging into account
        // $sEmail = 'user@domain.com';
                $sEmail = 'arvind@kriritindia.com';

		// $sPassword = '12345';

        		$sPassword = 'passwordA@1';

		try
		{
			// Getting required API class
			$oApiIntegratorManager = CApi::Manager('integrator');

			// attempting to obtain object for account we're trying to log into
			$oAccount = $oApiIntegratorManager->loginToAccount($sEmail, $sPassword);
			if ($oAccount)
			{
				// populating session data from the account
				$oApiIntegratorManager->setAccountAsLoggedIn($oAccount);

				// redirecting to WebMail
				CApi::Location('../');
			}
			else
			{
				// login error
				echo $oApiIntegratorManager->GetLastErrorMessage();
			}
		}
		catch (Exception $oException)
		{
			// login error
			echo $oException->getMessage();
		}
	}
	else
	{
		echo 'AfterLogic API isn\'t available';
	}