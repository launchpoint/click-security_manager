<?

if(count($secured_url->roles)>0)
{
  $secured_url->is_authentication_required = true;
}
