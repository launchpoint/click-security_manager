<?

function secured_url_get_regex_display__d($s)
{
  $r = substr($s->regex, 2, -1);
  if(endswith($r, '$')) $r = substr($r, 0, -1);
  $r = stripslashes($r);
  $regex = preg_quote("(?P")."<(.+?)>".preg_quote("[^/]+?)", '/');
  $r = preg_replace("/$regex/", ":\\1", $r);
  return h($r);
}

function secured_url_get_name__d($s)
{
  return $s->regex_display;
}

function secured_url_get_available_roles__d($s)
{
  return Role::find_all( array( 'order'=>'name'));
}

function secured_url_update_roles($s, $ids)
{
  update_junction('secured_url_roles', 'secured_url_id', $s->id, 'role_id', $ids);
}