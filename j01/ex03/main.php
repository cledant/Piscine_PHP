#!/usr/bin/php
<?PHP
include("ft_split.php");
print_r(ft_split("0 000  Hello World       AAA           caca      BBB     ccc","test"));
print_r(ft_split("0 000  Hello World       AAA           caca      BBB     ccc test"));
print_r(ft_split(array()));
print_r(ft_split(array("0 coucou", "test")));
?>
