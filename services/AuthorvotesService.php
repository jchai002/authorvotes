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
     * Returns authorId
     *
   * @param int $entryId
   *
   * @return int $authorId
     */
    public function findEntryAuthorId($entryId)
    {
      // find entry by id
      $criteria = craft()->elements->getCriteria(ElementType::Entry);
      $criteria->id   = $entryId;
      $entry = $criteria->first();

      // return authorId of entry
      return $entry->authorId;
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

    /**
     * Decrement votes
     *
   * @param int $userId
     */
    public function decrement($userId)
    {

        // get record from DB
        $AuthorvotesRecord = AuthorvotesRecord::model()->findByAttributes(array('userId' => $userId));

        // if exists then decrement votes
        if ($AuthorvotesRecord)
        {
            $AuthorvotesRecord->setAttribute('votes', $AuthorvotesRecord->getAttribute('votes') - 1);
        }

        // otherwise create a new record
        else
        {
            $AuthorvotesRecord = new AuthorvotesRecord;
            $AuthorvotesRecord->setAttribute('userId', $userId);
            $AuthorvotesRecord->setAttribute('votes', -1);
        }

        // save record in DB
        $AuthorvotesRecord->save();
    }

}
