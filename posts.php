/* If your posts in Wowonder Social Script can't normally save and the posts publishing window is not hiding,
/* you have probably setup the script on LiteSpeed server. Here is a bugfix for this issue:
/* in xhr/posts.php file comment the 
/* echo json_encode($data);
/* on line 676.
