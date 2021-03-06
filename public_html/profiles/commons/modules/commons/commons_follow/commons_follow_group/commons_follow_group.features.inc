<?php
/**
 * @file
 * commons_follow_group.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function commons_follow_group_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_flag_default_flags().
 */
function commons_follow_group_flag_default_flags() {
  $flags = array();

  // Exported flag: "Groups".
  $flags['commons_follow_group'] = array(
    'entity_type' => 'node',
    'title' => 'Groups',
    'global' => 0,
    'types' => array(
      0 => 'group',
    ),
    'flag_short' => 'Follow',
    'flag_long' => '',
    'flag_message' => '',
    'unflag_short' => 'Following',
    'unflag_long' => '',
    'unflag_message' => 'Not following',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'weight' => 0,
    'show_on_form' => 0,
    'access_author' => '',
    'show_in_links' => array(
      'full' => TRUE,
      'teaser' => TRUE,
    ),
    'show_contextual_link' => FALSE,
    'i18n' => 0,
    'module' => 'commons_follow_group',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 3,
  );

  // Exported flag: "Commons Follow (Groups - Email)".
  $flags['email_group'] = array(
    'entity_type' => 'node',
    'title' => 'Commons Follow (Groups - Email)',
    'global' => 0,
    'types' => array(
      0 => 'group',
    ),
    'flag_short' => 'Receive email updates',
    'flag_long' => '',
    'flag_message' => '',
    'unflag_short' => 'Don\'t receive email updates',
    'unflag_long' => '',
    'unflag_message' => '',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'weight' => -11,
    'show_on_form' => 0,
    'access_author' => '',
    'show_contextual_link' => FALSE,
    'i18n' => 0,
    'module' => 'commons_follow_group',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 3,
  );

  return $flags;
}
