<?php
namespace Craft;

/**
 * Entry Count Model
 */
class AuthorvotesModel extends BaseModel
{
    /**
     * Define what is returned when model is converted to string
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->votes;
    }

    /**
     * Define model attributes
     *
     * @return array
     */
    public function defineAttributes()
    {
        return array(
            'id' => AttributeType::Number,
            'userId' => AttributeType::Number,
            'votes' => array(AttributeType::Number, 'default' => 0),
            'dateCreated' => AttributeType::DateTime,
            'dateUpdated' => AttributeType::DateTime,
        );
    }
}
