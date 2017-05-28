<?php
namespace Craft;

/**
* Entry Count Plugin
*/
class AuthorvotesPlugin extends BasePlugin
{
  public function getName()
  {
    return Craft::t('Author Votes');
  }

  public function getVersion()
  {
    return '1.0.0';
  }

  public function getDeveloper()
  {
    return 'Jerry Chai';
  }

  public function getDeveloperUrl()
  {
    return 'http://jerrychai.us';
  }

  public function getDocumentationUrl()
  {
    return 'https://github.com/jchai002/authorvotes';
  }

  public function hasCpSection()
  {
    return false;
  }

  public function init()
  {
    // on vote event
    craft()->on('upvote.onVote', function(Event $event) {
      $entryId = $event->params['id'];
      $vote = $event->params['vote'];
      $authorId = craft()->authorvotes->findEntryAuthorId($entryId);
      if ($vote == '1') {
        craft()->authorvotes->increment($authorId);
      } else {
        craft()->authorvotes->decrement($authorId);
      }
    });

    // on unvote event
    craft()->on('upvote.onUnvote', function(Event $event) {
      $entryId = $event->params['id'];
      $antivote = $event->params['antivote'];
      $authorId = craft()->authorvotes->findEntryAuthorId($entryId);
      if ($antivote == '-1') {
        craft()->authorvotes->decrement($authorId);
      } else {
        craft()->authorvotes->increment($authorId);
      }
    });
  }

}
