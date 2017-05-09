<?php
namespace Craft;

/**
 * Entry Count Record
 */
class AuthorvotesRecord extends BaseRecord
{
    /**
     * Get table name
     *
	 * @return string
     */
    public function getTableName()
    {
        return 'authorvotes';
    }

    /**
     * Define table columns
     *
	 * @return array
     */
    public function defineAttributes()
    {
        return array(
            'votes' => array(AttributeType::Number, 'default' => 0)
        );
    }

    /**
     * Define relationships with other tables
     *
	 * @return array
     */
    public function defineRelations()
    {
        return array(
            'user' => array(static::BELONGS_TO, 'UserRecord', 'required' => true, 'onDelete' => static::CASCADE)
        );
    }

    /**
     * Define table indexes
     *
	 * @return array
     */
    public function defineIndexes()
    {
        return array(
            array('columns' => array('userId'))
        );
    }
}
