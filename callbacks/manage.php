<?

$routes = array();
foreach($manifests as $m)
{
  foreach($m['routes'] as $event_name=>$route_table)
  {
    foreach($route_table as $routed_event_name=>$route_array)
    {
      $routes = array_merge($routes, $route_array);
    }
  }
}

sort($routes);
$routes = array_unique($routes);

foreach($routes as $route)
{
  $u = SecuredUrl::find_or_create_by( array(
    'conditions'=>array('regex = ?', $route),
    'attributes'=>array(
      'regex'=>$route,
    )
  ));
}

$objs = SecuredUrl::find_all( array(
  'order'=>'regex'
));

$meta = array(
  'klass'=>'SecuredUrl',
  'objects'=>$objs,
  'list'=>array('regex', 'roles', 'is_authentication_required'),
);

superlist($meta);