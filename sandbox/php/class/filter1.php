<?php
$email_a = 'joe@example.com';
$email_b = 'bogus';

if(filter_var($email_a, FILTER_VALIDATE_EMAIL))
{
    echo "Cette ($email_a) adresse email est considérée comme valide.";
}
if(filter_var($email_b, FILTER_VALIDATE_EMAIL))
{
    echo "Cette ($email_b) adresse email est considérée comme valide.";
}
$ip_a = '127.0.0.1';
$ip_b = '42.42';
if(filter_var($ip_a, FILTER_VALIDATE_IP))
{
    echo "Cette ($ip_a) adresse IP est considérée comme valide.";
}
if(filter_var($ip_b, FILTER_VALIDATE_IP))
{
    echo "Cette ($ip_b) adresse IP est considérée comme valide.";
}