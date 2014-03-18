<form name="t" method="post" action="#">
	<input type='text' id="email" name="email" /><br />
	<input type="submit" value="submit" name="submit" />
</form>	
<?php
$_POST["email"] = "gbecchio@yahoo.fr";
if(!filter_has_var(INPUT_POST, 'email'))
{
    echo "Email Not Found";
}
else
{
	echo "Email Found";
}
$filters = filter_list();
foreach($filters as $filter_name)
{
    echo $filter_name .": ".filter_id($filter_name) ."<br>";
}
