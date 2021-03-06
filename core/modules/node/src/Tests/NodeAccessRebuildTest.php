<?php

/**
 * @file
 * Definition of Drupal\node\Tests\NodeAccessRebuildTest.
 */

namespace Drupal\node\Tests;

/**
 * Ensures that node access rebuild functions work correctly.
 *
 * @group node
 */
class NodeAccessRebuildTest extends NodeTestBase {
  protected function setUp() {
    parent::setUp();

    $web_user = $this->drupalCreateUser(array('administer site configuration', 'access administration pages', 'access site reports'));
    $this->drupalLogin($web_user);
    $this->web_user = $web_user;
  }

  /**
   * Tests rebuilding the node access permissions table.
   */
  function testNodeAccessRebuild() {
    $this->drupalGet('admin/reports/status');
    $this->clickLink(t('Rebuild permissions'));
    $this->drupalPostForm(NULL, array(), t('Rebuild permissions'));
    $this->assertText(t('Content permissions have been rebuilt.'));
  }
}
