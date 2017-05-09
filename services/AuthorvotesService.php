<?php
namespace Craft;

/**
 * Entry Count Service
 */
class AuthorvotesService extends BaseApplicationComponent
{
    /**
     * Returns votes
     *
	 * @param int $userId
	 *
	 * @return AuthorvotesModel
     */
    public function getVotes($userId)
    {
        // create new model
        $AuthorvotesModel = new AuthorvotesModel();

        // get record from DB
        $AuthorvotesRecord = AuthorvotesRecord::model()->findByAttributes(array('userId' => $userId));

        if ($AuthorvotesRecord)
        {
            // populate model from record
            $AuthorvotesModel = AuthorvotesModel::populateModel($AuthorvotesRecord);
        }

        return $AuthorvotesModel;
    }

    /**
     * Increment votes
     *
	 * @param int $userId
     */
    public function increment($userId)
    {

        // get record from DB
        $AuthorvotesRecord = AuthorvotesRecord::model()->findByAttributes(array('userId' => $userId));

        // if exists then increment votes
        if ($AuthorvotesRecord)
        {
            $AuthorvotesRecord->setAttribute('votes', $AuthorvotesRecord->getAttribute('votes') + 1);
        }

        // otherwise create a new record
        else
        {
            $AuthorvotesRecord = new AuthorvotesRecord;
            $AuthorvotesRecord->setAttribute('userId', $userId);
            $AuthorvotesRecord->setAttribute('votes', 1);
        }

        // save record in DB
        $AuthorvotesRecord->save();
    }

}
