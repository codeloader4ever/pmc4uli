<?php
//
// jQuery File Tree PHP Connector
//
// Version 1.01
//
// Cory S.N. LaViska
// A Beautiful Site (http://abeautifulsite.net/)
// 24 March 2008
//
// History:
//
// 1.01 - updated to work with foreign characters in directory/file names (12 April 2008)
// 1.00 - released (24 March 2008)
//
// Output a list of files for jQuery File Tree
//
 
$_POST['dir'] = urldecode($_POST['dir']);
$root = $_SERVER['tes'];
if( file_exists($root . $_POST['dir']) ) {
$files = scandir($root . $_POST['dir']);
natcasesort($files);
if( count($files) > 2 ) { /* The 2 accounts for . and .. */
echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
// All dirs
 $no = 1;
foreach( $files as $file ) {
if( file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && is_dir($root . $_POST['dir'] . $file) ) {
echo '<div class="context-menu-one box menu-1">';
echo "<li id='$no' class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "/\">" . htmlentities($file) . "</a></li>";
echo '</div>';
?>
<script type="text/javascript">
$(function(){
    $.contextMenu({
        selector: '.context-menu-one #<?php echo $no; ?>', 
        callback: function(key, options) {
            var m = key;
            window.console && console.log(m) || alert(m); 
//            window.location = m;
//            "/?file=<?php echo $_POST['dir']; ?>" + 
        },
        items: {
            "<?php echo 'k'; ?>": {name: "Tambah Folder", icon: ""},
            "Ubah_Folder/<?php echo $this->uri->segment(3); ?>/?file=<?php echo $_POST['dir']; ?><?php echo $file; ?>": {name: "Ubah Folder", icon: ""},
            "Hapus Folder": {name: "Hapus Folder", icon: ""},
            "Upload": {name: "Upload File", icon: ""}
        }
    });
    
    $('.context-menu-one').on('click', function(e){
        console.log('clicked', this);
    })
});
</script>
<?php
}
   $no++;
}
// All files
foreach( $files as $file ) {
if( file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && !is_dir($root . $_POST['dir'] . $file) ) {
$ext = preg_replace('/^.*\./', '', $file);
echo '<div class="context-menu-two box menu-1">';
echo "<li id='$no' class=\"file ext_$ext\"><a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "\">" . htmlentities($file) . "</a></li>";
echo '</div>';
?>
<script type="text/javascript">
$(function(){
    $.contextMenu({
        selector: '.context-menu-two #<?php echo $no; ?>', 
        callback: function(key, options) {
            var m = "?file=<?php echo $_POST['dir']; ?>" + key;
//            window.console && console.log(m) || alert(m); 
           $.post('jqueryFileTree.php', {variable: m});
//           $('#myModal').modal('toggle');
           window.location = m;
          
        },
        items: {
            "<?php echo $file; ?>": {name: "Ubah File", icon: ""},
            "Hapus File": {name: "Hapus File", icon: ""}
        }
    });
    
    $('.context-menu-two').on('click', function(e){
        console.log('clicked', this);
    })
});
</script>
<?php
}
   $no++;
}
echo "</ul>";   
}
}
 
?>


