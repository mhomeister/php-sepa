<?php
// $Id: Bic.php 7657 2019-04-12 21:26:58Z markus $
declare(strict_types=1);

namespace ufozone\phpsepa\Sepa\Validator;

/**
 * Validates BIC
 * 
 * @author Markus
 * @since      2017-06-15
 */
class Bic implements \ufozone\phpsepa\Sepa\Validator
{
	public function isValid($subject) : bool
	{
		return (bool) preg_match("/^[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?$/", $subject);
	}
}