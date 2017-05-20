<div id="content" class="span12">
<script type="text/javascript">
<?php $row = $Project->row(); ?>
$(document).ready( function() {

$('#fileTreeDemo_2').fileTree({ root: './Demo/<?php echo $row->nama_project;?>/', script: '<?php echo site_url()?>/Utama/tree', folderEvent: 'click', expandSpeed: 750, collapseSpeed: 750, multiFolder: false }, function(file) {
//alert(file);
url = "<?php echo site_url()?>/Utama/UbahProject/<?php echo $this->uri->segment(3);?>/?file=" + file;
window.location.href = url;
});

});
</script>
  <!-- content starts -->
  <div class="row-fluid sortable">
 
  

    <div class="box span3">
      <div class="box-header well" data-original-title>
          <h2><i class="icon-book"></i>Project 1</h2>
      </div>
        <ul style="margin: 1px; ">
        <div style="overflow: scroll; width: 250px;
height: 400px;">

<!-- Untuk menambah folder dan file di menu tree -->
<script>
$(function(){
    $.contextMenu({
        selector: '.context-menu-one', 
        callback: function(key, options) {
             var m = key;
             url = m;
//                    window.console && console.log(m) || alert(m); 
             window.location.href = url;
        },
        items: {
            "<?php echo site_url()?>/Utama/UbahNamaProject/<?php echo $row->id_project;?>": {name: "Ubah Nama Project"},
            "<?php echo site_url()?>/Utama/Folder/<?php echo $this->session->userdata('sess_id');?>": {name: "Tambah Folder"},
            "<?php echo site_url()?>/Utama/File/<?php echo $this->session->userdata('sess_id');?>": {name: "Tambah File"},
            "<?php echo site_url()?>/Utama/Upload/<?php echo $this->session->userdata('sess_id');?>": {name: "Upload File"}

        }
    });
    
    $('.context-menu-one').on('click', function(e){
        console.log('clicked', this);
    })
});
</script> 


<div class="context-menu-one box menu-1"><h4><?php echo $row->nama_project;?></h4></div>

<div id="fileTreeDemo_2" ></div>
          </div>
      </ul>
    </div>
    <!--/span-->
    <div class="box span9">
      <div class="box-header well" data-original-title>
        <h3><i class="icon-book"></i>Project 2</h3>
      </div>
      <?php 
      $file = $this->input->get('file'); 
      if($file!=""){ 
      ?>
        <ul style="margin: 1px;">
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/UbahProject/<?php echo $this->uri->segment(3); ?>/?file=<?php echo $this->input->get('file'); ?>"> 
<div>    
<textarea class="lined" name="code" style="width: 725px; height: 400px">
<?php echo $code; ?> 
</textarea>
    <div style="padding-left: 10px;padding-top: 5px"> <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-primary" href="<?php echo base_url();?>Demo/<?php echo $row->nama_project;?>" target="_blank">
        Demo
        </a>
    </div>

</form>
</div>  

<!-- untuk membuat line (penomeran)   -->
<script>
$(function() {
	$(".lined").linedtextarea(
		{selectedLine: 1}
	);
});
</script>

      </ul>
      <?php } ?>
    </div>
    <!--/span-->
    <!--/span-->
    <!--/span-->
  </div>
  <!--/row-->
  <!-- content ends -->
</div>
