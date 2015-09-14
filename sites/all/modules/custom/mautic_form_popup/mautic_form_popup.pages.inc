<?php

/**
 * Modal display of the node's webform.
 *
 * @param string $js
 *   If JS is enabled.
 * @param $form_id
 *   Mautic form id.
 */
function mautic_form_popup_view($js = NULL, $campaign) {
  $output = array();

  // Fall back if $js is not set.
  if (!$js) {
    return;
  }

  ctools_include('modal');
  ctools_include('ajax');

  $title = field_get_items('node', $campaign, 'field_mautic_form_title');
  $title = $title[0]['safe_value'];

  $html = field_get_items('node', $campaign, 'field_mautic_form_html');
  $html = $html[0]['value'];

  $mautic_base_url = variable_get('mautic_base_url', 'http://leads.redcrackle.com');

  $dom = new DOMDocument();
  $dom->loadHTML($html);
  $replace = $dom->getElementsByTagName('mautic');
  $replacement = array();
  foreach ($replace as $tag) {
    $id = $tag->getAttribute('form-id');
    if ($id) {
      $data = array(
        'id' => $id,
      );

      $response = drupal_http_request(url($mautic_base_url . '/index.php/form/generate.js', array('query' => $data)));
      if ($response->code == 200) {
        $form = str_replace('\n', "\n", $response->data);
        $form = str_replace('\"', '"', $form);
        $form = str_replace('document.write("', '', $form);
        $form = substr($form, 0, -3);
        $replacement[] = $form;
        /*$xml = $dom->createDocumentFragment();
        $xml->appendXML($a);
        $tag->parentNode->replaceChild($xml, $tag);
        //$dom->replaceChild($xml, $tag);*/
      }
      else {
        $replacement[] = '';
      }
    }
    else {
      $replacement[] = '';
    }
  }

  $pattern = '#<\s*?mautic\b[^>]*>(.*?)</mautic\b[^>]*>#s';
  $output = preg_replace($pattern, $replacement[0], $html);

  $commands[] = array(
    'command' => 'mautic_form_popup',
    'html' => $output,
    'title' => t('@title', array('@title' => $title)),
  );

  print ajax_render($commands);

  /*$dom->normalize();
  echo $dom->saveHTML();
  exit;*/

  /*$regex = '#<\s*?mautic\b[^>]*>(.*?)</mautic\b[^>]*>#s';
  $matches = array();
  $mautic_form = preg_match($regex, $html, $matches);
  print_r($matches);
  print_r($mautic_form);
  exit;*/

  /*$data = array(
    'id' => $campaign->nid,
  );

  $response = drupal_http_request(url('http://leads.redcrackle.com/index.php/form/generate.js', array('query' => $data)));
  if ($response->code != 200) {
    $commands[] = array(
      'command' => 'mautic_form_popup',
      'html' => '<p>' . t('Error encountered in retrieving the form. Please try again later.') . '</p>',
      'title' => t('Form'),
    );

    print ajax_render($commands);
    return;
  }

  $form = str_replace('\n', "\n", $response->data);
  $form = str_replace('\"', '"', $form);
  $form = str_replace('document.write("', '', $form);
  $form = substr($form, 0, -3);

  $commands[] = array(
    'command' => 'mautic_form_popup',
    'html' => $html,
    'title' => t('Drupal 8 Development Tips'),
  );

  print ajax_render($commands);*/
}