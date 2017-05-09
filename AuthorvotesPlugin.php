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

}
