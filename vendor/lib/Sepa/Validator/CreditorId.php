<?php
// $Id: CreditorId.php 8745 2024-03-28 17:08:31Z markus $
declare(strict_types=1);

namespace ufozone\phpsepa\Sepa\Validator;

/**
 * Validates Creditor Identifier
 * 
 * @author Markus
 * @since      2017-06-15
 */
class CreditorId implements \ufozone\phpsepa\Sepa\Validator
{
	use Checksum;
	
	public function isValid($subject) : bool
	{
		if (!preg_match("/^[A-Z]{2}[0-9]{2}[A-Z0-9]{3}[a-zA-Z0-9]{1,28}$/", $subject))
		{
			return false;
		}
		// Position 7-35 (BBAN), Position 1-2 (Country code; numerically converted), Position 3-4 (Check digit)
		$checkSum = substr($subject, 7) . strval(ord($subject[0]) - 55) . strval(ord($subject[1]) - 55) . substr($subject, 2, 2);
		
		return ($this->calculateCheckDigit($checkSum) === 97);
	}
}