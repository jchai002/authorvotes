<?php
namespace Craft;

/**
 * Entry Count Variable
 */
class AuthorvotesVariable
{
    /**
     * Returns count
     *
	 * @param int $userId
	 *
	 * @return AuthorvotesModel
     */
    public function getVotes($userId)
    {
        return craft()->authorvotes->getVotes($userId);
    }

    /**
     * Increment count
     *
	 * @param int $userId
     */
    public function increment($userId)
    {
        craft()->authorvotes->increment($userId);
    }

}
