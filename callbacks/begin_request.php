<?

$rules = SecuredUrl::find_all( array(
  'load'=>'roles'
));

foreach($rules as $rule)
{
  if(preg_match($rule->regex, $request_path, $matches))
  {
    if(count($rule->roles)>0)
    {
      $roles = collect($rule->roles, 'name');
      call_user_func_array('require_access', $roles);
    }
    if($rule->is_authentication_required)
    {
      require_authenticated();
    }
  }
}
